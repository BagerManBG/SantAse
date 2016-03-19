$(document).ready(function(){

	$.ajax({
		url: "../Controllers/logged/redirect.php",
		success: function(result) {

			if(result == "redirect")
			{
				window.location.href = "index.php";
			}
		}
	});
});