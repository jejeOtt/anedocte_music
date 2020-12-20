<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('genres/create'); ?>
  <div class="form-group">
    <label>Nom d'un morceau</label>
    <input type="text" class="form-control" name="nameTrack" placeholder="Ajoutez un morceau">
  </div>
  <div class="form-group">
    <label>url</label>
    <input type="text" class="form-control" name="genreName" placeholder="Ajoutez un url">
  </div>
  <div class="form-group">
    <label>IdGenre</label>
    <input type="text" class="form-control" name="IdGenre" placeholder="IdGenre">
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>