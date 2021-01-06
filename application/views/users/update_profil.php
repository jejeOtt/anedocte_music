<h1>Modification Profil View</h1>
<?php 
// Fonction de codeigniter qui va renvoyer un message d'erreur par la validateur. Renvoie une chaine de caractere vide s'il n'y a pas de message
echo validation_errors(); ?>

<?php echo form_open('users/update_profil'); ?>

    <body>
        <div class="container">
            <div style="text-align:center">
            <h5 class="h3 mb-3 fw-bold">Modification du profil</h5>
	               	</div>
	            </div><br>
				<?php if($this->session->flashdata('user_name_error')):?>
					<span class="alert alert-danger"><?php echo($this->session->flashdata('user_name_error')); ?></span>
				<?php endif;?>
				<?php if($this->session->flashdata('user_email_error')):?>
					<span class="alert alert-danger"><?php echo($this->session->flashdata('user_email_error')); ?></span>
				<?php endif;?>
                <div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Nom d'utilisateur</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="userName" value="<?php echo($this->session->userdata['userName'])?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" value="<?php echo($this->session->userdata['email'])?>"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<br><button type="submit" class="btn btn-primary btn-lg btn-block login-button">Mettre à jours mes informations</button><br><br>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>

	</body>

<?php echo form_close(); ?>