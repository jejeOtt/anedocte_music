<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Mes genres</h5>
<br>
<?= $this->pagination->create_links(); ?>
<?php if (empty($my_genres)) : ?>
    <tr>
        <td>
            <div class="alert alert-dark" role="alert">
                Vous n'avez pas créer de genres
            </div>
        </td>
    </tr>
<?php endif; ?>
<?php foreach ($my_genres as $genre) : ?>
    <div class="card my-5">
        <div class="card-header">
            <h4><?php echo $genre['genreName']; ?></h4>
            <small>Genre posté le : <?php echo $genre['createdAt']; ?></small>
        </div>
        <div class="card-body">
            <p class="card-text story">"<?php echo $genre['story']; ?>"</p>
            <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/' . $genre['slug']); ?>">Détail</a></p>
            <?php if ($genre['isValidated'] == 0) : ?>
                <p class="alert alert-secondary">En attente de validation</p>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>