<?php echo validation_errors(); 
        $attributes = array('class' => 'form-horizontal');
        echo form_open('user/add_user',$attributes); ?>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" size="20" id="username" name="username" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" size="20" id="passowrd" name="password" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
  </form>

  <br/>
  <table>

<?php foreach($result  as $r): ?>
<tr><?php echo $r->username; ?>

    </tr>
<?php endforeach; ?>
</table>
