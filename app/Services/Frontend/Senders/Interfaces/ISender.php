<?php

namespace App\Services\Frontend\Senders\Interfaces;

/**
 * Interface ISender, rules to send
 *
 * @package App\Services\Frontend\Interfaces
 */
interface ISender {
    /**
     * Send code to user, before registration.
     *
     * @param User $user
     * @param string $text
     * @return bool
     */
    public function sendText($user, $text);

    /**
     * Set errors.
     *
     * @return mixed
     */
    public function setErrors($srtring);

    /**
     * Get errors.
     *
     * @return mixed
     */
    public function getErrors();

    /**
     * Check if errors exists.
     *
     * @return mixed
     */
    public function hasErrors();
}