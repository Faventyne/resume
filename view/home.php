
<div class="jumbotron">
  <h1 class="display-3">Keep the rythm</h1>
  <p class="lead">Find a user to see his profile and work progression </p>
  <hr class="my-4">
  <p>Find a user to see his profile</p>
  <form class="form-inline" method="post">
  <input class="form-control mr-sm-2" type="search" name="search-fname" placeholder="First Name" aria-label="Search">
  <input class="form-control mr-sm-2" type="search" name="search-lname" placeholder="Last Name" aria-label="Search">
  <button class="btn btn-primary my-2 btn-lg" name="search" type="submit">Search</button>
  </form>



</div>

<?php if(isset($users)) : ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Actual role</th>
      <th scope="col">Actual firm</th>
      <th scope="col">Education</th>
      <th scope="col">More...</th>
    </tr>
  </thead>
 <tbody>
  <?php foreach ($users as $key => $value): ?>
      <tr>
        <td><?= $users[$key]['usr_firstname'] ?></td>
        <td><?= $users[$key]['usr_lastname'] ?></td>
        <td><?= $users[$key]['exp_title'] ?></td>
        <td><?= $users[$key]['exp_company'] ?></td>
        <td><?= $users[$key]['edu_school'] ?></td>
        <td><a href="<?= './profile.php?id=' . $users[$key]['usr_id'] ?>" class="btn btn-info btn-sm all" role="button">Details</a></td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
