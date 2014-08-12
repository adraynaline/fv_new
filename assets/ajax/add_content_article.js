$(document).ready(function(){
    $('#formAddContentArticle').on('submit', function(){
        var id = $('#id_article').val();
        var textarea = $('.textarea').val();
    if(id == "" || textarea == ""){
        alert('Des champs sont incomplets'+textarea+' +'+id+' ');
    } else{
        $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Content article added.');
                        window.setTimeout("location=('?appli=admin&action=beaute');");
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        }
        return false;
        
    });
});