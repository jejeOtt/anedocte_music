<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" border="0" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Track</h5>
<br>

<div>
        <?php if ($this->session->userdata('logged_in')) : ?>
            <div class="card text-center">
                <div class="card-body">
                    <p style="text-align:center"><a class="btn btn-lg btn-primary" href="<?php echo site_url('/tracks/create'); ?>">Créer une nouvelle Track</a></p>
                </div>
                <div class="card-footer text-muted">
                    Attention ! Le morceau n'apparaît que lorsqu'il est validé.
                </div>
            </div>
            <br>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>
        <?php endif; ?>
    <?= $this->pagination->create_links(); ?>
    <?php if (empty($tracks)) : ?>
        <tr>
            <td>
                <div class="alert alert-danger" role="alert">
                    Aucun résultat
                </div>
            </td>
        </tr>
    <?php endif; ?>
    <?php foreach ($tracks as $track) : ?>
        <?php if ($track['isValidated'] == 1) : ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title"><?php echo $track['nameTrack']; ?></h3>
                            <small><p>Dans la catégorie : <?php echo $track['genreName']; ?></p></small>
                            <small class="card-text mb-5"><p>Track postée le : <?php echo $track['createdAt']; ?></p></small>
                            <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/' . $track['slug']); ?>">Detail</a></p>
                        </div>

                        <div class="col">
                            <iframe width="500" height="250" src="https://www.youtube.com/embed/<?php echo (substr($track["url"], 17)); ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        <br>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>
        <?php endif; ?>
    <?php endforeach; ?>
</div>