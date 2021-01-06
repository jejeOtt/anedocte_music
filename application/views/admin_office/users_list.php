<h5 style="text-align:center" class="h3 mb-3 fw-bold">Liste des utilisateurs</h5>
<br><?php foreach($users as $user) :?>

  
<div class="card bg-light">
  <div class="card-body">
    <h2 class="card-title">Nom d'utilisateur: <?php echo($user['userName']); ?></h2>
    Adresse mail : <?php echo($user['email']); ?><br>
    Role: 
    <?php 
      switch($user['roleId']) {
        case 1:
          echo("Administrateur");
          break;
        case 2:
          echo("Modérateur");
          break;
        case 3:
          echo('Utilisateur');
          break;
      }
    ?><br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-info me-md-2" href="<?php echo site_url('/admin_office/user_detail/'.$user['idUser']); ?>">Detail</a>
        <a class="btn btn-danger me-md-2" href="<?php echo site_url('/admin_office/delete_user/'.$user['idUser']); ?>">Supprimer</a>
    </div>
  </div>
</div>
<br>


<?php endforeach; ?>