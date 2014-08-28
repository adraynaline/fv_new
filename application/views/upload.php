<!doctype html>
<html>
<head>
   
    
    <script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/ajaxfileupload.js"></script>
    
</head>
<body>
    <h1>Upload File</h1>
    <form method="post" action="" id="upload_file">
        <label for="title">Title</label>
        <input type="text" name="title" id="title"/>
        <label for="description">Description</label>
        <input type="text" name="description" id="description"/>
              
        <label for="filter">filter</label>
        <input type="text" name="filter" id="filter"/>
         <label for="forh">forh</label>
        <input type="text" name="forh" id="forh"/>
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="submit" name="submit" id="submit" />
    </form>
    <h2>Files</h2>
    <div id="files"></div>
    
    <script type="text/javascript">
$(function() {
    $('#upload_file').submit(function(e) {
        e.preventDefault();
        $.ajaxFileUpload({
            url             :'./upload/upload_file/', 
            secureuri       :false,
            fileElementId   :'userfile',
            dataType        : 'json',
            data            : {
                'title'             : $('#title').val(),
                'description'       : $('#description').val(),
                'filter'            : $('#filter').val(),
                'forh'              : $('#forh').val()
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
$.get('./upload/files/').success(function (data){
       $('#files').empty();
        $('#files').html(data);
    });
});
function refresh_files()
{
    $.get('./upload/files/')
    .success(function (data){
       $('#files').empty();
        $('#files').html(data);
    });
}
    </script>
</body>
</html>