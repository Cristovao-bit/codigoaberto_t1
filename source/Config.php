<?php

/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => "Auth em MVC com PHP",
    "desc" => "Aprenda a construir uma aplicação de autenticação em MVC com PHP do jeito certo, neste cursos gratuito em youtube.com/upinside",
    "domain" => "localauth.com",
    "locale" => "pt_br",
    "root" => "http://localhost/codigoaberto/t1"
]);

/**
 * SITE MINIFY
 */
if($_SERVER["SERVER_NAME"] == "localhost"):
    require __DIR__ . "/Minify.php";
endif;

/**
 * DATABASE CONNECT
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "auth",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * SOCIAL CONFIG
 */
define("SOCIAL", [
    "facebook_page" => "robsonvleite",
    "facebook_author" => "robsonvleite",
    "facebook_appId" => "2193729837289",
    "twitter_creator" => "@robsonvleite",
    "twitter_site" => "@robsonvleite"
]);

/**
 * MAIL CONNECT
 */
define("MAIL", [
    "host" => "",
    "port" => "",
    "user" => "",
    "passwd" => ""
]);

/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    'clientId'          => '',
    'clientSecret'      => '',
    'redirectUri'       => '',
    'graphApiVersion'   => ''
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    'clientId'          => '',
    'clientSecret'      => '',
    'redirectUri'       => '',
]);