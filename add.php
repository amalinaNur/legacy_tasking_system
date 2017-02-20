<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Add Dependencies Task</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" title="style" />
  <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
</head>

<body>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tasks WHERE id='$id'";	
$result = mysqli_query($Connection,$sql);

while($row = mysqli_fetch_array($result))
{	
	$id=$row['id'];
	$parent_id=$row['parent_id'];
	$title=$row['title'];
	$status=$row['status'];
}
?>
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
          <li><a href="index.php">Create New</a></li>
          <li><a href="list_tasks.php">List of tasks</a></li>
        </ul>
      </div>
</div>
    <div id="site_content">
      <div id="content">
        <!-- insert the page content here -->
        <br>
        <br>
        <h1><b style="text-decoration:underline; color: #333;">Add Dependencies Task</b></h1>
        <br>
        <div class="id">
       	  <form action="" name="edit" method="POST" id="edit" enctype="multipart/form-data">
            <div>
                <label>Parent Task ID:</label>
                <input name="parent_id" type="text" id="parent_id" value="<?php echo $parent_id; ?>" maxlength="11" readonly="readonly">
            </div>
            <div>
                <label>Task Name:</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>" readonly="readonly">
            </div>
            <div>
                <label>Dependencies:</label>
                <input type="text" id="dependencies" name="dependencies" >
            </div>
            
                <br>
                <br>
                <br>
                
   				<input type="submit" name="submit" value="Add" class="button">
				<input type="submit" name="submit" class="button" value="Cancel" formaction="list_tasks.php"/>       	  
          </form>
          <?php
			if(isset($_POST['submit']))
			{
				//$id=$_POST['id'];
				$parent_id=$_POST['parent_id'];
				$title=$_POST['title'];
				$dependencies = $_POST['dependencies'];
						
				if(isset($_POST['dependencies']))
				{
					$dependencies = mysqli_real_escape_string($Connection, $_POST['dependencies']);
			
					if(!empty($_POST['dependencies']))
					{
						if(!preg_match('/^[A-Za-z0-9. ]{2,255}$/', $_POST['dependencies']) )
						{
							echo "<script>alert('Invalid Dependencies!');
									window.location='list_tasks.php';</script>";
							exit();
						}
						else
						{
							$query = "SELECT * FROM tasks WHERE dependencies = '$dependencies'";
							$result = mysqli_query($Connection, $query);
							$count = mysqli_fetch_array($result);
					
							if($count['dependencies'] == $dependencies)
							{
								echo "<script>alert('Error!');
											window.location='list_tasks.php';</script>";
								exit();
							}
						}
					}
				}
				
				echo "<script>alert('Dependencies Successfully Created!');
									window.location='list_tasks.php';</script>";
				$query = "UPDATE tasks SET title='$title', parent_id='$parent_id', dependencies='$dependencies' WHERE parent_id='$parent_id'";
				mysqli_query($Connection, $query) or die(mysqli_error($Connection));
			}
			
		  ?>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
         </div>   
        <br />
            <br />
            <br />
            <br />
            
        </div>
      </div>
  </div>
  <div id="footer">
    Copyright &copy; textured_stars_light | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>  
  </div>
</div>
<script type="text/javascript">
function button()
{
	window.location = "list_tasks.php";
}
</script>
</body>
</html>
