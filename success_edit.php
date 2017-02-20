<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Successful Updated</title>
  <meta name="description" content="website description" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" title="style" />
  <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
</head>

<body>
<div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><b><a href="index.php">Legacy Tasking System</a></b></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Create New</a></li>
          <li><a href="list_tasks.php">List of tasks</a></li>
        </ul>
      </div>
</div>
    <div id="site_content">
      <div id="content">
        <!-- insert the page content here -->
        
		<?php
			if (isset($_POST['submit']))
			{
				$parent_id=$_POST['parent_id'];
				$title=$_POST['title'];
				
				if(!empty($_POST['title']))
				{   
					$title = mysqli_real_escape_string($Connection, $_POST['title']);
					if(!preg_match('/^[A-Za-z ]{2,255}$/', $_POST['title']) )
					{
						echo "<script>alert('Invalid Task Name!');
								window.location='list_tasks.php';</script>";
						exit();
					}
					echo "<script>alert('Successfully Updated!');
									window.location='list_tasks.php';</script>";
				
				$query = "UPDATE tasks SET title=$title WHERE parent_id=$parent_id";
				mysqli_query($Connection, $query) or die(mysqli_error($Connection));
				}
				
			}
			
		?>
            
      </div>
  </div>
</div>
  <div id="footer">
      Copyright &copy; textured_stars_light | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
  </div>
</div>
</body>
</html>
