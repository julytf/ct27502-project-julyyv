<?php

namespace Helpers;

class FlashMessage{
    private static function init() {
        session_start();
        $_SESSION['flash_message'] ??= [];

    }
    static function create($message, $type = "success") {
        static::init();
        $_SESSION['flash_message'][$type][] = $message;
    }
    static function get($type = "success") {
        static::init();
        return $_SESSION['flash_message'][$type] || [];
    }
}
