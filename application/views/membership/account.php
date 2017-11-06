<div class="container" id="my_account">
	
	<div class="aside">
		<img src="<?=base_url('img/test_img.jpg') ?>" class="thumbnail img-responsive">
	</div>

	<div class="section">
		<div class="signup_form">
			<form action="<?=base_url('Membership/update')?>" method="POST">
				<fieldset>
				<div class="row">
					<legend class="col">Personal info</legend>

					<div class="form-group col-sm-4 <?=isset($surname_err)?'has-error':''?>">
						<label for="surname" <?=isset($surname_err)?'class="text-danger"':''?>>Last name:</label>
						<input type="text" value="<?=isset($surname)?$surname:''?>" id="surname" name="surname" class="input-sm form-control" required>
						<?= isset($surname_err)?$surname_err:'' ?>
					</div>

					<div class="form-group col-sm-4 <?=isset($firstname_err)?'has-error':''?>">
						<label for="firstname" <?=isset($firstname_err)?'class="text-danger"':''?>>First name:</label>
						<input type="text" value="<?=isset($firstname)?$firstname:''?>" id="firstname" name="firstname" class="input-sm form-control" required>
						<?= isset($firstname_err)?$firstname_err:'' ?>
					</div>

					<div class="form-group col-sm-4">
						<label for="middlename">Middle name:</label>
						<input type="text" value="<?=isset($middlename)?$middlename:''?>" id="middlename" name="middlename" class="input-sm form-control">
					</div>

				</div>

				<div class="row">

					<div class="form-group col-sm-4 <?=isset($course_section_err)?'has-error':''?>">
						<label for="course_section" <?=isset($course_section_err)?'class="text-danger"':''?>>Course/Section:</label>
						<input type="text" value="<?=isset($course_section)?$course_section:''?>" id="course_section" name="course_section" class="input-sm form-control" required>
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
						<input type="text" value="<?=isset($adviser)?$adviser:''?>" id="adviser" name="adviser" class="input-sm form-control" required>
						<?= isset($adviser_err)?$adviser_err:'' ?>
					</div>

				</div>

			</fieldset>
			</form>
		</div>
	</div>
</div>
