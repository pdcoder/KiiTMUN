<?php
/*Template Name: Contact Us Page */
get_header();
$chk = 0;
if (isset($_POST['form-name']) && isset($_POST['form-email']) && isset($_POST['form-subject']) && isset($_POST['form-message'])){
	$name = esc_sql(strip_tags($_POST['form-name']));
	$email = esc_sql(strip_tags($_POST['form-email']));
	$subject = esc_sql(strip_tags($_POST['form-subject']));
	$message = esc_sql(strip_tags($_POST['form-message']));
	$header = "From: ".$name." <".$email.">";

	$message = $message.'-Website Contact Us';
$chk = 0;
	/*if (mail('prkiitmun@gmail.com', $subject, $message, $header)){
		echo "<script>";
		echo "alert('Mail sent');";
		echo "</script>";
	}
	else{
		echo "<script>";
		echo "alert('Mail not sent');";
		echo "</script>";
	}*/

	if (mail('prkiitmun@gmail.com', $subject, $message, $header)){
		$chk = 1;
	}
	else{
		$chk = 0;
	}
}

?>


<section id="contact-first">
	<div class="contact-back">
		<img src="<?php echo wp_get_attachment_url(278); ?>">
		<div class="layer">
			<h1>Contact Us</h1>
		</div>
	</div>
</section>
<?php
if($chk==0){
	?>
<section id="contact-second">
<div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 col-md-5 col-lg-5 col-md-offset-4 col-lg-offset-4">

	<h1>Connect To <b>Us</b></h1>
	<hr>
	<form method="post">
		<label for="form-name">Your Name:</label>
		<input type="text" name="form-name" class="form-control" id="form-name" required="">
		<br>
		<div class="col-xs-6" style="padding: 0; padding-right: 1vmin;">
			<label for="form-email">Your Email:</label>
			<input type="email" name="form-email" class="form-control" id="form-email" required="">
			<br>
		</div>
		<div class="col-xs-6" style="padding: 0; padding-left: 1vmin;">
			<label for="form-subject">Subject:</label>
			<input type="text" name="form-subject" class="form-control" id="form-subject" required="">
			<br>
		</div>
		<label for="form-message">Your Message</label>
		<textarea rows="5" name="form-message" class="form-control" id="form-message" required=""></textarea>
		<br>
		<input type="hidden" name="contact-submit" value="yes">
		<button class="btn" type="submit">Submit</button>
	</form>
</section>
<br>
<div align="center"><p><i>For further queries, please feel free to contact <b>+917873466022.</b></i></p></div>
<?php
}
else
echo "<h3 style=\"text-align:center; margin-top:30px;\">Thank you for contacting. We will try to get back to you soon.</h3>";

?>


<section id="contact-third">
	<h1>In Other <b>Media</b></h1>
	<hr>
	<span>We Are Gearing Up For The Much Awaited Model United Nations<br/>Just Like You Are.</span>
	<div class="row">
		<div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3">
			<center>
				<div>
					<a href="https://www.facebook.com/kiitmun/" target="_blank"><img src = "<?php echo wp_get_attachment_url(269); ?>"></a>
				</div>
				<div>
					<a href="https://www.instagram.com/instakiitmun/" target="_blank"><img src = "<?php echo wp_get_attachment_url(270); ?>"></a>
				</div>
				<div>
					<a href="https://twitter.com/kiitmun" target="_blank"><img src = "<?php echo wp_get_attachment_url(271) ?>"></a>
				</div>
			</center>
		</div>
	</div>
</section>

<section id="contact-fourth">
	<h1>Meet Us <b>Here</b></h1>
	<hr>
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14962.559068831144!2d85.8136923465576!3d20.356495146139697!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x85a345e1f4fcce86!2sKiiT+Student+Activity+Center-KSAC!5e0!3m2!1sen!2sin!4v1527423728493" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<?php get_footer(); ?>