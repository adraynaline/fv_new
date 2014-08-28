<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/<?php echo PAGE_CSS ?>.css">
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/bootstrap-theme.css">
	<link rel="stylesheet" href="<? echo base_url();?>assets/css/tinyeditor.css">
  <script src="<? echo base_url();?>assets/js/tiny.editor.packed.js"></script>

</head>
<body>
    <?php if($this->router->fetch_class() != 'login') {
   //load sidebar ?>
		<header>
			<nav id="navbar-example" class="navbar navbar-default navbar-static" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>home">Administration</a>
        </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">HomePage<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="?appli=home&action=issue">Next Issue</a></li>
      			    <li role="presentation"><a role="menuitem" tabindex="-1" href="?appli=home&action=pub">Advertising</a></li>
      			    <li role="presentation"><a role="menuitem" tabindex="-1" href="?appli=home&action=homeslider">Home slider</a></li>	
                <li role="presentation"><a role="menuitem" tabindex="-1" href="?appli=home&action=editorobsession">Editor's Obsession</a></li>   
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?php echo base_url(); ?>article" id="drop2" role="button" >Article</b></a>
            </li>
             <li class="dropdown">
              <a href="<?php echo base_url(); ?>user" id="drop2" role="button" >User</b></a>
            </li>
            <li class="dropdown">
              <a href="<?php echo base_url(); ?>upload" id="drop2" role="button" >Upload</b></a>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Hello <?php echo $username; ?><b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>home/logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container-fluid -->
    </nav> <!-- /navbar-example -->
		</header>
    <?php }
      else {
    ?>
    <header>
      Log In Administration
    </header>
    <?php
      } 
    ?>
	<?php 
if ($this->session->flashdata('result') != ''): 
  echo '<p id="mr">';
    echo $this->session->flashdata('result'); 
    echo '</p>';
endif;
 ?>


