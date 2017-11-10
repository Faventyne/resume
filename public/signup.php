<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$trig=0;
$pwd1=$pwd2='';
$mailExists = false;
//$pattern = '^(?=.*?[A-Z])(?=.*?[0-9])[\w]{8,}$';
//If form has been submitted
if(isset($_POST['insert_mailpwd'])){
//Check if fields are filled
    if(isset($_POST['email'],$_POST['pwd1'],$_POST['pwd2'])){
        //check if email is correct
        $mail= trim(strip_tags($_POST['email']));


        if(filter_var($mail,FILTER_VALIDATE_EMAIL)){


            //Check if email exists
            $sql = "SELECT usr_mail FROM user";
            $pdoStatement = $pdo->prepare($sql);
            $pdoStatement->execute();
            //$allEmails=array('email'=>array());
            $allEmails= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($allEmails as $value) {
                if($value['usr_mail'] == $mail){
                    $mailExists = true;
                    break;
                }
            }

            if ($mailExists == false){
                $pwd1=$_POST['pwd1'];
                $pwd2=$_POST['pwd2'];


                //preg_match($pattern,$password);
                //check if passwords are similar and long enough
                if(strlen($pwd1)>=8 && $pwd1==$pwd2 /*&& preg_match($pattern,$pwd1)==1*/){
                    $sql="INSERT INTO user(usr_mail,usr_pwd,usr_role)
                    VALUES (:email,:pwd,'user')";
                    $pdoStatement=$pdo->prepare($sql);
                    $encPwd=password_hash($pwd1,PASSWORD_BCRYPT);
                    $pdoStatement->bindValue(':email',$mail, PDO::PARAM_STR);
                    $pdoStatement->bindValue(':pwd', $encPwd, PDO::PARAM_STR);
                    $pdoStatement->execute();
                    $trig=1;
                }
            } else {
                echo "This email address already exists in our database, make sure you have not already an account !";
            }

            /*
            else if($pwd1!=$pwd2){
                echo "Erreur ! Les mots de passe sont différents";
            } else if(strlen($pwd1)<6){
                echo "Veuillez saisir un mot de passe supérieur à 6 caracteres !!";
            }
            */
        } else{
            echo "Désolé, nous ne reconnaissons pas ce format d'adresse email";
        }
    }
}

if(isset($_POST['insert_role'])){
    //Check if fields are filled
        if(isset($_POST['firstname'],$_POST['lastname'],$_POST['company'],$_POST['location'])){

            $fname=$_POST['firstname'];
            $lame=$_POST['lastname'];

            if (strlen($fname)>=2 && strlen($lname)>=2){
                $sql=INSERT 
            }

        }

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signup.php';
require_once __DIR__ .'/../view/footer.php';

?>
