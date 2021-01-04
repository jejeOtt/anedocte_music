<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<?php echo validation_errors(); ?>

<?php echo form_open('genres/update'); ?>
<input type="hidden" name="idGenre" value="<?php echo $genre['idGenre']; ?>">
  <div class="form-group">
    <label>Genre</label>
    <input type="text" class="form-control" name="genreName" placeholder="Ajoutez un genre"
    value="<?php echo $genre['genreName']; ?>">
  </div>
  <div class="form-group">
    <label>Choisissez votre anecdote</label>
    <input type="text" class="form-control" name="story" placeholder="Ajoutez une histoire"
    value="<?php echo $genre['story']; ?>">
  </div>
  <div class="form-group">
    <label>Idendifiant utilisateur</label>
    <input type="text" class="form-control" name="idUser" placeholder="idUser"
    value="<?php echo $genre['idUser']; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>