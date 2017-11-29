<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
header('Content-type: application/json');
require_once __DIR__ .'/../inc/config.php';

if(isset($_GET['userid'])){

  $sql= "SELECT opp_name, opp_probability
  FROM opportunity
  WHERE user_usr_id =". $_SESSION['id'];
    $pdoStatement=$pdo->prepare($sql);
    $pdoStatement->execute();
  echo json_encode($pdoStatement->fetchAll(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);

}

if(!empty($_POST)){



    $sql="INSERT INTO opportunity(opp_name,opp_link,opp_intref,opp_role,opp_department,opp_company,opp_sector,opp_location,opp_stage,opp_probability,opp_appdate,opp_creadate,opp_enddate,opp_candidates,user_usr_id)
    VALUES (:name,:link,:intref,:role,:dept,:company,:sector,:location,:stage,:proba,:appdate,:creadate,:enddate,:candidates,".$_SESSION['id'].")";

    //Form controls


    $pdoStatement=$pdo->prepare($sql);
    $pdoStatement->bindValue(':name',$_POST['opp-name'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':link',$_POST['opp-link'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':intref',$_POST['opp-intref'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':role',$_POST['opp-role'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':dept',$_POST['opp-department'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':company',$_POST['opp-company'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':sector',$_POST['opp-industry'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':location',$_POST['opp-location'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':stage',$_POST['opp-stage'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':proba',$_POST['opp-successrate'], PDO::PARAM_INT);
    $pdoStatement->bindValue(':appdate',$_POST['opp-appdate'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':creadate',$_POST['opp-creadate'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':enddate',$_POST['opp-enddate'], PDO::PARAM_STR);
    $pdoStatement->bindValue(':candidates',$_POST['opp-candidates'], PDO::PARAM_STR);

    $pdoStatement->execute();


    $sql= "SELECT opp_name, opp_probability
    FROM opportunity
    WHERE user_usr_id =". $_SESSION['id'];

      $pdoStatement=$pdo->prepare($sql);
      $pdoStatement->execute();
      echo json_encode($pdoStatement->fetchAll(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);

}

?>
