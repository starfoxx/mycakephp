<?php

App::import('Vendor', 'ChromePHP');
//in app/Lib/AppError.php
class AppError {
    public static function handleError($code, $description, $file = null, $line = null, $context = null) {
        ChromePhp::error('PHP Error Code '.$code.': '.$description.' '.$file.':'.$line);
    }
}