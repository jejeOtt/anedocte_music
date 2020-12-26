<h1>Liste des tracks en attente de validation</h1>

<?php foreach($tracks as $track) : ?>
    <h3><?php echo $track['nameTrack']; ?></h3>
    <small class="post-date">Posted on : <?php echo $track['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a></p>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/back_office/validate_track/'.$track['idTrack']); ?>">Valider la track</a></p>
<?php endforeach; ?>