<div class="signup">

	<form action="<?=base_url('Membership/signup_attempt')?>">

		<div class="panel-group" id="accordion">

			<!-- personal info -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<a href="#personal-info" data-toggle="collapse" data-parent="#accordion">Personal Info</a>
					</div>
				</div>
				<div id="personal-info" class="panel-collapse collapse in">
					<div class="panel-body">
						
						<div class="row">
							<div class="col-sm-offset-3">

								<label for="avatar" class="avatar">
									<span class="caption">Change picture</span>
									<img src="<?=base_url('img/test_img.jpg') ?>" class="thumbnail img-responsive">
								</label>

								<input type="file" id="avatar" name="avatar">
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- end of personal info -->
			<!-- contact info -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<a href="#contact-info" data-toggle="collapse" data-parent="#accordion">Contact Info</a>
					</div>
				</div>
				<div id="contact-info" class="panel-collapse collapse">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
			<!-- end of contact info -->

		</div>

	</form>

</div>