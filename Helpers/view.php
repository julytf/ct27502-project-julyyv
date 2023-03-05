<?php

function view($view, $data = [], $layout = null)
{
    if (is_file('../views/' . $view . '.php')) {
        extract($data);
        if (isset($layout) && is_file('../views/layouts/' . $layout . '.php')) {
            $body = "../views/" . $view . '.php';
            require_once('../views/layouts/' . $layout . '.php');
        } else {
            require_once('../views/' . $view . '.php');
        }
    }
}
