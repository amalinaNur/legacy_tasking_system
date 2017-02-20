<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Create New Task</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" title="style" />
  <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function validateForm() 
{
    var x = document.forms["create"]["title"].value;
    if (x == "") {
        alert("Task Name must be filled out");
        return false;
    }
}
</script>
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
        <br>
        <br>
        <h1><b style="text-decoration:underline; color: #333;">Create New Task</b></h1>
        <br>
        <div class="id">
       	  <form action="" name="create" method="POST" id="create" enctype="multipart/form-data" onSubmit="return validateForm()">
            <div>
                <label>Parent Task ID:</label>
                <input type="text" id="parent_id" name="parent_id" maxlength="11" class="field" >
            </div>
            <div>
                <label><span class="error">*</span>Task Name:</label>
                <input type="text" id="title" name="title" class="field">
                
            </div>
                <br>
                <br>
                <br>
            	<input type="submit" name="submit" value="Submit" class="button">
       	  </form>
          	
			<?php
			if(isset($_POST['submit']))
			{
				$title = $_POST['title'];
				$parent_id = $_POST['parent_id'];
				
				if(isset($_POST['parent_id']))
				{
					$parent_id = mysqli_real_escape_string($Connection, $_POST['parent_id']);
			
					if(!empty($_POST['parent_id']))
					{
						if(!preg_match('/^[0-9]{1,11}$/', $_POST['parent_id']) )
						{
							echo "<script>alert('Invalid Parent Task ID!');
									window.location='index.php';</script>";
							exit();
						}
						else
						{
							$query = "SELECT * FROM tasks WHERE parent_id = '$parent_id'";
							$result = mysqli_query($Connection, $query);
							$count = mysqli_fetch_array($result);
					
							if($count['parent_id'] == $parent_id)
							{
								echo "<script>alert('Sorry, cannot use the same Parent Task ID.');
											window.location='index.php';</script>";
								exit();
							}
						}
					}
				}		
				if(isset($_POST['title']))
				{
					$title = mysqli_real_escape_string($Connection, $_POST['title']);
			
					if(!empty($_POST['title']))
					{
						if(!preg_match('/^[A-Za-z ]{2,255}$/', $_POST['title']) )
						{
							echo "<script>alert('Invalid Task Name!');
									window.location='index.php';</script>";
							exit();
						}
					}
				}
				
				echo "<script>alert('Task Successfully Created!');
									window.location='index.php';</script>";
				
				$query = "INSERT INTO tasks (id,title,status,parent_id) VALUES ('','$title','$status','$parent_id')";
				mysqli_query($Connection, $query) or die(mysqli_error($Connection));
			}
			
			?>
            <br>
            
        </div>
      </div>
      <br />
      <br />
      <br>
      <br>
      <br>
      <br />
      <br />
      <br>
      <br>
      <br>
      
  </div>
  <div id="footer">
    Copyright &copy; textured_stars_light | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>  
  </div>
</div>
</body>
</html>
