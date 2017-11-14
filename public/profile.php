<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$sql="SELECT * FROM experience
LEFT OUTER JOIN user ON experience.user_usr_id = user.usr_id
WHERE user_usr_id =".$_SESSION['id'] ;
//print_r($sql);
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$experiences=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM skill
LEFT OUTER JOIN user ON skill.user_usr_id = user.usr_id
WHERE user_usr_id =".$_SESSION['id'] ;
//print_r($sql);
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$skills=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM education
LEFT OUTER JOIN user ON education.user_usr_id = user.usr_id
WHERE user_usr_id =".$_SESSION['id'] ;
//print_r($sql);
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$educations=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['insert_role'])){
    //Check if fields are filled
    if(isset($_POST['title'],$_POST['company'],$_POST['location'],$_POST['startdate'])){

        $company=$_POST['company'];
        $title =$_POST['title'];
        if (strlen($company)>=2 && strlen($title)>=2){


            $sql="INSERT INTO experience(exp_title,exp_company,exp_location,exp_comment,exp_startdate,exp_enddate,user_usr_id)
            VALUES (:title,:company,:location,:comment,:startdate,:enddate,".$_SESSION['id'].")";
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':title',$title, PDO::PARAM_STR);
            $pdoStatement->bindValue(':company', $company, PDO::PARAM_STR);
            $pdoStatement->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':startdate', $_POST['startdate'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':enddate', $_POST['enddate'], PDO::PARAM_STR);
            $pdoStatement->execute();
            header("Location: profile.php");
            exit;
        }
    }
}

if(isset($_POST['insert_skill'])){
    //Check if fields are filled
    if(isset($_POST['skitype'],$_POST['skiname'])){


        if (strlen($_POST['skiname'])>=2){

            $sql="INSERT INTO skill(ski_type,ski_name,ski_level,user_usr_id) VALUES (:skitype,:skiname,:skilevel,".$_SESSION['id'].")";
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':skitype',$_POST['skitype'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':skiname',$_POST['skiname'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':skilevel',$_POST['skilevel'], PDO::PARAM_STR);
            $pdoStatement->execute();
            header("Location: profile.php");
            exit;

        }
    }
}

if(isset($_POST['insert_education'])){
    //Check if fields are filled
    if(isset($_POST['sname'],$_POST['degree'],$_POST['sfield'],$_POST['sstartdate'],$_POST['senddate'])){

        $sname=$_POST['sname'];
        $deg=$_POST['degree'];
        $field=$_POST['sfield'];

        if (strlen($sname)>=2 && strlen($deg)>=2){


            $sql="INSERT INTO education(edu_school,edu_degree,edu_field,edu_grade,edu_startdate,edu_enddate,edu_desc,user_usr_id)
            VALUES (:sname,:degree,:field,:grade,:startdate,:enddate,:sdesc,".$_SESSION['id'].")";
            print_r($sql);
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':sname',$sname, PDO::PARAM_STR);
            $pdoStatement->bindValue(':degree', $deg, PDO::PARAM_STR);
            $pdoStatement->bindValue(':field', $field, PDO::PARAM_STR);
            $pdoStatement->bindValue(':grade', $_POST['grade'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':startdate', $_POST['sstartdate'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':enddate', $_POST['senddate'], PDO::PARAM_STR);
            $pdoStatement->bindValue(':sdesc', $_POST['sdesc'], PDO::PARAM_STR);
            $pdoStatement->execute();
            header("Location: profile.php");
            exit;
        }
    }
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/profile.php';
require_once __DIR__ .'/../view/footer.php';

?>
