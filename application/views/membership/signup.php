<div class="container">
	<div class="signup">
		<form action="<?=base_url('Membership/signup_attempt')?>" method="POST">

			<fieldset>
				<div class="row">
					<legend class="col">Personal info</legend>

					<div class="form-group col-sm-4 <?=isset($surname_err)?'has-error':''?>">
						<label for="surname" <?=isset($surname_err)?'class="text-danger"':''?>>Last name:</label>
						<input type="text" value="<?=$surname?>" id="surname" name="surname" class="input-sm form-control">
						<?= isset($surname_err)?$surname_err:'' ?>
					</div>

					<div class="form-group col-sm-4 <?=isset($firstname_err)?'has-error':''?>">
						<label for="firstname" <?=isset($firstname_err)?'class="text-danger"':''?>>First name:</label>
						<input type="text" value="<?=$firstname?>" id="firstname" name="firstname" class="input-sm form-control">
						<?= isset($firstname_err)?$firstname_err:'' ?>
					</div>

					<div class="form-group col-sm-4">
						<label for="middlename">Middle name:</label>
						<input type="text" value="<?=$middlename?>" id="middlename" name="middlename" class="input-sm form-control">
					</div>

				</div>

				<div class="row">

					<div class="form-group col-sm-4 <?=isset($course_section_err)?'has-error':''?>">
						<label for="course_section" <?=isset($course_section_err)?'class="text-danger"':''?>>Course/Section:</label>
						<input type="text" value="<?=$course_section?>" id="course_section" name="course_section" class="input-sm form-control">
						<?= isset($course_section_err)?$course_section_err:'' ?>
					</div>

					<div class="form-group col-sm-4 <?=isset($year_grade_err)?'has-error':''?>">
						<label for="year_grade" <?=isset($year_grade_err)?'class="text-danger"':''?>>Year/Grade:</label>
						<select id="year_grade" name="year_grade" class="input-sm form-control">
							<?php for ($i=1; $i <= 12; $i++) { 
								echo "<option value='$i'>$i</option>";
							} ?>
						</select>
						<?= isset($year_grade_err)?$year_grade_err:'' ?>
					</div>

					<div class="form-group col-sm-4 <?=isset($adviser_err)?'has-error':''?>">
						<label for="adviser" <?=isset($adviser_err)?'class="text-danger"':''?>>Adviser:</label>
						<input type="text" value="<?=$adviser?>" id="adviser" name="adviser" class="input-sm form-control">
						<?= isset($adviser_err)?$adviser_err:'' ?>
					</div>

				</div>

			</fieldset>

			<fieldset class="row">

				<legend>Contact info</legend>

				<div class="form-group col-sm-6 <?=isset($contact_number_err)?'has-error':''?>">
					<label for="contact_number" <?=isset($contact_number_err)?'class="text-danger"':''?>>Contact number:</label>
					<input type="text" value="<?=$contact_number?>" id="contact_number" name="contact_number" class="input-sm form-control">
					<?= isset($contact_number_err)?$contact_number_err:'' ?>
				</div>

				<div class="form-group col-sm-6">
					<label for="email">E-mail Address:</label>
					<input type="text" value="<?=$email?>" id="email" name="email" class="input-sm form-control">
				</div>

				<div class="form-group col-sm-12">
					<div class="row">
						<label for="address" class="col-sm-2 col-form-label">Home Address:</label>
						<div class="col-sm-10">
							<textarea id="address" name="address" class="input-sm form-control" style="min-width:100%;max-width:100%"><?=$surname?></textarea>
						</div>
					</div>
				</div>

			</fieldset>

			<fieldset class="row">

				<legend>Account info</legend>

				<div class="col-sm-12">

					<div class="row form-group <?=isset($username_err)?'has-error':''?>">
						<label for="username" class="col-sm-3 col-form-label <?=isset($username_err)?'text-danger':''?>">Username:</label>
						<div class="col-sm-6">
							<input type="text" value="<?=$username?>" id="username" name="username" class="input-sm form-control">
						</div>
						<?= isset($username_err)?$username_err:'' ?>
					</div>

					<div class="row form-group <?=isset($password_err)?'has-error':''?>">
						<label for="password" class="col-sm-3 col-form-label <?=isset($password_err)?'text-danger':''?>">Password:</label>
						<div class="col-sm-6">
							<input type="password" id="password" name="password" class="input-sm form-control">
						</div>
						<?= isset($password_err)?$password_err:'' ?>
					</div>

					<div class="row form-group <?=isset($confirm_password_err)?'has-error':''?>">
						<label for="confirm_password" class="col-sm-3 col-form-label <?=isset($confirm_password_err)?'text-danger':''?>">Confirm Password:</label>
						<div class="col-sm-6">
							<input type="confirm_password" id="confirm_password" name="confirm_password" class="input-sm form-control">
						</div>
						<?= isset($confirm_password_err)?$confirm_password_err:'' ?>
					</div>

					<div class="row form-group">
						<input id="create_account" type="submit" class="btn btn-primary center-block" value="Create Account">
					</div>

				</div>

			</fieldset>


		</form>
	</div>
</div>