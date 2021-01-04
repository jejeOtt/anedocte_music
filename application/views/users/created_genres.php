<h1>Mes genres crées</h1>

<?php foreach($my_genres as $genre) : ?>
    <h3><?php echo $genre['genreName']; ?></h3>
    <small class="post-date">Posted on : <?php echo $genre['createdAt']; ?></small><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p>
<?php endforeach; ?>