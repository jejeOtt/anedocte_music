<h2><?php echo $track['nameTrack']; ?></h2>
<small class="track-date">fait le : <?php echo $track['createdAt']; ?></small><br>
<div class="track-body">
    <?php echo $track['url']; ?>
</div>

<hr>
<a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>
tracks/edit/<?php echo $track['slug']; ?>">
Edit</a>
<?php echo form_open('/tracks/delete/'.$track['idTrack']); ?>
    <input type="submit" value="Supprimer" class="btn btn-danger">
</form>