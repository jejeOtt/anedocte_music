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