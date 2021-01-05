<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<?php echo validation_errors(); ?>

<?php echo form_open('tracks/create'); ?>
  <div class="form-group">
    <label>Nom du morceau</label>
    <input type="text" class="form-control" name="nameTrack" placeholder="Ajoutez un morceau">
  </div>
  <div class="form-group">
    <label>URL</label>
    <input type="text" class="form-control" name="url" placeholder="Ajoutez un URL">
  </div>
  <div class="form-group">
    <label>Genres</label>
    <select name="idGenre" class="form-control">
      <?php foreach($genres as $genre): ?>
      <option value="<?php echo $genre['idGenre']; ?>"><?php echo $genre['genreName']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>

  
</form>