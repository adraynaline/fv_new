$(document).ready(function(){
	$('#formAddComplementaryInformations').on('submit', function(){
        var redirect = $('#redirect').val();
		var photographer = $('#photographer').val();
        var stylist = $('#stylist').val();
        var makeup = $('#makeup').val();
        var hair = $('#hair').val();
        var description = $('#description').val();
        
	if(photographer == "" || stylist == "" || makeup == "" ||hair == "" || description == "" ){
		alert('Des champs sont incomplets');
	} else{
		$.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Added');
                        window.setTimeout("location=('"+redirect+"');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
		
	});
});
$(document).ready(function(){
    $('#formUpdateComplementaryInformations').on('submit', function(){
        var redirect = $('#redirect').val();
        var photographer = $('#photographer').val();
        var stylist = $('#stylist').val();
        var makeup = $('#makeup').val();
        var hair = $('#hair').val();
        var description = $('#description').val();
        
    if(photographer == "" || stylist == "" || makeup == "" || hair == "" || description == "" ){
        alert('Des champs sont incomplets');
    } else{
        $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Updated');
                         window.setTimeout("location=('"+redirect+"');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
        
    });
});