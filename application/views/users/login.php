<?php
    echo validation_errors(); 
    // Le formulire est envoyé au controlleur sur sa méthode login 
    echo form_open('users/login'); ?>
    <div>
        <label>Nom d'utilisateur</label>
        <input type="text" name="userName" placeholder="nom utilisateur">

        <label>Mot de passe</label>
        <input type="password" name="password" placeholder="mot de passe">

        <button type="submit" class="">Submit</button>
    </div>
<?php echo form_close(); ?>