<h1>Liste des genres en attente de validation</h1>

<?php foreach($genres as $genre) : ?>
    <h3><?php echo $genre['genreName']; ?></h3>
    <small class="post-date">Posted on : <?php echo $genre['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/back_office/validate_genre/'.$genre['idGenre']); ?>">Valider le genre</a></p>
<?php endforeach; ?>