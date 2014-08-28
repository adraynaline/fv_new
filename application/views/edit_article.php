<div id="content">
Update of article number <strong><?php echo $article['id']; ?></strong> <br>
Created the <strong><?php echo $article['date_crea'] ?></strong> <br>
Title is <strong><?php echo $article['title'] ?></strong><br/><br>

<?php echo validation_errors(); 
        		$attributes = array('class' => 'form-horizontal','id' =>'formUpdateBeaute');
        		echo form_open('article/update_article',$attributes); ?>

    <input type="hidden" id="redirect" value="<?php echo base_url() ?>article/show/<?php echo $article['id']; ?>">
	<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $article['id']; ?>">
	<input type="text" class="form-control" name="title" id="title" value="<?php echo $article['title']; ?>"><br/>
	<input type="text" class="form-control" name="description" id="description" value="<?php echo $article['description']; ?>"><br/>
	<select class="form-control" id="for" name="forh">
		            	<option value="<?php echo $article['forh'] ?>"><?php echo $article['forh'] ?></option>	
		            	<option value="him">Him</option>
		            	<option value="her">Her</option>
		          	</select><br>
		          	Category <br>
		          	<select class="form-control" id="filter" name="filter">
		            	<option value="<?php echo $article['filter'] ?>"><?php echo $article['filter'] ?></option>	
		            	<option value="beauty">Beauty</option>
		            	<option value="fashion">Fashion</option>
		          	</select>
	<input type="submit" value="Update" class="btn">
</form>
</div>