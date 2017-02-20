<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>List of Dependencies</title>
  <meta name="description" content="website description" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	$status=$_POST['status'];
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
            <h1><b style="text-decoration:underline; color: #333;">List of Dependencies</b></h1>
            <br />
            <div class="id">
                <form action="success_check.php" method="post" enctype="multipart/form-data" >
                    <div>
                        <label>Parent Task ID:</label>
                        <input name="parent_id" type="text" id="parent_id" value="<?php echo $parent_id; ?>" maxlength="11" readonly="readonly">
                    </div>
                    <div>
                        <label>Task Name:</label>
                        <input type="text" id="title" name="title" value="<?php echo $title; ?>" maxlength="11" readonly="readonly">
                        
                    </div>
                    <br />
                
                <br />
                <br />
                <br />
                <table>
                  <tr bgcolor="#003399" style="color:#FFF" >
                    <td></td>
                    <td></td>
                    <td width="50%">Dependencies</td>
                    <td width="50%">Status</td>
                  </tr>
                  <?php
                  $query = "SELECT * FROM tasks WHERE id='$id'";
                                  
                  $result = mysqli_query($Connection, $query);
                  while($row = mysqli_fetch_array($result))
                  { 
                      $id = $row['id'];
                      $title = $row['title'];
                      $parent_id = $row['parent_id'];
					  $status = $row['status'];
                      $dependencies = $row['dependencies'];
                      
                      echo "<tr>
                          <td><a href='edit_dependencies.php?id=$id'>Edit</a></td>
                          <td><a href='delete.php?id=$id' onclick='return onDelete();'>Delete</a></td>
                          <td>$dependencies</td>
                          <td><input type='checkbox' value='1' name='status'>&nbsp;Done
						  		&nbsp;<input type='checkbox' value='2' name='status'>&nbsp;Complete</td>
                          </tr>";
                  }
                  ?>
                </table>
                <br />
                <br />
                <br />
                <input type="submit" name="submit" class="button" value="Submit"/>
                <input type="submit" name="submit" class="button" value="Back" formaction="list_tasks.php"/>
                <br />
                <br />
                <br />
                <br />
                <br />
                </form>
            </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />
            
  <div id="footer">
    Copyright &copy; textured_stars_light | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>  
  </div>
</div>
<script>
function onDelete()
{
	if (confirm('Delete?') == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function button()
{
	window.location = "list_tasks.php";
}
</script>
</body>
</html>
