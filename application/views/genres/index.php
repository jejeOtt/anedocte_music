<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<?php if($this->session->userdata('logged_in')): ?>

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Créer un nouveau genre ici : </h5><br>
            <p><a class="btn btn-lg btn-primary" href="<?php echo site_url('/genres/create'); ?>">Créer genre</a></p>
        </div>
        <div class="card-footer text-muted">
             Attention ! Le genre n'apparaît que lorsqu'il est validé.
        </div>
    </div>

<?php endif;?>

<?php foreach($genres as $genre) : ?>
        <h5><?php if($genre['isValidated'] == 1): ?> Titre du genre : </h5><br>

        <div class="card">
            <h4 class="card-header"><?php echo $genre['genreName']; ?></h4>
            <div class="card-body">
                <p class="card-text">Consulter la story en rapport au genre ici :</p><br>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p><br>
                <p class="card-text">Genre posté le : <?php echo $genre['createdAt']; ?>
                <p class="card-text">Numéro Créateur : <?php echo $genre['idUser']; ?>
                
            </div>
        </div>

        <br><hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

    <?php endif; ?>
<?php endforeach; ?>