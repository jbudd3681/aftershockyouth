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

$( "#username" )
  .focusout(function() {
    var user = $("#username").val();
    if(user != ''){
    	$('#check').html('Checking...')
		if($.trim(user) != ''){
			$.post('../assets/db/check.php', {user: user}, function(data){
				$('#check').html(res.message);
				if(res.status == 'in use'){
					('#username').addClass('has-error');
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