<div class="container">
	<?=$signup_form; ?>
</div>
<?php return ''; ?>
<div class="container">
	<div class="signup">
		<form action="<?=base_url('Membership/signup_attempt')?>" method="POST" novalidate>
			<input type="submit" formaction="Membership/signup_attempt_here" value="keme">

			<fieldset>
				<div class="row">
					<legend class="col-sm-12">Personal info</legend>
					<div class="col-sm-12">
						<div class="row form-group <?=isset($surname_err)?'has-error':''?>">
							<label for="surname" class="text-right col-sm-3 col-form-label <?=isset($surname_err)?'text-danger':''?>">Surname:</label>
							<div class="col-sm-9">
								<input type="text" value="<?=$surname?>" id="surname" name="surname" class="input-sm form-control" required>
							</div>
							<?= isset($surname_err)?$surname_err:'' ?>
						</div>

						<div class="row form-group <?=isset($firstname_err)?'has-error':''?>">
							<label for="firstname" class="text-right col-sm-3 col-form-label <?=isset($firstname_err)?'text-danger':''?>">First name:</label>
							<div class="col-sm-9">
								<input type="text" value="<?=$firstname?>" id="firstname" name="firstname" class="input-sm form-control" required>
							</div>
							<?= isset($firstname_err)?$firstname_err:'' ?>
						</div>

						<div class="row form-group">
							<label for="middlename" class="text-right col-sm-3 col-form-label">Middle name:</label>
							<div class="col-sm-9">
								<input type="text" value="<?=$middlename?>" id="middlename" name="middlename" class="input-sm form-control" required>
							</div>
						</div>
					</div>

				</div>

				<div class="row">

					<div class="form-group col-sm-4 <?=isset($course_section_err)?'has-error':''?>">
						<label for="course_section" <?=isset($course_section_err)?'class="text-danger"':''?>>Course/Section:</label>
						<input type="text" value="<?=$course_section?>" id="course_section" name="course_section" class="input-sm form-control" required>
						<?= isset($course_section_err)?$course_section_err:'' ?>
					</div>

					<div class="form-group col-sm-2 <?=isset($year_grade_err)?'has-error':''?>">
						<label for="year_grade" <?=isset($year_grade_err)?'class="text-danger"':''?>>Year/Grade:</label>
						<select id="year_grade" name="year_grade" class="input-sm form-control">
							<?php for ($i=1; $i <= 12; $i++) { 
								echo "<option value='$i'>$i</option>";
							} ?>
						</select>
						<?= isset($year_grade_err)?$year_grade_err:'' ?>
					</div>

					<div class="form-group col-sm-6 <?=isset($adviser_err)?'has-error':''?>">
						<label for="adviser" <?=isset($adviser_err)?'class="text-danger"':''?>>Adviser:</label>
						<input type="text" value="<?=$adviser?>" id="adviser" name="adviser" class="input-sm form-control" required>
						<?= isset($adviser_err)?$adviser_err:'' ?>
					</div>

				</div>

			</fieldset>

			<fieldset class="row">

				<legend class="col-sm-12">Contact info</legend>

				<div class="form-group col-sm-6 <?=isset($contact_number_err)?'has-error':''?>">
					<label for="contact_number" <?=isset($contact_number_err)?'class="text-danger"':''?>>Contact number:</label>
					<input type="text" value="<?=$contact_number?>" id="contact_number" name="contact_number" class="input-sm form-control" required>
					<?= isset($contact_number_err)?$contact_number_err:'' ?>
				</div>

				<div class="form-group col-sm-6">
					<label for="email">E-mail Address:</label>
					<input type="text" value="<?=$email?>" id="email" name="email" class="input-sm form-control">
				</div>

				<div class="form-group col-sm-12">
					<div class="row">
						<label for="address" class="col-sm-3 col-form-label">Home Address:</label>
						<div class="col-sm-9">
							<textarea id="address" name="address" class="input-sm form-control" style="min-width:100%;max-width:100%"><?=$surname?></textarea>
						</div>
					</div>
				</div>

			</fieldset>

			<fieldset class="row">

				<legend class="col-sm-12">Account info</legend>

				<div class="col-sm-12">

					<div class="row form-group <?=isset($username_err)?'has-error':''?>">
						<label for="username" class="col-sm-3 col-form-label <?=isset($username_err)?'text-danger':''?>">Username:</label>
						<div class="col-sm-6">
							<input type="text" value="<?=$username?>" id="username" name="username" class="input-sm form-control" required>
						</div>
						<?= isset($username_err)?$username_err:'' ?>
					</div>

					<div class="row form-group <?=isset($password_err)?'has-error':''?>">
						<label for="password" class="col-sm-3 col-form-label <?=isset($password_err)?'text-danger':''?>">Password:</label>
						<div class="col-sm-6">
							<input type="password" id="password" name="password" class="input-sm form-control" required>
						</div>
						<?= isset($password_err)?$password_err:'' ?>
					</div>

					<div class="row form-group <?=isset($confirm_password_err)?'has-error':''?>">
						<label for="confirm_password" class="col-sm-3 col-form-label <?=isset($confirm_password_err)?'text-danger':''?>">Confirm Password:</label>
						<div class="col-sm-6">
							<input type="password" id="confirm_password" name="confirm_password" class="input-sm form-control" required>
						</div>
						<?= isset($confirm_password_err)?$confirm_password_err:'' ?>
					</div>

					<div class="row form-group">
						<input id="create_account" type="submit" class="btn btn-primary col-sm-offset-3" value="Create Account">
					</div>

				</div>

			</fieldset>


		</form>
	</div>
</div>