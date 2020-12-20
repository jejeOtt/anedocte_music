<h2><?= $title ?></h2>
<br>
<?php if($this->session->userdata('logged_in')): ?>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/genres/create'); ?>">Créer un nouveau genre</a></p>
<?php endif;?>

<?php foreach($genres as $genre) : ?>
    <h3><?php echo $genre['genreName']; ?></h3>
    <small class="post-date">Posted on : <?php echo $genre['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p>
<?php endforeach; ?>