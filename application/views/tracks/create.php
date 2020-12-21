<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('tracks/create'); ?>
  <div class="form-group">
    <label>Nom d'un morceau</label>
    <input type="text" class="form-control" name="nameTrack" placeholder="Ajoutez un morceau">
  </div>
  <div class="form-group">
    <label>url</label>
    <input type="text" class="form-control" name="url" placeholder="Ajoutez un url">
  </div>
  <div class="form-group">
    <label>Genres</label>
    <select name="idGenre" class="form-control">
      <?php foreach($genres as $genre): ?>
      <option value="<?php echo $genre['idGenre']; ?>"><?php echo $genre['genreName']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>