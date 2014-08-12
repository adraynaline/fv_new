$(document).ready(function(){
	$('#formAddProduct').on('submit', function(){
		var id = $('#id').val();
        var photo = $('#photo').val();
        var titre = $('#titre').val();
        var description = $('#description').val();
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
                        alert('Product added.'+id+' '+photo+' '+titre+' '+description+' ');
                        window.setTimeout("location=('?appli=admin&action=product&id="+id+"');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
		
	});
    $('#formDeleteProduct').on('submit', function(){
        var id = $('#id').val();
        
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
                        alert('Product deleted.');
                        window.setTimeout("location=('?appli=admin&action=product&id="+id+"');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
        
    });
});