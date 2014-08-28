$(function() {
    $('#upload_file').submit(function(e) {
        
        $.ajaxFileUpload({
            url             :'./upload/upload_file/', 
            secureuri       :false,
            fileElementId   :'userfile',
            dataType        : 'json',
            data            : {
                'title'             : $('#title').val(),
                'description'       : $('#description').val(),
                'forh'              : $('#forh').val(),
                'filter'            : $('#filter').val()
            },
            success : function (data, status)
            {
                if(data.status != 'error')
                {
                    $('#files').html('<p>Reloading files...</p>');
                    refresh_files();
                    $('#title').val('');
                    $('#description').val('');
                    $('#forh').val();
                    $('#filter').val();
                }
                alert(data.msg);
            }
        });
        return false;
    });
}
});
function refresh_files()
{
    $.get('./upload/files/')
    .success(function (data){
        $('#files').html(data);
    });
}