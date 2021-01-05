<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>
<br>
<?php if ($this->session->userdata('logged_in')) : ?>
    <p class="d-flex justify-content-end"><a class="btn btn-lg btn-primary" href="<?php echo site_url('/genres/create'); ?>">Créer un nouveau genre</a></p>
<?php endif; ?>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('genres'); ?>" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Chercher un genre..." name="genreSearch">
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="genreSend" autocomplete="off" autofocus />
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->pagination->create_links(); ?>
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
    <?php if ($genre['isValidated'] == 1) : ?>
        <h3><?php echo $genre['genreName']; ?></h3>

        <h4 style="text-align:right"><small class="post-date">Track postée le : <?php echo $genre['createdAt']; ?></small></h4><br>
        <h4 style="text-align:right"><small class="post-name">Numéro Créateur : <?php echo $genre['idUser']; ?></small></h4><br>
        <p style="text-align:right"><a class="btn btn-lg btn-primary" href="<?php echo site_url('/genres/' . $genre['slug']); ?>">Detail</a></p>

        <br>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

    <?php endif; ?>
<?php endforeach; ?>