<a href="javascript:history.go(-1)"><img src="https://www.pngarts.com/files/2/Back-PNG-Download-Image.png" width="45" height="45" alt="retour"></a>
<h1>This is view for User Detail !</h1>



<?php echo form_open('admin_office/update_role_user'); ?>
    <div>
        <p><?php echo($user['userName']); ?></p>
        <p><?php echo($user['email']); ?></p>
        <label>Role</label>
        <select name="roleId">
            <option value="1">Administrateur</option>
            <option value="2">Modérateur</option>
            <option value="3">Utilisateur</option>
        </select>

        <input type="hidden" name="idUser" value="<?php echo($user['idUser']);?>">

        <button type="submit" class="">Submit</button>
    </div>
<?php echo form_close(); ?>