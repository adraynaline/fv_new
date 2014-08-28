
<center><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	 Add content article
</button>

<?php 
 if( $article['actif'] === '1'){ ?>
<button class="btn btn-warning">
	Desactivate
</button>
<?php } else { ?>
<button class="btn btn-success">
	Activate
</button>
<?php } ?>
<button class="btn btn-danger">
 <?php 
            echo anchor('article/delete/'.$article['id'], 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
          ?>

</button>
</a>
<button class="btn btn-info">
	<a href="<?php echo base_url() ?>article/update/<?php echo $article['id']; ?>">
		Update
	</a>
</button>
</center>
<br/><br/>
<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Add content of the Article</h4>
	      </div>
	      
	      <div class="modal-body">
	        	<form method="post" action="?appli=admin&action=add_content_article" id="formAddContentArticle">
	        		<input type="hidden" id="id_article" name="id_article" value="<?php echo $show_beaute['id']; ?>">
	        		<textarea name="textarea_content" class="textarea" id="tinyeditor" style="width: 400px; height: 200px" placeholder="Enter text here"></textarea>
	      </div>          
	      <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-default" id="previous_step">Previous Step</button>
			<button type="submit" class="btn btn-primary">Save</button>   
				</form>         
	       </div>
	     	
	      </div>
	     
	    </div>
	</div>
	<!-- FIN MODAL -->
<script>
var editor = new TINY.editor.edit('editor', {
	id: 'tinyeditor',
	width: '90%',
	height: 375,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script>
<br/>

<center>
	
	<img height="400px" width="auto" src="<?php echo $article['img']; ?>"><br/><br>
	Title : <?php echo $article['title']; ?><br>
	Description : <?php echo $article['description'] ?><br>
	#FOR : <?php echo $article['forh'] ?><br>
	Category : <?php echo $article['filter'] ?>

</center>
<br>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Complementary Informations
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- IF COMPLEMENTARY INFO ADDED SHOW THE UPDATE FORM -->
			<?php if($infocom['photographer'] != ''){ ?>
			<?php echo validation_errors(); 
        		$attributes = array('class' => 'form-horizontal','id' =>'formUpdateComplementaryInformations');
        		echo form_open('article/update_com_info',$attributes); ?>
		
				<input type="hidden" id="redirect" value="<?php echo base_url(); ?>article/show/<?php echo $article['id']; ?>">
				<input type="text" name="id" id="id" value="<?php echo $infocom['id'];  ?>">
				Photographe : <input class="form-control" type="text" name="photographer" id="photographer" value="<?php echo $infocom['photographer'] ?>"><br>
				Stylist : <input class="form-control" type="text" name="stylist" id="stylist" value="<?php echo $infocom['stylist'] ?>"><br>
				Make-Up : <input class="form-control" type="text" name="makeup" id="makeup" value="<?php echo $infocom['makeup'] ?>"><br>
				HairStylist : <input class="form-control" type="text" name="hair" id="hair" value="<?php echo $infocom['hair'] ?>"><br>
				Description : <textarea class="form-control" type="text" name="description" id="description" ><?php echo $infocom['description'] ?></textarea><br>
				<input type="submit" value="Update" class="btn btn-default">
			</form><br>
			 <?php } else { ?>
		<!-- ELSE SHOW THE ADDED FORM -->
			<?php echo validation_errors(); 
        		$attributes = array('class' => 'form-horizontal','id' =>'formAddComplementaryInformations');
        		echo form_open('article/add_com_info',$attributes); ?>
		
			
				<input type="hidden" id="redirect" value="<?php echo base_url(); ?>article/show/$article['id'];">
				<input type="text" name="id" id="id" value="<?php echo $article['id']; ?>">
				Photographe : <input class="form-control" type="text" name="photographer" id="photographer" ><br>
				Stylist : <input class="form-control" type="text" name="stylist" id="stylist" ><br>
				Make-Up : <input class="form-control" type="text" name="makeup" id="makeup" ><br>
				HairStylist : <input class="form-control" type="text" name="hair" id="hair" ><br>
				Description : <textarea class="form-control" type="text" name="description" id="description" ></textarea><br>
				<input type="submit" value="Add" class="btn btn-default">
			</form><br>
			<?php } ?>
			
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Products
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Coming soon
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Empty for the moment 
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

