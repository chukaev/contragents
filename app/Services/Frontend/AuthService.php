<?php

namespace App\Services\Frontend;

use App\Models\TempUser;
use App\Models\UserProfile;
use App\Services\Frontend\Interfaces\IAuth;
use App\Traits\Queries\QueriesManager;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class AuthService
 * Registers and authenticates users.
 *
 * @package App\Services\Frontend
 */
class AuthService implements IAuth
{
    use QueriesManager, RegistersUsers;

    private $user;
    private $userProfile;
    private $errors;
    private $tempUser;

    public function __construct()
    {
        $this->setQueriesManager("TempUser", "Frontend\UsersQueriesService");
    }

    /**
     * Get user object from request.
     * @param $request
     */
    public function makeUser($request)
    {
        $this->user = new User();
        $this->user->fill($request->all());
        $this->user->password = bcrypt($this->user->password);

        $this->userProfile = new UserProfile();
        $this->userProfile->fill($request->except($this->user->attributesToArray()));
    }

    /**
     * Check user in database.
     */
    public function verifyUser()
    {
        // TODO: Implement verifyUser() method.
    }

    /**
     * Save user and his detail info to database.
     */
    public function saveUser()
    {
        $this->user->save();
        $this->user->profile()->save($this->userProfile);
    }

    /**
     * Validate input data.
     */
    public function validateUser($request)
    {
        $registrationValidator = Validator::make($request->all(), [
            'user_type' => ['required'], // User type: DISTRIBUTOR, MANUFACTURER, BUSINESSMAN, MEDICAL_ESTABLISHMENT or INDIVIDUAL
            'user_login' => ['required', 'unique:users,user_login', 'max:191'],
            'password' => ['required', 'confirmed', 'min:6', 'max:191'],
            'user_name' => ['required', 'max:191'],
            'user_last_name' => ['required', 'max:191'],
            'user_phone' => ['required', 'unique:users,user_phone', 'max:191'],
            'user_email' => ['required', 'unique:users,user_email', 'max:191'],
            'user_street' => ['required', 'max:191'],
            'user_village' => ['required', 'max:191'],
            'user_area' => ['required', 'max:191'],
            'user_region' => ['required', 'max:191'],
            'user_post_index' => ['max:191'],
            'user_country' => ['required', 'max:191'],
            'agreement_confirmed' => ['required', 'max:191']
        ]);

        if ($registrationValidator->fails()) {
            $request->flash();
            $this->setErrors($registrationValidator->errors());
            $this->makeTempUser($request); // To pass tempUser object ot view and show previous input values

            return false;
        }

        return true;
    }

    /**
     * Register user.
     *
     * @param $request
     * @return bool
     */
    public function register($request)
    {
        /* Make user object from request. */
        $this->makeUser($request);

        if ($this->validateUser($request)) {
            $this->saveUser();

            /* Save user to session. */
            $this->saveToSession();

            return true;
        } else {
            return false;
        }
    }

    /**
     * Set error messages.
     *
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get error messages.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get user property.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Create user object from request.
     *
     * @param $request
     * @return TempUser
     */
    public function makeTempUser($request)
    {
        $user = new TempUser();
        $user->fill($request->except('_token'));

        $this->tempUser = $user;
    }

    public function getTempUser()
    {
        return $this->tempUser;
    }

    public function login($request)
    {
        $identity = $request->input('identity');
        $password = $request->input('password');

        // TODO: user queriesManager here
        $user = User::active()->where(function ($query) use ($identity) {
            $query->where('user_phone', '=', $identity)
                ->orWhere('user_email', '=', $identity)
                ->orWhere('user_login', '=', $identity);
        })->first();

        if ($user && Hash::check($password, $user->password)) {
            /* Save user to session. */
            $this->saveToSession($user);

            return true;
        }

        return false;
    }

    /**
     * Define custom guard. Override guard method from AuthenticatesUsers trait.
     */
    public function guard()
    {
        return Auth::guard('frontend_user');
    }

    /**
     * Save user to session. Login user to application.
     */
    public function saveToSession($user = false)
    {
        if (!$user)
            $user = $this->getUser();

        $this->guard()->login($user);
    }
}