<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ .'/../inc/config.php';


if(isset($_POST['disconnect']))
    {   session_destroy();
        header("Location: index.php");
        print_r($_SESSION);

    }
$app = new Silex\Application();



$blogPosts = array(
    1 => array(
        'date' => '2011-03-29',
        'author' => 'igorw',
        'title' => 'Using Silex',
        'body' => '...',
    ),
);
$app->get('/coucou', function () {
    return 'Coucou';
});

$app->get('/blog', function () use ($blogPosts) {

    $output = '';
    foreach ($blogPosts as $post) {
        $output .= $post['title'];
        $output .= '<br />';
    }
    return $output;

});

$app->get('foo', function() {
    return 'Bar';
});

$app->get('/', function () {
    return 'Test';
});
$app->run();
$app['debug']=true;


require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/home.php';
require_once __DIR__ .'/../view/footer.php';



 ?>
