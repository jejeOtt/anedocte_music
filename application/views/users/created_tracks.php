<h1>Mes tracks</h1>

<?php foreach($my_tracks as $track) : ?>
    <h3><?php echo $track['nameTrack']; ?></h3>
    <small class="post-date">Posted on : <?php echo $track['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a></p>
<?php endforeach; ?>