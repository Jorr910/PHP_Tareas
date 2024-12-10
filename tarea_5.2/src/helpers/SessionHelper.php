<?php

namespace helpers;

class SessionHelper
{
    public static function initSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}