<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

class AssetsController
{
    static function get()
    {
        $request = $_SERVER['REQUEST_URI'];
        $file = "../public" . explode("?", $request)[0];

        if (!is_file($file)) {
            header("HTTP/1.0 404 Not Found");
            echo "file not found!";
            exit;
        }

        if (str_starts_with($request, "/img")) {
            $fp = fopen($file, 'rb');

            header("Content-Type: image/png");
            header("Content-Length: " . filesize($file));

            fpassthru($fp);
            exit;
        }
        
        $fh = fopen($file, 'r');
        while ($line = fgets($fh)) {
            echo ($line);
        }
        fclose($fh);
        exit;
    }
}