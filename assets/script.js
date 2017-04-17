$(document).ready(function(){

	function loadData(){

		$.ajax({
			url: 'data.php',
			type: 'POST',
			data: {"getData" : "1"},
			dataType: 'json',
			beforeSend: function(){ 
				$('.loader').show(); 
			},
			success: function(data){
				
				if(data.status)
				{
					$(".data").show();

					$.each(data.data, function(i, item){

						$tr = "<tr data-id='" + item.id + "'>";

						$tr += "<td>" + (i+1) + "</td>";
						$tr += "<td>" + item.name + "</td>";
						$tr += "<td>" + item.email + "</td>";
						$tr += "<td>" + item.dob + "</td>";
						$tr += "<td>" + "<button class='edit'>Edit</button>&nbsp;&nbsp;<button class='delete'>Delete</button>" + "</td>";

						$tr += "</tr>";

						$(".data").append($tr);

					});
				}

			},
			complete: function(){ 
				$('.loader').hide(); 
			}
		});

	}

	$(".add").on('click', function(){
		$(".form").slideDown().show();
		$(".form").data("type", "new");
	});	

	$("#hide").on('click', function(){
		$(".form").slideUp();
		$(".form #name").val("");
		$(".form #email").val("");
		$(".form #dob").val("");
		$(".form #password").val("");
	});

	$("#submit").on('click', function(){

		var type = $(this).closest('div').data('type');
		var data = null;

		var name = $(".form #name").val();
		var email = $(".form #email").val();
		var dob = $(".form #dob").val();
		var password = $(".form #password").val();

		if(name.length == 0 || email.length == 0 || dob.length == 0 || password.length == 0)
		{	
			$("#form_error").html("All fields are Required");
			return;
		}

		if(type == "new")
		{
			data = {"new" : "1", "name" : name, "email" : email, "dob" : dob, "password" : password};
		}
		else if(type == "edit"){
			data = {"edit" : "1"};
		}

		$.ajax({
			url: 'data.php',
			type: 'POST',
			data: data,
			dataType: 'json',
			beforeSend: function(){ 
				$('.loader').show(); 
			},
			success: function(data){
				if(data.status)
				{
					location.reload();
				}
				else
				{
					$("#form_error").html("");
					$.each(data.error, function(i, item){
						$("#form_error").append(item + "<br>");
					});
				}
			},
			complete: function(){
				$('.loader').hide(); 
			}
		});


	});

	loadData();

});