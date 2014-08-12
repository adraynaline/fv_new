$(document).ready(function(){
    $('#formUpdateBeaute').on('submit', function(){
        var title = $('#title').val();
        //var description = $('#description');
    if(title == "" ){
        alert('Empty Field');
    } else{
        $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if(json.reponse == 'ok') { 
                        alert('Beauty article update');
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