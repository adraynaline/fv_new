
<div id="beaute_content">
	<br/>
	

	<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 		 Add an article
	</button>
		<br/><br/>

	<!-- Modal -->

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Add an Article</h4>
	      </div>
	      
	      <div class="modal-body">
	      	<?php  
        $attributes = array('class' => 'form-horizontal','id' =>'upload_file');
        echo form_open('',$attributes); ?>
	      	
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title"/>
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description"/>
        For<br/>
		            <select class="form-control" id="forh" name="forh">
		            	<option></option>	
		            	<option value="him">Him</option>
		            	<option value="her">Her</option>
		          	</select><br>
		          	Category <br>
		          	<select class="form-control" id="filter" name="filter">
		            	<option></option>	
		            	<option value="beauty">Beauty</option>
		            	<option value="fashion">Fashion</option>
		          	</select>
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="submit" name="submit" id="submit" />
    </form>
	       <!-- <div id="first_step_modele">
	          Add the image first, choose and click on upload
	          <form action="<? echo base_url();?>processupload/" method="post" enctype="multipart/form-data" id="MyUploadForm">
	          <input name="ImageFile" id="imageInput" type="file" />
	          <input class="btn" type="submit"  id="submit-btn" value="Upload" />
	          
	          </form>
	          <div id="output"></div>
	         	<button type="button" class="btn btn-default" id="next_step">Next Step</button>
	          </form>
	        </div>-->
	      </div>
	       <!-- <div id="second_step_modele">
	        	<?php echo validation_errors(); 
        $attributes = array('class' => 'form-horizontal','id' =>'formBeaute');
        echo form_open('article/add_article',$attributes); ?>
	            <input type="hidden" id="redirect" value="<?php echo base_url() ?>article/actif"> 
	         		Nom<br/>
	         		<input class="form-control" type="text" name="title" id="title"><br/>	
		           
		            Description<br/>
		            <input class="form-control" type="text" id="description" name="description" value=""><br/>
		            For<br/>
		            <select class="form-control" id="for" name="forh">
		            	<option></option>	
		            	<option value="him">Him</option>
		            	<option value="her">Her</option>
		          	</select><br>
		          	Category <br>
		          	<select class="form-control" id="filter" name="filter">
		            	<option></option>	
		            	<option value="beauty">Beauty</option>
		            	<option value="fashion">Fashion</option>
		          	</select>




		            <input type="hidden" id="photo" name="photo" value=""><br/>
		            <input type="hidden" id="photo_2" name="photo2" value=""><br/>          
	        	</form>
	     	</div>-->
	     	<div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			          <button type="button" class="btn btn-default" id="previous_step">Previous Step</button>
			          <button type="submit" class="btn btn-primary">Save</button>
	            
	       		 </div>
	      </div>
	     
	    </div>
	  </div>
	 


	<!-- FIN MODAL -->

	<br><br>
	<center><button   class="btn btn-primary"><a href="<?php echo base_url(); ?>article/actif">Actif</a></button>    <button class="btn btn-default"><a href="<?php echo base_url(); ?>article/">Inactif</a></button></center><br>
	<div id="beaute_actif">
		<div class="table-responsive">
		  <table class="table">
		    <tr>
		    	<td>Id</td>
		    	<td>Img</td>
		    	<td>Titre</td>
		    	<td>Description</td>
		    	<td>For</td>
		    	<td>Filter</td>
		    	<td>Show</td>
		    	<td>Delete</td>
		    	<td>Update</td>
		    	<td>Visibility</td>
		    	<td>Add Product</td>
		    	<td>Add specific article</td>
		    </tr>
		    <?php foreach($article1 as $a): ?>
			    <tr>
			    	<td><?php echo $a->id; ?></td>
			    	<td><img width="200px" src="<?php echo $a->img; ?>"></td>
			    	<td><a href="?appli=beauty&action=show&id=<?php echo $a->id; ?>"><?php echo $a->title; ?></a></td>
			    	<td><?php echo $a->description; ?></td>
			    	<td><?php echo $a->forh; ?></td>
			    	<td><?php echo $a->filter; ?></td>
			    	<td>
			    		<button class="btn"><a href="<?php echo base_url(); ?>article/show/<?php echo $a->id; ?>">Show</a></button>
			    	</td>
			    	<td>
			    		<button class="btn btn-default">
          <?php 
            echo anchor('article/delete/'.$a->id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
          ?>
          </button>
			    	</td>
			    	<td><button class="btn"><a href="?appli=article&action=update&id=<?php echo $a->id; ?>">Update</a></button></td>
			    	<td>
			    		<form method="post" action="?appli=article&action=desactivate.img" id="formImgDesactivate">
			    			<input type="hidden" id="type" value="<?php echo $a->filter; ?>">
			    			<input type="hidden" id="id" name="id" value="<?php echo $a->id; ?>">
			    			<button class="btn btn-default" type="submit">Desactivate</button>
			    		</form>
			    	</td>
			    	<td><a href="?appli=article&action=product&id=<?php echo $a->id; ?>">Add Product</a></td>
			    	<td></td>
			    </tr>
			<?php endforeach; ?>
		  </table>
		</div>
	</div>
	
</div> 

