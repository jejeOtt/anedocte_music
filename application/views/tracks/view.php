<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?php echo $track['nameTrack']; ?></h5><br>
<div class="track-body">
<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo(substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
</div>
<br><small class="track-date">fait le : <?php echo $track['createdAt']; ?></small><br>

<hr>

<?php if($this->session->userdata('roleId') < 3 || $this->session->userdata('idUser') == $track['idUser']): ?>
    <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>tracks/edit/<?php echo $track['slug']; ?>">
    Edit</a>
    <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>tracks/delete/<?php echo($track['idTrack']); ?>">
    Supprimer</a>

<?php endif; ?>

