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
                    $encPwd=password_hash($pwd1,PASSWORD_DEFAULT);
                    $pdoStatement->bindValue(':email',$mail, PDO::PARAM_STR);
                    $pdoStatement->bindValue(':pwd', $encPwd, PDO::PARAM_STR);
                    $pdoStatement->execute();
                    $_SESSION['id']= $pdo->lastInsertId();
                    $_SESSION['role']= 'user';
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
    if(isset($_POST['firstname'],$_POST['lastname'],$_POST['title'],$_POST['company'],$_POST['location'],$_POST['startdate'])){

        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $startdate=$_POST['startdate'];

        if (strlen($fname)>=2 && strlen($lname)>=2){

            $sql="UPDATE user
            SET usr_firstname=:fname ,usr_lastname=:lname
            WHERE usr_id = ". $_SESSION["id"];
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':fname',$fname, PDO::PARAM_STR);
            $pdoStatement->bindValue(':lname', $lname, PDO::PARAM_STR);
            $pdoStatement->execute();


            $sql="INSERT INTO experience(exp_title,exp_company,exp_location,exp_startdate,exp_enddate,user_usr_id)
            VALUES (:title,:company,:location,:startdate,'2070-01-01',".$_SESSION['id'].")";
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':title',$_POST['title'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':company', $_POST['company'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':startdate', $startdate, PDO::PARAM_STR);
            $pdoStatement->execute();
            header("Location: profile.php");
            exit;
        }
    }
}


require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signup.php';
require_once __DIR__ .'/../view/footer.php';

?>
