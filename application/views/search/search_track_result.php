<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>
<br>

<body>
    <section class="contact">
        <div class="container">
            <div style="text-align:left">

                <div class="row">
                    <div class="col-md-4">
                        <form action="<?= base_url('search/search_track_result'); ?>" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Chercher un morceau..." name="trackSearch">
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="trackSend" autocomplete="off" />
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="resetSend" value="reset" autocomplete="off">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                <h5><?php if ($track['isValidated'] == 1) : ?> Dans la catégorie : <?php echo $track['genreName']; ?></h5><br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Titre du morceau : <?php echo $track['nameTrack']; ?></h5>
                                <p class="card-text">Consulter les détails de ce morceau ici : </p><br>
                                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/' . $track['slug']); ?>">Detail</a></p><br>
                                <p class="card-text">Track postée le : <?php echo $track['createdAt']; ?>
                                <p class="card-text">Numéro créateur : <?php echo $track['idUser']; ?>
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
            <?php endif; ?>
        <?php endforeach; ?>
</body>