<main>
    <div class="card w-75 mx-auto">


        <img class="card-img-top img-fluid ml-4" src="../public/resources/images/am.jpg" alt="Card image cap">

        <div class="card-body">
            <h4 class="card-title"><?php echo $experiences[0]['usr_firstname'].' '.$experiences[0]['usr_lastname'] ?></h4>
            <p class="card-text">Détails</p>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($experiences as $key=>$value) : ?>
                <li class="list-group-item">
                    <strong><?php echo $experiences[$key]['exp_title'] .'</strong> in <strong>'. $experiences[$key]['exp_company']?></strong>
                    <span class="expdates"><?= displayExpDates($experiences[$key]['exp_startdate'],$experiences[$key]['exp_enddate']) ?></span><br><br>
                    <?= $experiences[$key]['exp_comment'] ?>
                </li>
            <?php endforeach; ?>
        </ul>



        <div class="card-body">
            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand" href="#">New experience</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exp" aria-controls="exp" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
              </button>

              <div class="collapse navbar-collapse" id="exp">
                 <form action="" method="post">
                    <div class="form-group">
                      <label for="lastname">Role</label>
                      <input type="text" class="form-control" name="title" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Company</label>
                      <input type="text" class="form-control" name="company" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Role description</label>
                      <input type="textarea" class="form-control" name="comment" placeholder="">
                    </div>

                    <div class="row ">
                        <div class="form-group col-md-6">
                          <label for="lastname">From </label>
                          <input type="date" class="form-control" name="startdate">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="lastname">To </label>
                          <input type="date" class="form-control" name="startdate" aria-describedby="dateHelp">
                          <small id="dateHelp" class="form-text text-muted"> Leave blank if actual </small>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="lastname">Location</label>
                      <input type="text" class="form-control" name="location" placeholder="">
                    </div>

                    <input type="submit" class="btn btn-primary" name="insert_role" value="Update">

                  </form>
              </div>
            </nav>

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">New skill</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#skill" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" value="Add new skill">
                  <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="skill">
                    <form action="" method="post">
                      <div class="row">
                          <div class="form-group col-md-6">
                            <label for="skilltype">Type :</label>
                            <select name="skilltype">
                              <option value="Language">Language</option>
                              <option value="IT" >IT skill</option>
                            </select>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="lastname">Skill name</label>
                            <input type="text" class="form-control" name="skillname">
                          </div>
                      </div>

                      <input type="submit" class="btn btn-primary" name="insert_skill" value="Update">

                    </form>

                </div>
            </nav>

            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand" href="#">New education</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#education" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
              </button>

              <div class="collapse navbar-collapse" id="education">

                  <form action="" method="post">
                    <div class="form-group">
                      <label for="firstname">School Name</label>
                      <input type="text" class="form-control" name="sname" aria-describedby="emailHelp" placeholder="John">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Degree</label>
                      <input type="text" class="form-control" name="degree" placeholder="Doe">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Field of study</label>
                      <input type="text" class="form-control" name="sfield" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Grade</label>
                      <input type="text" class="form-control" name="grade" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Start date</label>
                      <input type="date" class="form-control" name="sstartdate">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Graduation date (or estimated)</label>
                      <input type="date" class="form-control" name="senddate" aria-describedby="sdateHelp">
                      <small id="sdateHelp" class="form-text text-muted"> Leave blank if actual </small>
                    </div>

                    <div class="form-group">
                      <label for="lastname">Description</label>
                      <input type="textarea" class="form-control" name="sdesc" placeholder="">
                    </div>

                    <input type="submit" class="btn btn-primary" name="insert_education" value="Update">

                  </form>
              </div>
            </nav>

        </div>

    </div>
</main>
