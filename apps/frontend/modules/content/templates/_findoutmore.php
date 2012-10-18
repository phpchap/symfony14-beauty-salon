<script type="text/javascript">
    // simple bit of javascript validation..
	$(document).ready(function(){
		$('.error').hide();	
		$('input.text-input').css({backgroundColor:"#FFFFFF"});	
		$('input.text-input').focus(function(){
			$(this).css({backgroundColor:"#FFDDAA"});
		});	
		$('input.text-input').blur(function(){
			$(this).css({backgroundColor:"#FFFFFF"});
		});

		$(".button").click(function() {

			// validate and process form
			// first hide any error messages
			$('.error').hide();
			var validated = true;
			
			var name = $("input#name").val();			
			if (name == "") {
				$("label#name_error").show();
				$("input#name").focus();
				validated = false;
				return false;
			}
	
			var email = $("input#email").val();
			if (email == "") {
				$("label#email_error").show();
				$("input#email").focus();
				validated = false;
				return false;
			}
			
			var phone = $("input#phone").val();			

			var message = $("#message").val();
			if (message == "") {
				$("label#message_error").show();
				$("input#message").focus();
				validated = false;
				return false;
			}
			
			if(validated==true) {
				
				var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message;

				$.ajax({
					type: "GET",
					url: "<?php echo url_for('content/ajaxContactUs');?>",
					data: dataString,
					success: function(result) {
						if(result=='OK') {
				  			$('#contact_form').html("<div id='message'></div>");
				  			$('#message').html("<h2>Thanks for the message!</h2>")
				  			.append("<p>We will be in touch soon.</p>")
				  			.hide()
				  			.fadeIn(1500, function() { $('#message').append("<img id='checkmark' src='/images/check.png' />"); });						
						} else if(result=='ERROR'){
				  			$('#contact_form').html("<div id='message'></div>");
				  			$('#message').html("<h2>Error encounter!</h2>")
				  			.append("<p>Dont panic, we'll fix it soon.</p>")
				  			.hide()
				  			.fadeIn(1500, function() { $('#message').append("<img id='checkmark' src='/images/check.png' />"); });	
						}
					}
				});				
			}			
		    return false;
		});
	});
</script>


<div class="gallery_container">	
	<div id="contact_form">
	  <h2 style="font-size:22px;">Arrange an Appointment</h2>	
	  <form name="contact" method="post" action="">
	    <fieldset>
            <!-- NAME -->
	      <label for="name" id="name_label">Name *</label>
	      <label class="error" for="name" id="name_error">This field is required.</label>	
	      <input type="text" name="name" id="name" size="30" value="" class="text-input" />
          <!-- EMAIL -->
	      <label for="email" id="email_label">Email *</label>
	      <label class="error" for="email" id="email_error">This field is required.</label>	
	      <input type="text" name="email" id="email" size="30" value="" class="text-input" />
          <!-- PHONE -->
	      <label for="phone" id="phone_label">Phone</label>
	      <label class="error" for="phone" id="phone_error">This field is required.</label>	
	      <input type="text" name="phone" id="phone" size="30" value="" class="text-input" />
          <!-- MESSAGE -->
	      <label for="message" id="message_label">Message *</label>
	      <label class="error" for="message" id="message_error">This field is required.</label>	
		  <textarea rows="2" cols="28" name="message" id="message"></textarea>	
	      <br />
          <!-- SUBMIT BUTTON -->
	      <input type="button" name="submit" class="button" id="submit_btn" value="Send Message" />
	    </fieldset>
	  </form>
	</div>
</div>