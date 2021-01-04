<h2><?=$title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('admin_office/import'); ?>
  <div class="form-group">
    <label>Choisissez le nombre de genre et de stories que vous voulez importer</label>
    <input type="number" min="1" max="100" class="form-control" name="importForm" placeholder="Ajoutez un nombre">
  </div>
  <button type="submit" class="btn btn-primary">Validé</button>
</form>