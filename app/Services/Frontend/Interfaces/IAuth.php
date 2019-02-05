<?php

namespace App\Services\Frontend\Interfaces;

/**
 * Interface IAuth,
 * Common rules for auth service, to work with users.
 *
 * @package App\Services\Frontend\Senders\Interfaces
 */
interface IAuth
{
    /* Make user object from request. */
    public function makeUser($request);

    /* Check user exists in database. */
    public function verifyUser();

    /* Save user to database. */
    public function saveUser();

    /* Validate input data from request. */
    public function validateUser($request);

    /* Register user. */
    public function register($request);
}