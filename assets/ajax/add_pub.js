$(document).ready(function(){
	$('#formPub').on('submit', function(){
		var nom = $('#nom').val();
        var photo = $('#photo').val();
	if(nom == "" || photo == ""){
		alert('Des champs sont incomplets');
	} else{
		$.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Image ajoutée.');
                        window.setTimeout("location=('?appli=home&action=pub');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
		
	});
});