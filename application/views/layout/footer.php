<!-- SCRIPT GENERAL -->
<script src="<? echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<? echo base_url();?>assets/jquery/jquery.liteuploader.min.js"></script>
<script src="<? echo base_url();?>assets/jquery/upload_img.js"></script>
<script src="<? echo base_url();?>assets/jquery/jquery.form.min.js"></script>
<script src="<? echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<? echo base_url();?>assets/jquery/jquery.pageslide.min.js"></script>

<!-- SCRIPT ARTICLE -->
<script src="<? echo base_url();?>assets/ajax/add_article.js"></script>
<script src="<? echo base_url();?>assets/ajax/add_complementary_info.js"></script>
<script src="<? echo base_url();?>assets/ajax/update_article.js"></script>
<script src="<? echo base_url();?>assets/ajax/add.delete.product.js"></script>
<script src="<? echo base_url();?>assets/ajax/add_content_article.js"></script>

<script src="<? echo base_url();?>assets/ajax/activate.desactivate.img.js"></script>
<!-- SCRIPT HOME -->
<script src="<? echo base_url();?>assets/ajax/add_issue.js"></script>
<script src="<? echo base_url();?>assets/ajax/add_pub.js"></script>
<script src="<? echo base_url();?>assets/ajax/change_pub.js"></script>
<script src="<? echo base_url();?>assets/ajax/delete_homeslider.js"></script>
<script src="<?php echo base_url()?>assets/js/ajaxfileupload.js"></script>

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
$.get('./article').success(function (data){
       $('#files').empty();
        $('#files').html(data);
    });
});
function refresh_files()
{
    $.get('./article/')
    .success(function (data){
       $('#files').empty();
        $('#files').html(data);
    });
}
    </script>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $('#mr').hide(); // or, to add a nice fadeOut effect: $('.myclassname').fadeOut(500);
    }, 3000);
}); 

$(document).ready(function() { 
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}); 
}); 

</script>
<?php if($this->router->fetch_class() == 'article') { ?>
<script>
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	var img = $('#ph1').attr('src');
	var min_img = $('#ph2').attr('src');
	$('#photo').val(img);
	$('#photo_2').val(min_img);

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		

		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

</script>
<?php } else { ?>
	<script>
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	var photo = $('#ph').attr('src');
	var photo2 = $('#ph2').attr('src');
	$('#photo').val(photo);
	$('#photo2').val(photo2);


}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		

		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

</script>
<?php } ?>

</script>
</body>
</html>