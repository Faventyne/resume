<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$trig=0;
$pwd1=$pwd2='';
$mailExists = false;
global $mail;
global $pwd;

$pattern = '/^(?=.*?[A-Z])(?=.*?[0-9])[\w]{8,}$/';
//If form has been submitted
if(isset($_POST['insert_mailpwd'])){

    $emailPwdOK = false;
//Check if fields are filled
    if(isset($_POST['email'],$_POST['pwd1'],$_POST['pwd2'])){
        //check if email is correct
        $mail = trim(strip_tags($_POST['email']));


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
                    $emailPwdOK = true;
                    $pwd = $pwd1;
                    $_SESSION['email']= $mail;
                    $encPwd=password_hash($pwd,PASSWORD_DEFAULT);
                    $_SESSION['pwd']= $encPwd;
                } else {
                    echo "Passwords should be similar and at least with 8 characters";
                }
            } else {
                echo "This email address already exists in our database, make sure you have not already an account !";
            }
        } else{
            echo "Désolé, nous ne reconnaissons pas ce format d'adresse email";
        }
    } else {
        echo "Please insert your email and password before signing up";
    }
}

if(isset($_POST['upload'])){

    $emailPwdOK = true;
    $extensionName = strtolower(substr(strrchr($_FILES['pic']['name'],'.'),1));
    $photoOK = true;


    if (!in_array($extensionName,array('jpg','jpeg','gif','png','tiff'))){
        $photoOK = false;
        $photoErrMsg="Profile picture has not been uploaded. File extension is not correct, should be .jpg,.jpeg,.gif,.png or .tiff";
    }
    if (!in_array($_FILES['pic']['type'],array('image/jpeg','image/gif','image/png','image/tiff'))) {
        $photoOK = false;
        $photoErrMsg="Profile picture has not been uploaded. File type is not correct, should be jpg/jpeg, gif, png or tiff";
    }
    if ($_FILES['pic']['error']){
        $photoOK = false;
        $photoErrMsg="Profile picture has not been uploaded. Error :".$_FILES['pic']['error'];
    }
    if ($_FILES['pic']['size'] > 1500000){
        $photoOK = false;
        $photoErrMsg="Profile picture exceeds max size (1,5 Mo). Please provide a adequate picture";
    }
    /*
    if($photoOK = true){
        $nom = "./resources/images/".$_POST['lastname']."_".$_POST['firstname'].".".$extensionName;
    }*/
    //exit;
}


if(isset($_POST['insert_role'])){
    //Check if fields are filled
    $extensionName = strtolower(substr(strrchr($_FILES['pic']['name'],'.'),1));
    $formOK = true;
    if(isset($_POST['firstname'],$_POST['lastname'],$_POST['title'],$_POST['company'],$_POST['location'],$_POST['startdate'])){

        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $startdate=$_POST['startdate'];

        //If the profile picture has not been incorrectly uploaded
        if (isset($_FILES['pic'])){


            $resultat = move_uploaded_file($_FILES['pic']['tmp_name'],"./resources/images/".$_POST['lastname']."_".$_POST['firstname'].".".$extensionName);
        }

        if(!(strlen($fname)>=2 && strlen($lname)>=2)){
            $formOK = false;
            echo "Please provide a First Name and Last Name with at least two characters";
        }

        if ($formOK){

            $sql="INSERT INTO user(usr_firstname,usr_lastname,usr_mail,usr_pwd,usr_role)
            VALUES (:fname,:lname,:email,:pwd,'user')";
            $pdoStatement=$pdo->prepare($sql);
            //$encPwd=password_hash($pwd,PASSWORD_DEFAULT);
            $pdoStatement->bindValue(':fname',$fname, PDO::PARAM_STR);
            $pdoStatement->bindValue(':lname', $lname, PDO::PARAM_STR);
            $pdoStatement->bindValue(':email',$_SESSION['email'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':pwd', $_SESSION['pwd'], PDO::PARAM_STR);
            $pdoStatement->execute();
            $_SESSION['id']= $pdo->lastInsertId();
            $_SESSION['role']= 'user';
            //$_SESSION['email']= $mail;
            /*
            $sql="UPDATE user
            SET usr_firstname=:fname ,usr_lastname=:lname
            WHERE usr_id = ". $_SESSION["id"];
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':fname',$fname, PDO::PARAM_STR);
            $pdoStatement->bindValue(':lname', $lname, PDO::PARAM_STR);
            $pdoStatement->execute();
            */

            $sql="INSERT INTO experience(exp_title,exp_company,exp_location,exp_comment,exp_startdate,exp_enddate,user_usr_id)
            VALUES (:title,:company,:location,:comment,:startdate,:enddate,".$_SESSION['id'].")";
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':title',$_POST['title'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':company', $_POST['company'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':startdate', $startdate, PDO::PARAM_STR);
            $pdoStatement->bindValue(':enddate', $_POST['enddate'], PDO::PARAM_STR);
            $pdoStatement->execute();
            $htmlContent="<h1> C'est moi</h1><br><p>Proclivior sermonum remissior proclivior sermonum et amicitiae mediocre quidem et et Tristitia remissior gravitatem suavitas haudquaquam et atque et re atque Tristitia dulcior ad autem quidem quaedam dulcior omni amicitiae.</p>";
            sendEmail('guitchat@gmail.com','Bienvenue sur le site',$htmlContent);
            header("Location: profile.php");
            exit;
        }


    }
}


require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signup.php';
require_once __DIR__ .'/../view/footer.php';

?>
