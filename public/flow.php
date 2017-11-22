<?php
require_once __DIR__ .'/../inc/config.php';


if(isset($_POST['opp-submit'])){
  $sql="INSERT INTO opportunity(opp_name,opp_link,opp_intref,opp_title,opp_dept,opp_company,opp_sector,opp_location,opp_stage,opp_proba,opp_creadate,opp_enddate,opp_candidates,user_sur_id)
  VALUES (:name,:link,:intref,:title,:dept,:company,:sector,:location,:stage,:proba,:creadate,:enddate,:candidates,".$_SESSION['id'].")";

  //Form controls




  $pdoStatement=$pdo->prepare($sql);
  $pdoStatement->bindValue(':name',$_POST['opp-name'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':link',$_POST['opp-link'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':intref',$_POST['opp-link'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':title',$_POST['opp-title'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':dept',$_POST['opp-dept'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':company',$_POST['opp-company'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':sector',$_POST['opp-sector'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':location',$_POST['opp-location'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':stage',$_POST['opp-stage'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':proba',$_POST['opp-proba'], PDO::PARAM_INT);
  $pdoStatement->bindValue(':creadate',$_POST['opp-creadate'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':enddate',$_POST['opp-enddate'], PDO::PARAM_STR);
  $pdoStatement->bindValue(':candidates',$_POST['opp-link'], PDO::PARAM_STR);

  $pdoStatement=$pdo->execute($sql);
  $opportunity=$pdoStatement->fetch(PDO::FETCH_ASSOC);
  print_r($opportunity);
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/flow.php';
require_once __DIR__ .'/../view/footer.php';

 ?>
