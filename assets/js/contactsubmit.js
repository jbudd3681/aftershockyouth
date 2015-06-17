$('#sending').hide();
$('#error').hide();
$('#response').hide();

$('#contact-form').click(function(e){

	e.preventDefault();

	var check = '';
	var required = ' is required';
	var name = $('form #contact-name').val();
	var email = $('form #contact-email').val();
	var message = $('form #contact-message').val();
	var validEmail = "^/@/$";


	function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(valid) {
        return false;
    } else {
    	return true;
    }
}

	if(name == '' || name.length <=2){
		check = '<li>Your Name' + required + '</li>';
	}
	if(validateEmail(email)){
		check += '<li>Your Email' + required + '</li>';
	}

	if(message == '' || message.length <=5){
		check += '<li>Please enter a message</li>';
	}
	if(check != ''){
		$('#error').html(
			'<p><h4>Please correct errors:</h4><ul>'+ check + '</ul></p>').show();
	}
	else{
		var formData = $('form').serialize();
		
		$('#error').hide();
		$('#hideme').hide();
		$('#sending').show();
		submitForm(formData);
	}
});

function submitForm(formData){
	console.log(formData);
		$.ajax({
		  type: "POST",
		  url:"assets/db/contact_submit.php",
		  data: formData,
		  dataType: "json",
		  cache: false,
		  timeout: 7000,
		  error: function(res){
		  	$('#sending').hide();
		  	$('#hideme').show();
		  	$('#error').html('<h4>Error!</h4><p>An error has occurred please try again</p>' + res.message).show();
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#sending').hide();
				$('#response').html('<h4>Success!</h4><br>'+ res.message).show();
				$('#contact-form').hide();
			}
		  }
		}); //end of ajax request
}