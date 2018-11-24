<?php

/*
* This file will have all the core PHP helper functions, can be access from all .php file
* Loding this file at the config level
*/

function dump($data) {
    echo "<pre>"; print_r($data); echo "</pre>";
}

function get_query($attr) {
    if(isset($_GET[$attr])) {
        return $_GET[$attr];
    }
    return false;
}