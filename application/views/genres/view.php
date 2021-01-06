<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Editer un genre</h5><br>
<!--
<small class="genre-date">fait le : <?php echo $genre['createdAt']; ?></small><br>
-->

<hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

<div class="card mb-1" style="max-width: 650px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="https://img.icons8.com/plasticine/2x/apple-music.png" alt="LogoCard">
            </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><h2><?php echo $genre['genreName']; ?></h2></h5>
                <p class="card-text"><?php echo $genre['story']; ?></p>
            </div>
        </div>
    </div><br>

    <!-- Ne sont accessibles que si on est modérateur ou admin, ou que l'utilisateur a crée la ressource -->
        <?php if($this->session->userdata('roleId') == 1 || $this->session->userdata('roleId') == 2 || $this->session->userdata('idUser') == $genre['idUser']): ?>
            <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>genres/edit/<?php echo $genre['slug']; ?>">
            Edit</a>
            <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>genres/delete/<?php echo($genre['idGenre']); ?>">
            Supprimer</a>
        <?php endif; ?>

        <?php if(isset($this->session->userdata['logged_in'])): ?>
            <a class="btn btn-success pull-left" href="<?php echo base_url(); ?>tracks/create">
            Ajouter une nouvelle track</a>    <br>
        <?php endif; ?>

            
<!-- Liste des tracks liées au genre. La track doit avoir été validé, donc isValidated == 1 -->

<?php if($tracks) :?>
    <?php foreach($tracks as $track) : ?>
        <?php if($track['isValidated'] == 1) : ?>
            <p><?php echo($track['nameTrack']) ;?></p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo(substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>    
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Il n'y a pas encore de tracks pour ce genre</h3>
<?php endif;?>
