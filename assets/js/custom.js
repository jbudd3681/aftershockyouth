function autoRefresh_div()
 {
 	  $("#myFrame")[0].src = $("#myFrame")[0].src;
      //$("#user-form").reload();// a function which will load data from other file after x seconds
  	  $("#refresh").load('../assets/db/pendingcount.php');
  }
 
  setInterval('autoRefresh_div()', 120000); // refresh div after 2 min

$('#pendingusers').on('hidden.bs.modal', function () {
 location.reload();
})

$('#newevent').on('hidden.bs.modal', function () {
 location.reload();
})

$( "#rusername" )
  .focusout(function() {
    var user = $("#rusername").val();
    if(user != ''){
    	$('#check').html('Checking...')
		if($.trim(user) != ''){
			$.ajax({
				url: '../assets/db/check.php',
				method: 'POST',
				dataType: "json", 
				data: $(this).serialize(),
				success: function(res){
		  		if(res.status==="in use"){
		  			$('#rusername').attr('class', 'form-control uerror');
		  			$('#check').html(res.message);
		  			$('#register').prop("disabled",true);		  		
					}
				if(res.status==="okay"){
					$('#register').prop("disabled",false);
				 	$('#rusername').attr('class', 'form-control usuccess');
				 	$('#check').html(res.message);
					}
				}
			});
		}
	}
  })

$("#confirmpass")
	.focusout(function(){
		var pass = $('#password').val();
		var confirm = $('#confirmpass').val();
		if(pass != '' && confirm !== ''){
			if(pass == confirm){
				$('#passchk').html('Passwords Match');
			}else{
				$('#passchk').html('Passwords do not match');
			}
		}
	})

$("#email")
	.focusout(function(){
		var email = $('#email').val();
		if(email.length < 5){
			alert('please enter an email');
		}
	})

$(function (e) {
  $('[data-toggle="popover"]').popover()
})