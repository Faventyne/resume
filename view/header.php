<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- SEO -->
  <meta name="title" content="Mon titre">
  <meta name="description" content="Une chouette description">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!-- CSS JQuery UI-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <!-- CSS Optional Bootstrap -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <!-- Javascript libraries -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
  <!-- Google captcha library -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!-- mon CSS -->
  <link rel="stylesheet" href="css/style.css">
  <title>Jobflow</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">Jobflow</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
              </li>

              <?php if (isset($_SESSION['id'])) : ?>
                  <li class="nav-item">
                    <a class="nav-link" href="profile.php">My profile</a>
                  </li>

                  </li>
                    <a class="nav-link" href="add.php">My flow</a>
                  </li>

              <?php endif; ?>


              <?php if (isset($_SESSION['id'])) : ?>
                  <li class="nav-item">
                      <form action="index.php" method="post">
                          <input type="submit" class="nav-link btn-primary" name="disconnect" value="Deconnexion">
                      </form>
                  </li>
              <?php else : ?>
                  </li>
                    <a class="nav-link" href="signup.php">Inscription</a>
                  </li>
                  </li>
                    <a class="nav-link btn-primary" href="signin.php">Connexion</a>
                  </li>

              <?php endif; ?>
              <!-- <li>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
              </li> -->

            </ul>

          </div>
        </nav>

    </header>
