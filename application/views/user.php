<?php 
if ($this->session->flashdata('result') != ''): 
  echo '<p id="mr">';
    echo $this->session->flashdata('result'); 
    echo '</p>';
endif;
 ?>

GRADE : 
1 - READ 
2 - WRITE
3 - Ultime
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
      <label for="inputPassword3" class="col-sm-2 control-label">Grade</label>
      <div class="col-sm-10">
        <select name="grade">
          <option value="1">READ</option>
          <option value="2">WRITE</option>
          <option value="3">Ultime</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Mail</label>
      <div class="col-sm-10">
        <input type="mail" size="20" id="mail" name="mail" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
  </form>

  <br/>
  <div class="table-responsive">
      <table class="table">
        <tr>
          <td>User</td>
          <td>Password</td>
          
          <td>Grade</td>
          <td>Mail</td>
          <td>Edit</td>
          <td>Delete</td>
         
        </tr>
        <?php foreach($result  as $r): ?>
        <tr>
          <td><?php echo $r->username; ?></td>
        <td><?php echo $r->password; ?></td>
        <td><?php echo $r->grade; ?></td>
        <td><?php echo $r->mail; ?></td>
        <td><button class="btn btn-default"><a href='user/edit/<?php echo $r->id; ?>'>Edit</a></button></td>
        <td>
          <button class="btn btn-default">
          <?php 
            echo anchor('user/delete/'.$r->id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
          ?>
          </button>
        </td>
      </tr>

       
      <?php endforeach; ?>
      </table>
    </div>
  <table>



