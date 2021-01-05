<h5 style="text-align:center" class="h3 mb-3 fw-bold">Mes tracks</h5>
<br>
<?php foreach($my_tracks as $track) : ?>
    <div class="card">
            <h4 class="card-header"><?php echo $track['nameTrack']; ?></h4>
            <div class="card-body">
                <p class="card-text">Consulter ma story en rapport à mon genre ici :</p><br>
                <p style="text-align:left"><a class="btn btn-lg btn-warning" href="<?php echo site_url('/tracks/'.$track['slug']); ?>">Detail</a></p><br>
                <p class="card-text">Mon genre à été posté le : <?php echo $track['createdAt']; ?>
            </div>
        </div>

        <br><hr style="height:2px;border-width:0;color:gray;background-color:gray"><br>

<?php endforeach; ?>

