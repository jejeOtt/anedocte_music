<h2><?= $title ?></h2>
<br>
<?php 
    //var_dump($tracks);
?>
<?php if($this->session->userdata('logged_in')): ?>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/tracks/create'); ?>">Ajouter une nouvelle tracks</a></p>
<?php endif;?>
<?php foreach($tracks as $track)  : ?>
    <?php if($track['isValidated'] == 1): ?> Associé au genre <?php echo $track['genreName']; ?>
        <h3><?php echo $track['nameTrack']; ?></h3>
        <small class="post-date">Posted on : <?php echo $track['createdAt']; ?></small><br>
        <p><a class="btn btn-outline-primary" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a></p>
        
        <span style="color: red"><?php echo($track['slug']);?></span>
        <br>
    <?php endif ;?>
<?php endforeach; ?>