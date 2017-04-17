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

	loadData();

});