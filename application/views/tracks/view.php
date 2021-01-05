<h2 style="text-align:center"><?php echo $track['nameTrack']; ?></h2>
<small class="track-date">fait le : <?php echo $track['createdAt']; ?></small><br>
<div class="track-body">
<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo(substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
</div>

<hr>

<?php if($this->session->userdata('roleId') < 3 || $this->session->userdata('idUser') == $track['idUser']): ?>
    <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>tracks/edit/<?php echo $track['slug']; ?>">
    Edit</a>
    <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>tracks/delete/<?php echo($track['idTrack']); ?>">
    Supprimer</a>

<?php endif; ?>

