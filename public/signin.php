<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

if(!empty($_POST)){

    if (isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
        $curl = new Curl\Curl();
        $curl->post("https://www.google.com/recaptcha/api/siteverify", array(
            'secret' => '6LcPsjgUAAAAABbhb-yhuM2nVPDG03Fs5RzpcRXV',
            'response' => $captcha
        ));
        $content = json_decode($curl->response,true);
        print_r($content);
        exit;
    }

    if (isset($_POST['email'],$_POST['pwd'])){
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];

        $sql = 'SELECT usr_id,usr_mail,usr_pwd,usr_role,usr_firstname,usr_lastname
        FROM user
        WHERE usr_mail =:email';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

        $pdoStatement->execute();
        $user= $pdoStatement->fetch(PDO::FETCH_ASSOC);

        $ip_address= $_SERVER['REMOTE_ADDR'];

        if(empty($user)){
            echo "Adresse email non valide. Veuillez vérifier votre adresse ou vous inscrire";
        } else {
            //print_r($pwd);
            //print_r($user);

            if(password_verify($pwd,$user['usr_pwd'])){
                //print_r($user);

                //echo "Votre adresse IP est". $ip_address;

                $_SESSION['id']=$user['usr_id'];
                $_SESSION['role']=$user['usr_role'];
                header("Location: profile.php");
                exit;
                //print_r($_SESSION);
            } else {
                echo "Le mot de passe saisi est incorrect. Veuillez vous assurer du mot de passe";
            }
        }
    }
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signin.php';
require_once __DIR__ .'/../view/footer.php';

?>
