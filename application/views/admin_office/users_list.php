<h1>Liste des utilisateurs</h1>
<?php foreach($users as $user) :?>
<p><?php echo($user['userName']); ?></p>
<p><?php echo($user['email']); ?></p>
<p><?php echo($user['idUser']); ?></p>
<p><a class="btn btn-outline-primary" href="<?php echo site_url('/admin_office/user_detail/'.$user['idUser']); ?>">Detail</a></p>
<p><a class="btn btn-outline-primary" href="<?php echo site_url('/admin_office/delete_user/'.$user['idUser']); ?>">Supprimer</a></p>

<?php endforeach; ?>