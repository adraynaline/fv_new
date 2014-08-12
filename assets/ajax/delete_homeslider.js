$(document).ready(function(){
	$('#formDeleteHomeslider').on('submit', function(){
		var id = $('#id').val();
	if(id == "" ){
		alert('Des champs sont incomplets');
	} else{
		$.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Beauty article delete from home slider.');
                        window.setTimeout("location=('?appli=home&action=homeslider');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
		
	});
});