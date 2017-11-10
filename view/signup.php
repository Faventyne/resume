

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

<?php if($trig!=1) : ?>


    <div class="card w-75 mx-auto">
        <div class="card-body">
            <h4 class="card-title"> Step 1 : signup </h4>
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
        </div>
    </div>

<?php else: ?>

    <div class="card w-75 mx-auto">
        <div class="card-body">
            <h4 class="card-title"> Step 2 : feed your profile</h4>
            <form action="" method="post">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" aria-describedby="emailHelp" placeholder="First name">
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Password">
              </div>

              <div class="form-group">
                <label for="lastname">Actual role</label>
                <input type="text" class="form-control" name="role" placeholder="">
              </div>

              <div class="form-group">
                <label for="lastname">Actual company</label>
                <input type="text" class="form-control" name="company" placeholder="">
              </div>

              <div class="form-group">
                <label for="lastname">From when ?</label>
                <input type="date" class="form-control" name="startdate">
              </div>

              <div class="form-group">
                <label for="lastname">Location</label>
                <input type="text" class="form-control" name="location" placeholder="">
            </div>q

              <input type="submit" class="btn btn-primary" name="insert_role" value="Update">

            </form>
<?php endif; ?>
