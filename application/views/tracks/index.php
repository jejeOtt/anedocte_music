<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>
<br>

<body>
    <section class="contact">
        <div class="container">
            <div style="text-align:right">
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo site_url('/tracks/create'); ?>">Ajouter une nouvelle tracks</a></p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?= base_url('tracks'); ?>" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Chercher un morceau..." name="trackSearch">
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="trackSend" autocomplete="off" autofocus />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?= $this->pagination->create_links(); ?>
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
                <h3><?php if ($track['isValidated'] == 1) : ?> Dans la catégorie : <?php echo $track['genreName']; ?></h3><br>
                <h4><?php echo $track['nameTrack']; ?></h4><br>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $track["url"]; ?>?autoplay=1&autohide=1&controls=1&showinfo=0&modestbranding=1&rel=0"></iframe>


                <p><a class="link" href="<?php echo $track['url']; ?>"></a></p>
                <h4 style="text-align:right"><small class="post-date">Track postée le : <?php echo $track['createdAt']; ?></small></h4><br>
                <h4 style="text-align:right"><small class="post-name">Numéro Créateur : <?php echo $track['idUser']; ?></small></h4><br>
                <p style="text-align:right"><a class="btn btn-lg btn-primary" href="<?php echo site_url('/tracks/' . $track['slug']); ?>">Detail</a></p>

                <br>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

            <?php endif; ?>
        <?php endforeach; ?>

        </div>

</body>