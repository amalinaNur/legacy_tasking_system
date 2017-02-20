<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Edit Task Dependencies</title>
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

while($_POST = mysqli_fetch_array($result))
{	
	$id=$_POST['id'];
	$parent_id=$_POST['parent_id'];
	$title=$_POST['title'];
	$dependencies=$_POST['dependencies'];
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
        <h1><b style="text-decoration:underline; color: #333;">Edit Task Name</b></h1>
        <br>
        <br>
        <br>
        <div class="id">
       	  <form action="success_edit_dependencies.php" name="edit" method="POST" id="edit" enctype="multipart/form-data">
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
                <input type="text" id="dependencies" name="dependencies" value="<?php echo $dependencies; ?>">
            </div>
            
                <br>
                <br>
                <br>
                
   				<input type="submit" name="submit" value="Update" class="button">
				<input type="submit" name="submit" class="button" value="Cancel" formaction="list_tasks.php"/>       	  
          </form>
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
