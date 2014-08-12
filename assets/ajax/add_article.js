$(document).ready(function(){
	$('#formBeaute').on('submit', function(){
		var title = $('#title').val();
        var description = $('#description').val();
        var to = $('#for').val();
        var photo = $('#photo').val();
        var photo2 = $('#photo2').val();
        var filter = $('#filter').val();
	if(title == "" || description == "" || to == "" || photo == "" || photo2 == "" || filter == ""){
		alert('Des champs sont incomplets');
	} else{
		$.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('You can now add complementary informations before activate the article.');
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