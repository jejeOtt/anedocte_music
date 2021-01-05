<h2><?php echo $genre['genreName']; ?></h2>
<!--
<small class="genre-date">fait le : <?php echo $genre['createdAt']; ?></small><br>
-->
<div class="genre-body">

    <?php echo $genre['story']; ?>
</div>

<!-- Ne sont accessibles que si on est modérateur ou admin, ou que l'utilisateur a crée la ressource -->
<?php if($this->session->userdata('roleId') == 1 || $this->session->userdata('roleId') == 2 || $this->session->userdata('idUser') == $genre['idUser']): ?>
    <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>genres/edit/<?php echo $genre['slug']; ?>">
    Edit</a>
    <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>genres/delete/<?php echo($genre['idGenre']); ?>">
    Supprimer</a>
<?php endif; ?>

<?php if(isset($this->session->userdata['logged_in'])): ?>
    <a class="btn btn-success pull-left" href="<?php echo base_url(); ?>tracks/create">
    Ajouter une nouvelle track</a>
<?php endif; ?>
<hr>


<!-- Liste des tracks liées au genre. La track doit avoir été validé, donc isValidated == 1 -->
<?php foreach($tracks as $track) : ?>
    <?php if($track['isValidated'] == 1) : ?>
        <p><?php echo($track['nameTrack']) ;?></p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo(substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>    
    <?php endif; ?>
<?php endforeach; ?>