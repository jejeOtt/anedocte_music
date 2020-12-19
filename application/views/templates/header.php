<html>

<head>
    <title>Music anedoctes</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">MusicAnedoctes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Accueil
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Citations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Listes Musique/Genre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">A propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<?php if($this->session->flashdata('user_loggedin')): ?>
  <?php echo($this->session->flashdata('user_loggedin')); ?>
  <?php echo($this->session->userdata('username')); ?>
<?php endif;?>

<?php if($this->session): ?>
  <?php echo($this->session->userdata('username')); ?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggedout')): ?>
  <?php echo($this->session->flashdata('user_loggedout')); ?>
<?php endif;?>
    <div class="container">
        <br>
        <hr>