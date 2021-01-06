<br><a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<?php echo validation_errors(); ?>

<?php echo form_open('tracks/update'); ?>
<input type="hidden" name="idTrack" value="<?php echo $track['idTrack']; ?>">
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
  <div class="form-group">
    <label>IdGenre</label>
    <select name="idGenre" class="form-control">
      <?php foreach($genres as $genre): ?>
      <option value="<?php echo $genre['idGenre']; ?>"><?php echo $genre['genreName']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>