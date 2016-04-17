$(document).ready(function(){

	$('.playedCard').hide();

	$('.container #player_1_hand img').click(function(){

		$(this).fadeOut(200);

		setTimeout(function(){
			
			$('#player_1_playedCard').fadeIn(200);
		}, 200);
		
	});
});