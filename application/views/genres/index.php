<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" border="0" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<br>
<?php if($this->session->userdata('logged_in')): ?>

    <div class="card text-center">
        <div class="card-body">
            <p><a class="btn btn-lg btn-primary" href="<?php echo site_url('/genres/create'); ?>">Créer un nouveau genre</a></p>
        </div>
        <div class="card-footer text-muted">
             Attention ! Le genre n'apparaît que lorsqu'il est validé.
        </div>
    </div>
    <br>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

<?php endif;?>

<?= $this->pagination->create_links(); ?>
<?php if (empty($genres)) : ?>
    <tr>
        <td>
            <div class="alert alert-danger" role="alert">
                Cette page ne contient pas de genres
            </div>
        </td>
    </tr>
<?php endif; ?>
<?php foreach($genres as $genre) : ?>
    <?php if($genre['isValidated'] == 1): ?>

        <div class="card my-5">
            <div class="card-header">
                <h4><?php echo $genre['genreName']; ?></h4>
                <small>Genre posté le : <?php echo $genre['createdAt']; ?></small>
            </div>
            <div class="card-body">
                <p class="card-text story">"<?php echo $genre['story'] ;?>"</p>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Détail</a></p>    
            </div>
        </div>

    <?php endif; ?>
<?php endforeach; ?>