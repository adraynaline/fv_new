$(document).ready(function() {
 	var width_img_bloc = $('.img_bloc_mobil').width();
 	$('.img_bloc_mobil').height(width_img_bloc);
 	
    $(".second").pageslide({ direction: "left", modal: true });



    $(".imgLiquidFill").imgLiquid();

	
	$('#forhim').hide();
	$('#forher').hide();
	var himclick = $('#menufor p').last();
	var herclick = $('#menufor p').first();
	$(document).ready(function() {
	himclick.on('click',function(){
		$(himclick).css('background','black');
		$(himclick).css('color','white');
		$(herclick).css('background','none');
		$(herclick).css('color','black');
		$('#menufor span').last().show();
		$('#menufor span').first().hide();
		$('#forhim').slideDown();
		$('#forher').slideUp(function(){
			$('#forher').hide();
		});
		
	});

	herclick.on('click',function(){
		$(herclick).css('background','black');
		$(herclick).css('color','white');
		$(himclick).css('background','none');
		$(himclick).css('color','black');
		$('#menufor span').first().show();
		$('#menufor span').last().hide();
		$('#forher').slideDown();
		$('#forhim').slideUp(function(){
			$(this).hide();
		});
		
		
	});
});	
	$('#redlips').on('click',function(){
		$('#hover_content').fadeOut(function(){
			$('#menufor').fadeIn();
			$('#menufor p').first().addClass('menufor1');
			$('#menufor span').first().show();
			$('#forher').show();
		});
	});
	$('#perfum').on('click',function(){
		$('#hover_content').fadeOut(function(){
			$('#menufor').fadeIn();
			$('#menufor p').last().addClass('menufor1');
			$('#menufor span').last().show();
			$('#forhim').show();
		});
	});
});