<h2> Search results</h2>

<?php if(isset($users)) : ?>




    <table class="table table-striped">
        <thead>
        </thead>
      <tbody>
        <?php foreach ($users as $key => $value): ?>
          <tr>
              <td>
                  <div class="row">

                      <div class="container col-md-2">
                        <img class="img-fluid" src= <?= "../public/resources/images/".$users[$key]['usr_lastname']."_".$users[$key]['usr_firstname'].".jpg" ?> alt="">
                      </div>
                      <div class="container col-md-8">
                        <div class="profile-user">
                            <?= $users[$key]['usr_firstname']. ' '.$users[$key]['usr_lastname'] ?>

                        </div>
                        <div class="profile-user">
                            <?= 'Actual experience : '. $users[$key]['exp_title']. ' in '.$users[$key]['exp_company'] ?>

                        </div>
                        <div class="profile-user">
                            <?= (isset($users[$key]['edu_school'])) ? 'Education : '. $users[$key]['edu_school'] : '' ?>
                        </div>

                      </div>
                      <div class="container col-md-2">
                        <div class="">
                          <a href="<?= './profile.php?id=' . $users[$key]['usr_id'] ?>" class="btn btn-info btn-sm all" role="button">Details</a>
                        </div>
                      </div>
                  </div>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>





  <!-- </tbody>
</table> -->
<?php endif; ?>
