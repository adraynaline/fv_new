$(document).ready(function(){
	$('#formImgActivate').on('submit', function(){
		var id = $('#id').val();
        var type = $('#type').val();
        var redirect = '?appli=admin&action='+type+'';
	if(id == ""){
		alert('Des champs sont incomplets');
	} else{
		$.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Image Activate.');
                        window.setTimeout("location=('?appli=article');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
		
	});
    $('#formImgDesactivate').on('submit', function(){
        var id = $('#id').val();
        var type = $('#type').val();
        var redirect = '?appli=admin&action='+type;
    if(id == ""){
        alert('Des champs sont incomplets');
    } else{
        $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Image Desactivate.');
                        window.setTimeout("location=('?appli=article');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
        
    });
});