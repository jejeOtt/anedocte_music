<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold">Mes genres créer</h5><br>

<?php foreach($my_genres as $genre) : ?>



    <div class="card">
            <h4 class="card-header"><?php echo $genre['genreName']; ?></h4>
            <div class="card-body">
                <p class="card-text">Consulter la story en rapport au genre ici :</p><br>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/genres/'.$genre['slug']); ?>">Detail</a></p>
                <p class="card-text">Genre posté le : <?php echo $genre['createdAt']; ?>

            </div>
    </div><br><hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>


<?php endforeach; ?>