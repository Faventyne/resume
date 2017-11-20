<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ .'/../inc/config.php';

if(isset($_POST['search']))
    {
        $formOK = true;
        $fname=$_POST['search-fname'];
        $lname=$_POST['search-lname'];


        if(empty($fname) && !empty($lname)){
            $sql="SELECT usr_firstname,usr_lastname,exp_title,exp_company,exp_location,edu_school FROM user
            INNER JOIN experience ON user.usr_id = experience.user_usr_id
            LEFT JOIN education ON user.usr_id = education.user_usr_id
            WHERE exp_id = (
                SELECT exp_id FROM experience
                WHERE experience.user_usr_id = user.usr_id
                ORDER BY exp_enddate DESC LIMIT 1
                )
            AND usr_lastname LIKE :lname";
            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':lname',$lname.'%',PDO::PARAM_STR);

        } elseif (!empty($fname) && empty($lname)){
            $sql="SELECT usr_firstname,usr_lastname,exp_title,exp_company,exp_location,edu_school FROM user
            INNER JOIN experience ON user.usr_id = experience.user_usr_id
            LEFT JOIN education ON user.usr_id = education.user_usr_id
            WHERE exp_id = (
                SELECT exp_id FROM experience
                WHERE experience.user_usr_id = user.usr_id
                ORDER BY exp_enddate DESC LIMIT 1
                )
            AND usr_firstname LIKE :fname";

            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':fname',$fname.'%',PDO::PARAM_STR);

        } elseif (!empty($fname) && !empty($lname)){

            $sql="SELECT usr_firstname,usr_lastname,exp_title,exp_company,exp_location,edu_school FROM user
            INNER JOIN experience ON user.usr_id = experience.user_usr_id
            LEFT JOIN education ON user.usr_id = education.user_usr_id
            WHERE exp_id = (
                SELECT exp_id FROM experience
                WHERE experience.user_usr_id = user.usr_id
                ORDER BY exp_enddate DESC LIMIT 1
                )
            AND usr_firstname LIKE :fname
            AND usr_lastname LIKE :lname";

            $pdoStatement=$pdo->prepare($sql);
            $pdoStatement->bindValue(':fname',$fname.'%',PDO::PARAM_STR);
            $pdoStatement->bindValue(':lname',$lname.'%',PDO::PARAM_STR);
        } else {
            $formOK = false;
        }

        if($formOK == true){

            $pdoStatement->execute();
            $users=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($users);
            if(sizeof($users)>1){
                echo "Oh ! Interesting";
            } elseif(sizeof($users)==1) {
                //header("Location: profile/id");
            } else{
                echo "No results found !";
            }
        }



    }

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/search.php';
require_once __DIR__ .'/../view/footer.php';
