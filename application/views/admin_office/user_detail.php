<h1>This is view for User Detail !</h1>

<p><?php echo($user['userName']); ?></p>
<p><?php echo($user['email']); ?></p>
<p><?php echo($user['roleId']); ?></p>
<p><?php echo($user['idUser']);?></p>

<?php echo form_open('admin_office/update_role_user'); ?>
    <div>
        <label>Role</label>
        <select name="roleId">
            <option value="">Définir un rôle</option>
            <option value="1">Administrateur</option>
            <option value="2">Modérateur</option>
            <option value="3">Utilisateur</option>
        </select>

        <input type="hidden" name="idUser" value="<?php echo($user['idUser']);?>">

        <button type="submit" class="">Submit</button>
    </div>
<?php echo form_close(); ?>