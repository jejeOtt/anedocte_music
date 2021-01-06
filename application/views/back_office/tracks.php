<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Liste des tracks en attente de validation</h5><br>

<?php if ($tracks) : ?>
    <?php foreach ($tracks as $track) : ?>
        <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Titre du morceau : <?php echo $track['nameTrack']; ?></h5><br>
                                <p class="card-text">Track postée le : <?php echo $track['createdAt']; ?>
                                <br>
                                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a>  <a class="btn btn-lg btn-info" 
                href="<?php echo site_url('/back_office/validate_track/'.$track['idTrack']); ?>">Valider la track</a></p><br>
                                <br>  
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Video</h5>
                                <p class="card-text">Vous pouvez écoutez ce morceau ici : </p>
                                <iframe width="500" height="175" src="https://www.youtube.com/embed/<?php echo (substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
        <br>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>
    <?php endforeach; ?>
<?php else : ?>
    <h3>Il n'y a aucune nouvelles tracks en attente de validation</h3>
<?php endif; ?>