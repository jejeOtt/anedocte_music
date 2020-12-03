<h2><?= $title ?></h2>
<br>
<?php foreach($posts as $post) : ?>
    <h3><?php echo $post['tracks']; ?></h3>
    <small class="post-date">Posted on : <?php echo $post['created_at']; ?></small><br>
    <?php echo $post['genre']; ?><br><br>
    <p><a class="btn btn-outline-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">TEST</a></p>
<?php endforeach; ?>