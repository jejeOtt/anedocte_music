<a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h5 style="text-align:center" class="h3 mb-3 fw-bold"><?= $title ?></h5>

<?php echo validation_errors(); ?>

<br><?php echo form_open('admin_office/import'); ?>
  <div class="form-group">
    <label>Choisissez le nombre de genre que vous voulez importer : </label><br>
    <br><input type="number" min="1" max="50" class="form-control" name="importForm" placeholder="Ajoutez un nombre"><br>
  </div>
  <div style="text-align:center">
  <button type="submit" class="btn btn-lg btn-info">Valider</button>
  </div>
</form>