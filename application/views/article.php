
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
	        <div id="first_step_modele">
	          Add the image first, choose and click on upload
	          <form action="model/article/processupload2.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
	          <input name="ImageFile" id="imageInput" type="file" />
	          <input class="btn" type="submit"  id="submit-btn" value="Upload" />
	          
	          </form>
	          <div id="output"></div>
	         	<button type="button" class="btn btn-default" id="next_step">Next Step</button>
	          </form>
	        </div>
	      </div>
	        <div id="second_step_modele">
	            <form method="post" action="?appli=article&action=add_article" id="formBeaute">
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
	        	<div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			          <button type="button" class="btn btn-default" id="previous_step">Previous Step</button>
			          <button type="submit" class="btn btn-primary">Save</button>
	            </form>
	       		 </div>
	     	</div>
	      </div>
	     
	    </div>
	  </div>
	 


	<!-- FIN MODAL -->

	<br><br>
	<center><button id="actif" class="btn btn-primary">Actif</button>    <button id="inactif" class="btn btn-default">Inactif</button></center><br>
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
			    	<td><?php echo $beaute['id']; ?></td>
			    	<td><img width="200px" src="../<?php echo $a->img; ?>"></td>
			    	<td><a href="?appli=beauty&action=show&id=<?php echo $a->id; ?>"><?php echo $a->title; ?></a></td>
			    	<td><?php echo $a->description; ?></td>
			    	<td><?php echo $a->forh; ?></td>
			    	<td><?php echo $a->filter; ?></td>
			    	<td>
			    		<button class="btn"><a href="?appli=article&action=show&id=<?php echo $a->id; ?>">Show</a></button>
			    	</td>
			    	<td>
			    		<form method="post" action="?appli=article&action=delete_article" id="formDeleteBeaute">
			    			<input type="hidden" name="id" id="id" value="<?php echo $a->id; ?>">
			    			<input type="submit" class="btn" value="Delete">
			    		</form>
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
	<div id="beaute_inactif">
		<div class="table-responsive">
		  <table class="table">
		    <tr>
		    	<td>Id</td>
		    	<td>Img</td>
		    	<td>Title</td>
		    	<td>Description</td>
		    	<td>For</td>
		    	<td>Date Create</td>
		    	<td>Date Update</td>
		    	<td>Show</td>
		    	<td>Delete</td>
		    	<td>Update</td>
		    	<td>Visibility</td>
		    </tr>
		    <?php foreach($article as $ar): ?>
			    <tr>
			    	<td><?php echo $article0['id']; ?></td>
			    	<td><img width="200px" src="../<?php echo $article0['img']; ?>"></td>
			    	<td><a href="?appli=beauty&action=show&id=<?php echo $article0['id']; ?>"><?php echo $article0['title']; ?></a></td>
			    	<td><?php echo $ar->description; ?></td>
			    	<td><?php echo $article0['forh']; ?></td>
			    	<td><?php echo $article0['date_crea']; ?></td>
			    	<td><?php echo $article0['date_update']; ?></td>
			    	<td>
			    		<button class="btn"><a href="?appli=article&action=show&id=<?php echo $article0['id']; ?>">Show</a></button>
			    	</td>
			    	<td>
			    		<form method="post" action="?appli=article&action=delete_article" id="formDeleteBeaute">
			    			<input type="hidden" name="id" id="id" value="<?php echo $article0['id']; ?>">
			    			<input type="submit" class="btn" value="Delete">
			    		</form>
			    	</td>
			    	<td><button class="btn"><a href="?appli=article&action=update&id=<?php echo $article0['id']; ?>">Update</a></button></td>
		    		<td>
		    			<form method="post" action="?appli=article&action=activate.img" id="formImgActivate">
		    				<input type="hidden" id="type" value="<?php echo $article0['filter']; ?>">
			    			<input type="hidden" id="id" name="id" value="<?php echo $article0['id']; ?>">
			    			<button class="btn btn-default" type="submit">Activate</button>
			    		</form>
		    		</td>
			    </tr>
			<?php endforeach; ?>
		  </table>
		</div>
	</div>
</div> 

