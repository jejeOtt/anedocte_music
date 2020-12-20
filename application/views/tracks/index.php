<h2><?= $title ?></h2>
<br>
<?php foreach($tracks as $track) : ?>
    <h3><?php echo $track['nameTrack']; ?></h3>
    <small class="post-date">Posted on : <?php echo $track['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a></p>
<?php endforeach; ?>