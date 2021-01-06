<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>

<!--
<small class="genre-date">fait le : <?php echo $genre['createdAt']; ?></small><br>
-->

<div class="card my-5 py-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://img.icons8.com/plasticine/2x/apple-music.png" alt="LogoCard">
        </div>
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h2 class="card-title"><?php echo $genre['genreName']; ?></h2>
            <p class="card-text story">"<?php echo $genre['story']; ?>"</p>
        </div>
    </div>

     <!-- Ne sont accessibles que si on est modérateur ou admin, ou que l'utilisateur a crée la ressource -->
    <div class="col">
        <?php if($this->session->userdata('roleId') == 1 || $this->session->userdata('roleId') == 2 || $this->session->userdata('idUser') == $genre['idUser']): ?>
            <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>genres/edit/<?php echo $genre['slug']; ?>">Edit</a>
            <a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>genres/delete/<?php echo($genre['idGenre']); ?>">Supprimer</a>
        <?php endif; ?>

        <?php if(isset($this->session->userdata['logged_in'])): ?>
            <a class="btn btn-success pull-left" href="<?php echo base_url(); ?>tracks/create">Ajouter une nouvelle track</a>
        <?php endif; ?>
    </div>
</div>

            
<!-- Liste des tracks liées au genre. La track doit avoir été validé, donc isValidated == 1 -->

<?php if($tracks) :?>
    <?php foreach($tracks as $track) : ?>
        <?php if($track['isValidated'] == 1) : ?>
            <div class="card my-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title"><?php echo $track['nameTrack']; ?></h3>
                            <small class="card-text mb-5"><p>Track postée le : <?php echo $track['createdAt']; ?></p></small>
                            <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/' . $track['slug']); ?>">Detail</a></p>
                        </div>

                        <div class="col">
                            <iframe width="500" height="250" src="https://www.youtube.com/embed/<?php echo (substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <h3 class="alert alert-secondary">Il n'y a pas encore de tracks pour ce genre</h3>
<?php endif;?>
