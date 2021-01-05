<?php 
// Fonction de codeigniter qui va renvoyer un message d'erreur par la validateur. Renvoie une chaine de caractere vide s'il n'y a pas de message
echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

<body>
        <div class="container">
            <div style="text-align:center">
            <h5 class="h3 mb-3 fw-bold">Inscription</h5>
	               	</div>
	            </div><br>
                <div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Nom d'utilisateur</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="userName" placeholder="Renseignez votre nom d'utilisateur"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" placeholder="Renseignez votre mail"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Renseignez votre mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password2" placeholder="Confirmez votre mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<br><button type="submit" class="btn btn-primary btn-lg btn-block login-button">Je m'inscris</button><br><br>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>

	</body>

<?php echo form_close(); ?>