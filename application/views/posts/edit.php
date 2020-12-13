<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Morceau</label>
    <input type="text" class="form-control" name="tracks" placeholder="Ajoutez un morceau"
    value="<?php echo $post['tracks']; ?>">
  </div>
  <div class="form-group">
    <label>Lien d'une vidéo en rapport avec le morceau*</label>
    <input type="text" class="form-control" name="url" placeholder="Ajoutez un url">
    <small id="emailHelp" class="form-text text-muted">*Falcutatif</small>
  </div>
  <div class="form-group">
  <label>Choisissez le genre que vous souhaitez assigné au morceau</label>
  <select class="form-control" name="genre">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>