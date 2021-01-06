<h5 style="text-align:center" class="h3 mb-3 fw-bold">Liste des genres en attente de validation</h5>

<?php if($genres): ?>
    <?php foreach($genres as $genre) : ?>
        <div class="card">
                <h4 class="card-header"><?php echo $genre['genreName']; ?></h4>
                <div class="card-body">
                    <p class="card-text">Consulter la story en rapport au genre ici :</p><br>
                    <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p></a>  <a class="btn btn-lg btn-info" class="btn btn-outline-primary" href="<?php echo site_url('/back_office/validate_genre/'.$genre['idGenre']); ?>">Valider le genre</a><br>
                    <p class="card-text">Genre posté le : <?php echo $genre['createdAt']; ?>
                    <p class="card-text">Numéro Créateur : <?php echo $genre['idUser']; ?>
                    
                </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Il n'y a aucun nouveau Genre en attente de validation</h3>
<?php endif; ?>