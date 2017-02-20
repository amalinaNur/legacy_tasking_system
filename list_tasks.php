<?php
include("Connections/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>List of Tasks</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" title="style" />
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
          <li><a href="index.php">Create New</a></li>
          <li class="selected"><a href="list_tasks.php">List of tasks</a></li>
        </ul>
      </div>
</div>
    <div id="site_content">
      <div id="content">
        <!-- insert the page content here -->
        <br>
        <br>
        <h1><b style="text-decoration:underline; color: #333;">List of Tasks</b></h1>
        <br />
        <div style="overflow-x:auto;" align="center">
        <table>
          <tr bgcolor="#003399" style="color:#FFF" >
            <td width="3%"></td>
            <td width="3%"></td>
            <td width="3%"></td>
            <td width="18%">Parent Task ID</td>
            <td width="12%">Task Name</td>
            <td width="8%">Status</td>
            <td width="20%">Total Dependencies</td>
            <td width="12%">Total Done</td>
            <td width="16%">Total Complete</td>
          </tr>
          <?php
		  $query = "SELECT * FROM tasks ORDER BY parent_id ASC";
                          
		  $result = mysqli_query($Connection, $query);
		  while($row = mysqli_fetch_array($result))
		  { 
			  $id = $row['id'];
			  $title = $row['title'];
			  $parent_id = $row['parent_id'];
			  $status = $row['status'];
			  $dependencies = $row['dependencies'];

			  
			  
			  

			  if($status == '0')
			  {
				  echo "<tr>
				  <td><a href='add.php?id=$id'>Add</a></td>
				  <td><a href='edit_task.php?id=$id'>Edit</a></td>
				  <td><a href='delete.php?id=$id' onclick='return onDelete();'>Delete</a></td>
				  <td><a href='list_dependencies.php?id=$id'>$parent_id</a></td>
				  <td>$title</td>
				  <td>In Progress</td>
				  <td></td>
				  <td></td>
				  <td></td>
				  </tr>";
			  }
			  else if($status == '1')
			  {
				  echo "<tr>
				  <td><a href='add.php?id=$id'>Add</a></td>
				  <td><a href='edit_task.php?id=$id'>Edit</a></td>
				  <td><a href='delete.php?id=$id'>Delete</a></td>
				  <td><a href='list_dependencies.php?id=$id'>$parent_id</a></td>
				  <td>$title</td>
				  <td>Done</td>
				  <td></td>
				  <td></td>
				  <td></td>
				  </tr>";
			  }
			  else if($status == '2')
			  {
				  echo "<tr>
				  <td><a href='add.php?id=$id'>Add</a></td>
				  <td><a href='edit_task.php?id=$id'>Edit</a></td>
				  <td><a href='delete.php?id=$id'>Delete</a></td>
				  <td><a href='list_dependencies.php?id=$id'>$parent_id</a></td>
				  <td>$title</td>
				  <td>Complete</td>
				  <td></td>
				  <td></td>
				  <td></td>
				  </tr>";
			  }
			  
          }
		  ?>
        </table>
        
        </div>
        <br>
        <?php 
		$result = mysqli_query($Connection, "SELECT COUNT(id) AS num_rows FROM tasks");
		$row = mysqli_fetch_object($result);
		$total = $row->num_rows;
		echo "<p align='left'>Total Record: $total</p>";
		?>
      </div>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
  </div>
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
</script>
</body>
</html>
