<a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Liste des utilisateurs</h5>
<br><?php foreach($users as $user) :?>

<div class="card">
  <div class="card-body">
    Nom d'utilisateur: <?php echo($user['userName']); ?>
  </div>

  
<div class="card bg-light">
  <div class="card-body">
    Adresse mail : <?php echo($user['email']); ?><br>
    Identifiant utilistaeur : <?php echo($user['idUser']); ?><br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-info me-md-2" href="<?php echo site_url('/admin_office/user_detail/'.$user['idUser']); ?>">Detail</button>
        <button class="btn btn-danger me-md-2" href="<?php echo site_url('/admin_office/delete_user/'.$user['idUser']); ?>">Supprimer</button>
    </div>
  </div>
</div>
<br>


<?php endforeach; ?>