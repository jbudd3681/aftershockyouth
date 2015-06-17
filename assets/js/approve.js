//addnewparent
$("#addnewparent").on('submit', function (e){
	e.preventDefault();
	$('#loading').modal('show');
	$form = $(this);
	var action = $form.attr('action');
	$.ajax({
		url: action,
		method: 'POST',
		dataType: "json",
		data: $(this).serialize(),
				error: function(res){
			if(res.status==="error"){
		  	alert(res.message);
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$('#addnewparent').html('Success!');
		  		location.reload();
			}
		  }
	});
});

//send email
$("#sendmail").on('submit', function (e){
	e.preventDefault();
	$('#loading').modal('show');
	var action ='../assets/db/sendemail.php';
	$.ajax({
		url: action,
		method: 'POST',
		dataType: "json",
		data: $(this).serialize(),
				error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$('#sendmail').html('Success!');
		  		location.reload();
			}
		  }
	});
});

//New Wall Post
$("#newpost").on('submit', function (e){
	e.preventDefault();
	$('#loading').modal('show');
	var action ='../assets/db/newpost.php';
	$.ajax({
		url: action,
		method: 'POST',
		dataType: "json",
		data: $(this).serialize(),
				error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		location.reload();
			}
		  }
	});
});

$('#deletepost').on('submit', function (e){
	e.preventDefault();
	$form = $(this);
	$('#loading').modal('show');
	var action = $form.attr('action');
		$.ajax({
		url: action,
		method:"POST",
		dataType: "json",
		data: $(this).serialize(),
		error: function(res){
			if(res.status==="error"){
		  	$form.parent().parent().html('<div class="alert alert-danger" style="width:100%;"><em>An Error Has occurred.</em></div>').delay('3000').fadeOut('slow');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$form.parent().parent().html('<div class="alert alert-success" style="width:100%;"><em>Removed!</em></div>').delay('3000').fadeOut('slow');
			}
		  }
	});
});

//add's new event
$( ".addnewevent" ).on("click",function( e ){
	e.preventDefault();
	$form = $(this);
	$('#loading').modal('show');
	var action = '../assets/db/addevent.php';
	$.ajax({
		url: action,
		method:"POST",
		dataType: "json",
		data: $('#addnew').serialize(),
		error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$('#addnew').html('SUCCESS!');
		  		
			}
		  }
	});
});

$( ".allusers" ).on("submit",function( e ){
	e.preventDefault();
	$('#loading').modal('show');
	$form = $(this);
	var action = $form.attr('action');
	$.ajax({
		url: action,
		method:"POST",
		dataType: "json",
		data: $(this).serialize(),
		error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$form.parent().parent().remove();
			}
		  }
	}); //end of ajax request
});

$( ".pendingusers" ).on("submit",function( e ){
	e.preventDefault();
	$('#loading').modal('show');
	$form = $(this);
	var action = $form.attr('action');
	$.ajax({
		url: action,
		method:"POST",
		dataType: "json",
		data: $(this).serialize(),
		error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$form.parent().parent().html('<div class="alert alert-success" style="width:100%;"><em>'+res.message+'</em></div>').delay('3000').fadeOut('slow');
			}
		  }
	}); //end of ajax request
});

$( ".deleteform" ).on("submit",function( e ){
	e.preventDefault();
	$('#loading').modal('show');
	$form = $(this);
	var action = $form.attr('action');
	$.ajax({
		url: action,
		method:"POST",
		dataType: "json",
		data: $(this).serialize(),
		error: function(res){
			if(res.status==="error"){
		  	alert('error');
		  	}
		  },
		  success: function(res){
		  	if(res.status==="Success"){
		  		$('#loading').modal('hide');
		  		$form.parent().parent().remove();
			}
		  }
	}); //end of ajax request
});
