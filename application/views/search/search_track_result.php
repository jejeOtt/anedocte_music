<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>
<br>

<body>
    <section class="contact">
        <div class="container">
            <div style="text-align:center">
                <div class="card text-center">
                    <div class="card-header">
                        Rechercher</div>
                    <div class="card-body">
                        <div class="col-md-13">
                            <form action="<?= base_url('search/search_track_result'); ?>" method="POST">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Chercher un morceau..." name="trackSearch">
                                    <div class="input-group-append">
                                        <input class="btn btn-success" type="submit" name="trackSend" autocomplete="off" />
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="resetSend" value="reset" autocomplete="off">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <?= $this->pagination->create_links(); ?>
        <h5>Recherche pour <?= $trackSearch; ?></h5>
        <h5>Resultats: <?= $total_rows; ?></h5>
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
            <div class="card my-5">
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
        <?php endif; ?>
    <?php endforeach; ?>
</body>