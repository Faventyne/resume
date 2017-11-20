
<div class="jumbotron">
  <h1 class="display-3">Keep the rythm</h1>
  <p class="lead">Find a user to see his profile and work progression </p>
  <hr class="my-4">
  <p>Find a user to see his profile</p>
  <form class="form-inline" action="search.php" method="post">
  <input class="form-control mr-sm-2" type="search" name="search-fname" placeholder="First Name" aria-label="Search">
  <input class="form-control mr-sm-2" type="search" name="search-lname" placeholder="Last Name" aria-label="Search">
  <button class="btn btn-primary my-2 btn-lg" name="search" type="submit">Search</button>
  </form>



</div>

<?php if(isset($users)) : ?>


  <?php foreach ($users as $key => $value): ?>

    <div class="container">
      <div class="profile-user">
          <?= $users[$key]['usr_firstname']. ' '.$users[$key]['usr_lastname'] ?>

      </div>
      <div class="profile-user">
          <?= 'Actual experience : '. $users[$key]['exp_title']. ' in '.$users[$key]['exp_company'] ?>

      </div>
      <div class="profile-user">
          <?= 'Education : '. $users[$key]['edu_school'] ?>
      </div>
      <div class="">
        <a href="<?= './profile.php?id=' . $users[$key]['usr_id'] ?>" class="btn btn-info btn-sm all" role="button">Details</a>
      </div>
    </div>

  <?php endforeach; ?>
  <!-- </tbody>
</table> -->
<?php endif; ?>
