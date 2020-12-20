<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('tracks/create'); ?>
  <div class="form-group">
    <label>Nom d'un morceau</label>
    <input type="text" class="form-control" name="nameTrack" placeholder="Ajoutez un track"
    value="<?php echo $track['nameTrack']; ?>">
  </div>
  <div class="form-group">
    <label>Mettre un url qui convient au morceau</label>
    <input type="text" class="form-control" name="url" placeholder="Ajoutez un url"
    value="<?php echo $track['url']; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>