

<main>
  <?php if($mailExists == false) : ?>
      <?php if($trig==1) : ?>
      <p>Merci de confirmer votre adresse email</p>
      <?php elseif($pwd1!=$pwd2) : ?>
      <p>Erreur : mot de passe différents</p>
  <?php elseif(( strlen($pwd1)<8 || preg_match($pattern,$pwd1)==0) && $pwd1!='' ) : ?>
      <p>Veuillez saisir un password de 8 caractère avec au moins une majuscule et une minuscule </p>
      <?php endif; ?>
  <?php else : ?>
      <p>Désolé, ce mail existe déjà en base !</p>
  <?php endif; ?>




      <div class="container">
        <div class="card w-75 mx-auto mt-auto mb-auto">
            <div class="card-body">

                <?php if($trig!=1) : ?>

                    <h4 class="card-title"> Signup </h4>
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="pwd1">Password</label>
                        <input type="password" class="form-control" name="pwd1" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="pwd2">Confirm Password</label>
                        <input type="password" class="form-control" name="pwd2" placeholder="Password">
                      </div>

                      <input type="submit" class="btn btn-primary" name="insert_mailpwd" value="Signup">
                    </form>

                <?php else: ?>
                     <h4 class="card-title"> Add info profile</h4>
                     <form action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                         <label for="firstname">First Name</label>
                         <input type="text" class="form-control" name="firstname" aria-describedby="emailHelp" placeholder="John">
                       </div>
                       <div class="form-group">
                         <label for="lastname">Last Name</label>
                         <input type="text" class="form-control" name="lastname" placeholder="Doe">
                       </div>

                       <div class="form-group">
                           <fieldset>
                           <input type="hidden" name="submitFile" value="1" />
                           <label for="fileForm">Photo (Permitted formats: jpg, jpeg and png)</label><br>
                           <input type="file" name="fileForm" id="fileForm" />
                           <p class="help-block"></p>
                           <input type="submit" name="upload" class="btn btn-success fileinput-button" value="Add files...">
                           <!-- <input type="submit" class="btn btn-success btn-block" value="Téléverser" /> -->
                           </fieldset>
                       </div>

                       <div class="form-group">
                         <label for="lastname">Actual role</label>
                         <input type="text" class="form-control" name="title" placeholder="">
                       </div>

                       <div class="form-group">
                         <label for="lastname">Actual company</label>
                         <input type="text" class="form-control" name="company" placeholder="">
                       </div>

                       <div class="form-group">
                         <label for="lastname">Role descriptions</label>
                         <input type="textarea" class="form-control" name="comment" placeholder="">
                       </div>

                       <div class="row ">
                           <div class="form-group col-md-6">
                             <label for="lastname">From </label>
                             <input type="date" class="form-control" name="startdate">
                           </div>

                           <div class="form-group col-md-6">
                             <label for="lastname">To </label>
                             <input type="date" class="form-control" name="enddate" aria-describedby="dateHelp">
                             <small id="dateHelp" class="form-text text-muted"> Leave blank if actual </small>
                           </div>
                       </div>

                       <div class="form-group">
                         <label for="lastname">Location</label>
                         <input type="text" class="form-control" name="location" placeholder="">
                       </div>

                       <input type="submit" class="btn btn-primary" name="insert_role" value="Update">

                     </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
