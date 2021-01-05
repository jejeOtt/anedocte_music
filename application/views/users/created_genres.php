<h5 style="text-align:center" class="h3 mb-3 fw-bold">Mes genres créer</h5>

<?php foreach($my_genres as $genre) : ?>



    <div class="card">
            <h4 class="card-header"><?php echo $genre['genreName']; ?></h4>
            <div class="card-body">
                <p class="card-text">Consulter la story en rapport au genre ici :</p><br>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p>
                <p class="card-text">Genre posté le : <?php echo $genre['createdAt']; ?>

            </div>
    </div>

<?php endforeach; ?>