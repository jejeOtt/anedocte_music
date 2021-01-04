<html>

<head>
    <title>Music anedoctes</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">MusicAnedoctes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#0d6efd" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>genres">Listes des genres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>tracks">Listes des morceaux</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">A propos</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php if(!$this->session->userdata('logged_in')): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
      </li>
      <?php endif;?>
      <?php if($this->session->userdata('logged_in')): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
      </li>
      <!-- Utilisateur - Espace -->
      <?php if($this->session): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('users/account/'.$this->session->userdata['idUser']); ?>">Mon espace</a>
      </li>
      <?php endif;?>
      <!-- Modérateur - Back-Office -->
      <?php if($this->session->userdata('roleId') == 1 || $this->session->userdata('roleId') == 2): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>back_office/index">Back-Office</a>
      </li>
      <?php endif;?>
      <!-- Admin - Admin-Office -->
      <?php if($this->session->userdata('roleId') == 1) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>admin_office/index">Admin-Office</a>
      </li>
      <?php endif;?>
      <?php endif;?>
    </ul>
  </div>
</nav>


<!-- Flashdata -->
<?php if($this->session->flashdata('user_loggedin')): ?>
  <?php echo($this->session->flashdata('user_loggedin')); ?>
  <?php echo($this->session->userdata('userName')); ?>
<?php endif;?>

<?php if($this->session->flashdata('user_delete')): ?>
  <?php echo($this->session->flashdata('user_delete')); ?>
<?php endif;?>

<!-- Enlever ce bloc, juste la pour faire des test et output les infos du user/ S'en servir comme référence pour utiliser les infos de la session -->
<?php if($this->session): ?>
  <?php 
    echo($this->session->userdata('userName'));
  ?> 
    <br/>
  <?php 
    echo($this->session->userdata('idUser')); 
  ?>
    <br/>
  <?php
    echo($this->session->userdata('email')); 
  ?>
    <br/>
  <?php
    echo($this->session->userdata('roleId')); 
  ?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggedout')): ?>
  <?php echo($this->session->flashdata('user_loggedout')); ?>
<?php endif;?>
    <div class="container">
        <br>
        <hr>