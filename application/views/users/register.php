<?php 
// Fonction de codeigniter qui va renvoyer un message d'erreur par la validateur. Renvoie une chaine de caractere vide s'il n'y a pas de message
echo validation_errors(); ?>

<?php echo form_open(''); ?>
    <div>
        <label>Pseudonyme / User name</label>
        <input type="text" name="userName" placeholder="Nom d'utilisateur">

        <label>Email</label>
        <input type="text" name="email" placeholder="Email">

        <label>Date de naissance</label>
        <input type="text" name="dateOfBirth" placeholder="date de naissance">

        <label>Mot de passe</label>
        <input type="password" name="password" placeholder="mot de passe">

        <label>Tapez encore une fois le mot de passe</label>
        <input type="password" name="password2" placeholder="confirmation mot de passe">
    </div>
<?php echo form_close(); ?>