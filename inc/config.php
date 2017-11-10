<?php

session_start();

$config = array(
    'DB_HOST' => 'wf3.progweb.fr',
    'DB_USER' => 'guillaumec',
    'DB_PASSWORD' =>'webforce3',
    'DB_DATABASE' => 'guillaumec_jobflow',
    'MAIL_HOST' => 'smtp.gmail.com',
    'MAIL_USERNAME' => 'guitchat',
    'MAIL_PASSWORD' => file_get_contents(__DIR__ ."/pwd.txt")
);

//Inclusion de composer

require_once __DIR__ .'/db.php';
require_once __DIR__ .'/functions.php';
require_once __DIR__ . '/../vendor/autoload.php';


//Social Networks
//Create a Page instance with the url information

$lePage = new SocialLinks\Page([
    'url' => 'http://projet-toto.dev',
    'title' => 'Page title',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'icon' => 'http://mypage.com/favicon.png',
    'twitterUser' => '@twitterUser'
]);
//print_r($lePage);

 ?>
