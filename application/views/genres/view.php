<h2><?php echo $genre['genreName']; ?></h2>
<small class="genre-date">fait le : <?php echo $genre['createdAt']; ?></small><br>
<div class="genre-body">
    <?php echo $genre['story']; ?>
</div>

<hr>
<a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>
genres/edit/<?php echo $genre['slug']; ?>">
Edit</a>
<?php echo form_open('/genres/delete/'.$genre['idGenre']); ?>
    <input type="submit" value="Supprimer" class="btn btn-danger">
</form>

<!-- Liste des tracks liées au genre. La track doit avoir été validé, donc isValidated == 1 -->
<?php foreach($tracks as $track) : ?>
    <?php if($track['isValidated'] == 1) : ?>
        <p><?php echo($track['nameTrack']) ;?></p>
    <?php endif; ?>
<?php endforeach; ?>