<div class="card w-75 mx-auto">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $user['usr_firstname'].' '.$user['usr_lastname'] ?></h4>
    <p class="card-text">Détails</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">Son titre: <?php echo $user['exp_title'] ?></li>
    <li class="list-group-item">Sa compagnie : <?php echo $user['exp_company'] ?></li>

  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
