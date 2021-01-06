<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Mes tracks</h5>
<br>
<?= $this->pagination->create_links(); ?>
<?php if (empty($my_tracks)) : ?>
    <tr>
        <td>
            <div class="alert alert-dark" role="alert">
                Vous n'avez pas créer de tracks
            </div>
        </td>
    </tr>
<?php endif; ?>
<?php foreach($my_tracks as $track) : ?>
    <div class="card my-5">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3 class="card-title"><?php echo $track['nameTrack']; ?></h3>
                    <small class="card-text mb-5"><p>Track postée le : <?php echo $track['createdAt']; ?></p></small>
                    <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/' . $track['slug']); ?>">Detail</a></p>
                    <?php if($track['isValidated'] == 0): ?>
                        <p class="alert alert-secondary">En attente de validation</p>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <iframe width="500" height="250" src="https://www.youtube.com/embed/<?php echo (substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

