<?php

namespace App\Services\Frontend\Senders;

use App\Services\Frontend\Senders\Interfaces\ISender;

class SmsSender implements ISender
{
    private $errors;

    private $host;
    private $login;
    private $password;
    private $data;

    private $curl;

    public function __construct()
    {
        $this->host = env('SMS_URL');
        $this->login = env('SMS_LOGIN');
        $this->password = env('SMS_PASSWORD');

        $ch = curl_init($this->host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $this->curl = $ch;
    }

    /**
     * Send code to user, before registration.
     *
     * @param $user
     * @param string $text
     * @return bool
     */
    public function sendText($phone, $text)
    {
        if ($this->prepareMessage($text, $phone) && $this->sendSms()) {
            return true;
        } else {
            $this->setErrors('Не удалось отправить смс, попробуйте позже.');
            return false;
        }
    }

    /**
     * Set errors.
     *
     * @return mixed
     */
    public function setErrors($srtring)
    {
        $this->errors = $srtring;
    }

    /**
     * Get errors.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Check if errors exists.
     *
     * @return mixed
     */
    public function hasErrors()
    {
        return isset($this->errors);
    }

    public function prepareMessage($message, $number)
    {
        if (!$this->validateNumber($number)) {
            return false;
        }

        $data = [
            [
                'phone' => $number, 'text' => utf8_encode(iconv('windows-1251', 'utf-8', $message)) // number should consist of 11 digits, without '+'
            ]
        ];

        $this->data = $data;

        return true;
    }

    public function sendSms()
    {
        if (env('APP_DEBUG')) {
            return true;
        }

        try {
            $array = array_chunk($this->data, 50, true);

            foreach ($array as $chunk) {
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, "login=" . $this->login . "&password=" . $this->password . "&data=" . json_encode($chunk));

                $result = curl_exec($this->curl);

                curl_close($this->curl);

                $array = json_decode($result, true);

                if (isset($array[0]))
                    if (isset($array[0]['request_id'])) {
                        $request_id = $array[0]['request_id'];
                    } else {
                        return false;
                    }
                else
                    return false;

            }
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    public function validateNumber($number)
    {
        $pattern = '/^\998(90|91|93|94|95|97|98|99)[0-9]{7}$/';

        if (preg_match($pattern, $number) == 1) {
            return true;
        }

        return false;
    }

    public function generateCode($length)
    {
        if (env('APP_DEBUG')) {
            $randomCode = 11111;
        } else {
            $randomCode = mt_rand(100000, 999999);
            $randomCode = strtolower($randomCode);
        }

        return $randomCode;
    }
}