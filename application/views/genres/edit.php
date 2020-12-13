<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('genres/create'); ?>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" class="form-control" name="genreName" placeholder="Ajoutez un genre"
    value="<?php echo $genre['genreName']; ?>">
  </div>
  <div class="form-group">
    <label>Choisissez l'histoire qui convient au genre</label>
    <input type="text" class="form-control" name="story" placeholder="Ajoutez une histoire"
    value="<?php echo $genre['story']; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>