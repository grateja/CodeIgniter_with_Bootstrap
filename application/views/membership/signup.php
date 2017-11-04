<div class="container">
	<div class="signup">
		<form action="<?=base_url('Membership/signup_attempt')?>" method="POST">
			<fieldset class="row">
				<legend>Personal info</legend>
				<div class="form-group col-sm-4">
					<label for="surname">Last name:</label>
					<input id="surname" name="surname" class="input-sm form-control">
				</div>
				<div class="form-group col-sm-4">
					<label for="firstname">First name:</label>
					<input id="firstname" name="firstname" class="input-sm form-control">
				</div>
				<div class="form-group col-sm-4">
					<label for="middlename">Middle name:</label>
					<input id="middlename" name="middlename" class="input-sm form-control">
				</div>

				<div class="form-group col-sm-4">
					<label for="course_section">Course/Section:</label>
					<input id="course_section" name="course_section" class="input-sm form-control">
				</div>
				<div class="form-group col-sm-4">
					<label for="year_grade">Year/Grade:</label>
					<select id="year_grade" name="year_grade" class="input-sm form-control">
						<?php for ($i=1; $i <= 12; $i++) { 
							echo "<option value='$i'>$i</option>";
						} ?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label for="adviser">Adviser:</label>
					<input id="adviser" name="adviser" class="input-sm form-control">
				</div>
			</fieldset>

			<fieldset class="row">
				<legend>Contact info</legend>
				<div class="form-group col-sm-6">
					<label for="contact_number">Contact number:</label>
					<input id="contact_number" name="contact_number" class="input-sm form-control">
				</div>
				<div class="form-group col-sm-6">
					<label for="email">E-mail Address:</label>
					<input id="email" name="email" class="input-sm form-control">
				</div>
				<div class="form-group col-sm-12">
					<div class="row">
						<label for="address" class="col-sm-2 col-form-label">Home Address:</label>
						<div class="col-sm-10">
							<textarea id="address" name="address" class="input-sm form-control" style="min-width:100%;max-width:100%"></textarea>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset class="row">
				<legend>Account info</legend>
				<div class="col-sm-12">
					<div class="row form-group">
						<label for="username" class="col-sm-2 col-form-label">Username:</label>
						<div class="col-sm-6">
							<input type="text" id="username" name="username" class="input-sm form-control">
						</div>
					</div>

					<div class="row form-group">
						<label for="password" class="col-sm-2 col-form-label">Password:</label>
						<div class="col-sm-6">
							<input type="password" id="password" name="password" class="input-sm form-control">
						</div>
					</div>

					<div class="row form-group">
						<input id="create_account" type="submit" class="btn btn-primary col-sm-offset-2" value="Create Account">
					</div>
				</div>
			</fieldset>


		</form>
	</div>
</div>