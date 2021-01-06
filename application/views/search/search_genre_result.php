<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5><br>
<?php if ($this->session->userdata('logged_in')) : ?>

<?php endif; ?>
<section class="contact">
    <div class="container">
        <div style="text-align:center">
            <div class="card text-center">
                <div class="card-header">
                    Rechercher</div>
                <div class="card-body">
                    <div class="col-md-13">
                        <form action="<?= base_url('search/search_genre_result'); ?>" method="POST">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Chercher un genre..." name="genreSearch">
                                <div class="input-group-append">
                                    <input class="btn btn-success" type="submit" name="genreSend" autocomplete="off" />
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
    </div
    ><br>
    <?= $this->pagination->create_links(); ?>
    <h5>Recherche pour <?= $genreSearch; ?></h5>
    <h5>Resultats: <?= $total_rows; ?></h5>
    <?php if (empty($genres)) : ?>
        <tr>
            <td>
                <div class="alert alert-danger" role="alert">
                    Aucun résultat
                </div>
            </td>
        </tr>
    <?php endif; ?>
    <?php foreach ($genres as $genre) : ?>
        <h5><?php if ($genre['isValidated'] == 1) : ?> Titre du genre : </h5><br>

        <div class="card">
            <h4 class="card-header"><?php echo $genre['genreName']; ?></h4>
            <div class="card-body">
                <p class="card-text">Consulter la story en rapport au genre ici :</p><br>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/' . $genre['slug']); ?>">Detail</a></p><br>
                <p class="card-text">Genre posté le : <?php echo $genre['createdAt']; ?>

            </div>
        </div>

        <br>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

    <?php endif; ?>
<?php endforeach; ?>
</section>