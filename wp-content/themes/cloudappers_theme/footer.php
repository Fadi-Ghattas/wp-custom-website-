<!-- end main container -->

<?php wp_footer(); ?>

<div id="JobModal" class="modal fade" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Now hiring all digital freaks</h2>
				<h3>I want to create some amazing things with you !</h3>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<form method="post" action="" enctype="multipart/form-data">
						<!-- Text input-->
						<div class="form-group col-lg-6">
							<label class="control-label" for="full_name">Full Name</label>
							<input id="full_name" name="full_name" type="text" placeholder="Full Name" class="form-control input-md" />
						</div>

						<!-- Text input-->
						<div class="form-group col-lg-6">
							<label class="control-label" for="email">Email</label>
							<input id="email" name="email" type="email" placeholder="email" class="form-control input-md" />
						</div>

						<!-- Text input-->
						<div class="form-group col-lg-6">
							<label class="control-label" for="phone">Phone</label>
							<input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" />
						</div>

						<!-- Select Basic -->
						<div class="form-group col-lg-6">
							<label class="control-label" for="location">Locations</label>
								<select id="location" name="location" class="form-control">
									<option value=""></option>
									<option value="Dubai">Dubai</option>
									<option value="Lebanon">Lebanon</option>
								</select>
						</div>

						<!-- Text input-->
						<div class="form-group col-lg-6">
							<label class="control-label" for="years_of_experience">Years of Experience</label>
							<input id="years_of_experience" name="years_of_experience" type="text" placeholder="Years of Experience" class="form-control input-md" />
						</div>

						<!-- Select Basic -->
						<div class="form-group col-lg-6">
							<label class="control-label" for="expected_salary">Expected Salary</label>
								<select id="expected_salary" name="expected_salary" class="form-control">
									<option value=""></option>
									<option value="100 - 200">100 - 200</option>
									<option value="200 - 300">200 - 300</option>
								</select>
						</div>

						<!-- File Button -->
						<div class="form-group col-lg-12">
							<label class="control-label" for="cv_file">Upload CV</label>
							<!--data-allowed-file-extensions='["docx", "doc", "ppt", "pdf"]'-->
							<input id="cv_file" name="cv_file" type="file" class="file" data-show-preview="false" data-show-upload="false" />
						</div>

						<!-- Textarea -->
						<div class="form-group col-lg-12">
							<label class="control-label" for="cv_info_one"></label>
							<textarea class="form-control" id="cv_info_one" name="cv_info_one">What do you do when you’re not working?</textarea>
						</div>

						<div class="form-group col-lg-12 captcha-container">
							<div id="JobCaptcha"></div>
						</div>

						<div class="form-group col-lg-12">
								<button class="btn btn-success" type="submit">Good Button</button>
						</div>

						<div class="form-group col-lg-12">
							<p class="message"></p>
						</div>

					</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>