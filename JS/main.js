$(document).ready(function(){

	var i = 2;

	setInterval(function(){

		$("head link:first-of-type").attr("href", "images/favicon/"+i+".png");

		i++;

		if(i == 5)
		{
			i = 1;
		}

	}, 3000);
});