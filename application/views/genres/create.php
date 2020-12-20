<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('genres/create'); ?>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" class="form-control" name="genreName" placeholder="Ajoutez un genre">
  </div>
  <div class="form-group">
    <label>Choisissez l'histoire qui convient au genre</label>
    <input type="text" class="form-control" name="story" placeholder="Ajoutez une histoire">
  </div>
  <!-- <div class="form-group">
    <label>IdUser</label>
    <input type="text" class="form-control" name="idUser" placeholder="idUser">
  </div> -->
  <button type="submit" class="btn btn-primary">Validé</button>
</form>