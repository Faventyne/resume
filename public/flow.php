<?php
require_once __DIR__ .'/../inc/config.php';

$sql="INSERT INTO opportunity(opp_link,opp_intref,opp_title,opp_dept,opp_company,opp_sector,opp_location,opp_stage,opp_proba,opp_creadate,opp_enddate,opp_candidates,user_sur_id)
VALUES (:link,:intref,:title,:dept,:company,:sector,:location,:stage,:proba,:creadate,:enddate,:candidated,".$_SESSION['id'].")";

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/flow.php';
require_once __DIR__ .'/../view/footer.php';

 ?>
