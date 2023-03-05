<?php

namespace helpers;

class Helpers {
    public static function __callStatic($m, $args) {
        if (is_file('../helpers/' . $m . '.php')) {
            include_once('../helpers/' . $m . '.php');
            return call_user_func_array($m, $args);
        }
    }
}