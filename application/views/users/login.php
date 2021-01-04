<?php
    echo validation_errors(); 
    // Le formulire est envoyé au controlleur sur sa méthode login 
    echo form_open('users/login'); ?>
   
        <div class="container">
            <div style="text-align:center">
            <h5 class="h3 mb-3 fw-bold">Connexion</h5>

            <br>
            <input type="text" name="userName"  class="form-control" class="col-sm-3 col-form-label" placeholder="Nom d'utilisateur">
            
            <br>
            <br>
            
            <input type="password" class="form-control" name="password" class="col-sm-3 col-form-label" placeholder="Mot de passe">
            <br>
            <div class="checkbox mb-3">
            <label>
                <br>
                <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
        </div>


 <!-- <div>
        <label>Nom d'utilisateur</label>
        <input type="text" name="userName" placeholder="nom utilisateur">

        <label>Mot de passe</label>
        <input type="password" name="password" placeholder="mot de passe">

        <button type="submit" class="">Submit</button>
    </div> -->

<?php echo form_close(); ?>