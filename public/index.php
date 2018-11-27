<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);

//require_once __DIR__ .'/../inc/config.php';
require_once "../config/config.php";
require '../src/Model/User.php';

if(isset($_POST['disconnect']))
    {   session_destroy();
        header("Location: index.php");
        print_r($_SESSION);

    }


$userRepository = $entityManager->getRepository('src\User');
$users = $userRepository->findAll();
foreach ($users as $user) {
    echo sprintf("-%s\n", $user->getFirstname());
}
/*
$product = new src\User();
$entityManager->persist($product);
$entityManager->flush();
echo "Created Product with ID " . $product->getId() . "\n";
*/

$app = new Silex\Application();



$blogPosts = array(
    1 => array(
        'date' => '2011-03-29',
        'author' => 'igorw',
        'title' => 'Using Silex',
        'body' => '...',
    ),
    2 => array(
        'date' => '2013-03-29',
        'author' => 'igorw',
        'title' => 'C\'est moi !',
        'body' => '...',
    ),
);
$app->get('/coucou', function () {
    return 'Coucou';
});

$app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogPosts) {

    if(!isset($blogPosts[$id])){
        $app->abort(404, "Post $id does not exist.");
    }
    $post = $blogPosts[$id];

    $output = '';


    foreach ($blogPosts as $post) {
        $output .= $post['title'];
        $output .= '<br />';
    }

    return "<h1>{$post['title']}</h1>".
           "<p>{$post['body']}</p>";

});

$app->get('foo', function() {
    return 'Bar';
});

$app->get('/', function () {
    return 'Test';

});
$app['debug']=true;
$app->run();




if (in_array('mod_rewrite', apache_get_modules())) {
    echo "Yes, Apache supports mod_rewrite.";
}

else {
    echo "Apache is not loading mod_rewrite.";
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/home.php';
require_once __DIR__ .'/../view/footer.php';



 ?>
