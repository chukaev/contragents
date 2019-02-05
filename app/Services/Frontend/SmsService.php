<?php

namespace App\Services\Frontend;

use App\Models\TempUser;
use App\Services\Frontend\Senders\SmsSender;
use App\Traits\Queries\QueriesManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Class SmsService, for sending sms.
 *
 * @package App\Services\Frontend
 */
class SmsService
{
    use QueriesManager;

    private $smsSender;
    private $errors;

    public function __construct()
    {
        $this->setQueriesManager("TempUser", "Frontend\UsersQueriesService");
    }

    /**
     * Send code to user, before registration.
     *
     * @param User $user
     * @param string $text
     * @param Request $request
     * @return null|object
     */
    public function sendConfirmationCode($request)
    {
        /* Create user object from request. */
        $user = $this->makeTempUser($request);

        $this->smsSender = new SmsSender();
        /* Send sms. */
        $this->smsSender->sendText($user->user_phone, $user->code);

        if ($this->smsSender->hasErrors()) {
            $this->setErrors($this->smsSender->getErrors());

            return null;
        }

        /* Save temp user with confirmation code to database. Only if sms is sent successfully. */
        $this->queriesManager->storeItem($user->attributesToArray());

        return $user;
    }

    public function checkConfirmationCode($request)
    {
        $user = $this->makeTempUser($request);

        $validator = Validator::make($request->all(), [
            'code' => [
                'required',
                Rule::exists('temp_users')->where(function ($query) use ($user) {
                    $query->where('user_phone', $user->user_phone);
                }),
            ],
        ]);

        if ($validator->fails()) {
            $this->setErrors($validator->errors());
            $user->is_confirmed = false;
        } else {
            $user->is_confirmed = true;
        }

        return $user;
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
        $user->code = $this->generateCode();

        return $user;
    }

    /**
     * Get errors from sender.
     *
     * @return string
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Generate confirmation code.
     *
     * @return string
     */
    public function generateCode()
    {
        if (env('APP_DEBUG')) {
            $randomCode = 11111;
        } else {
            $randomCode = mt_rand(10000, 99999);
            $randomCode = strtolower($randomCode);
        }

        return $randomCode;
    }

    /**
     * Set errors property.
     *
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
}