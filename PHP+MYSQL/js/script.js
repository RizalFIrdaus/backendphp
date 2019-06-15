$(document).ready(function(){


	$("#search").hide();
	$("#Keyword").on("keyup",function(){

		// menggunakan load untuk memanggil ajax
		// $("#container").load("ajax/laptop.php?Keyword="+$("#Keyword").val());	
         $(".loader").css({
				"opacity" : "1"
			});     


		// menggunakan $.get untuk memanggil ajax
		$.get("ajax/laptop.php?Keyword="+$("#Keyword").val() , function(ajax){

			$("#container").html(ajax);
			$(".loader").css({
				"opacity" : "0"
			});

		
		});	

	});   
});