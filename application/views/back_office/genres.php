<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Liste des genres en attente de validation</h5>

<?php if ($genres) : ?>
    <?php foreach ($genres as $genre) : ?>
        <div class="card my-5">
            <div class="card-header">
                <h4><?php echo $genre['genreName']; ?></h4>
                <small>Genre posté le : <?php echo $genre['createdAt']; ?></small>
            </div>
            <div class="card-body">
                <p class="card-text story">"<?php echo $genre['story'] ;?>"</p>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Détail</a></p>
                <p><a class="btn btn-lg btn-info" class="btn btn-outline-primary" href="<?php echo site_url('/back_office/validate_genre/' . $genre['idGenre']); ?>">Valider le genre</a></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <h3>Il n'y a aucun nouveau Genre en attente de validation</h3>
<?php endif; ?>