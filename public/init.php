<?php

/*
 * Author: Nikhil Deshpande
 * GitHub/Twitter: @NRDeshpande
 * E-mail: niks.rd@gmail.com
 * Date: 2018-11-23
 */

class App {
    private static $vendor_path = "/home/g-calendar/vendor";
    private static $helper = "utility.php";
    private static $ini_path = "/etc/g-calendar/config.ini";
    private static $config_values = [];
    private static $app_url = null;

    public static function init() {
        # Read App config ini file
        self::read_config();
        
        switch(App::status()) {
            case 'development':
                self::$app_url = "http://localhost";
                error_reporting(-1);
                ini_set('display_errors', 'On');
                break;

            case 'production':
                self::$app_url = "https://g-calendar.iamnikhil.com";
                break;
            
            default: break;
        }

        # Require vender autoload.php
        self::init_vender();

        # Including the helper file(s)
        self::include_helper();
    }

    private static function read_config() {
        if(is_file(self::$ini_path)) {
            self::$config_values = parse_ini_file(self::$ini_path, true);
            self::$config_values = self::$config_values['default'];
        }
    }

    private static function include_helper() {
        require_once(__DIR__.'/'.self::$helper);
    }

    private static function init_vender() {
        require_once(self::$vendor_path.'/autoload.php');
    }

    public static function get_config($config_name) {
        if(isset(self::$config_values[$config_name])) {
            return self::$config_values[$config_name];
        }

        return null;
    }

    public static function status() {
        return self::get_config('instance');
    }

    public static function url() {
        return self::$app_url;
    }

    public static function login_url() {
        return self::$app_url.'/authentication';
    }

    public static function logout_url() {
        return 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue='.App::url().'/logout';
    }

    public static function data_info_url() {
        return self::$app_url.'/success';
    }

    public static function client_id() {
        return self::get_config('client_id');
    }

    public static function client_secret() {
        return self::get_config('client_secret');
    }

    public static function out($message="Ok", $status=true, $code=200, $data=[]) {
        $status = $status === false ? "failure" : "success";
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode(['status' => $status, "message" => $message, "data" => $data]);
        exit(1);
    }


} App::init();