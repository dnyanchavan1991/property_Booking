<!DOCTYPE html>
<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
<link rel="stylesheet" href="css/php_checkbox.css" />
</head>
<body>
	<div class="container">
		<div class="main">
		<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
			<form action="php_checkbox.php" method="post">
				<label class="heading">Select Your Technical Exposure:</label>
				<input type="checkbox" name="feeling" value="YES"><label>C/C++</label>
				<input type="checkbox" name="feeling1" value="YES"><label>Java</label>
				<input type="submit" name="submit" Value="Submit"/>

			</form>
		</div>
	</div>
</body>
</html>

<?php 
	if(isset($_POST['submit']))
	{
		
			if( !empty($_POST["feeling"]) ) 
				{ 
					$feeling="YES";
				}
			else 
				{ 
					$feeling="NO";
				}
			if( !empty($_POST["feeling1"]) ) 
				{ 
					 $feeling1="YES";
				}
			else 
				{  
					 $feeling1="NO";
				}
				echo"c++".$feeling;echo"<br>";
		echo"java".$feeling1;
	}
?>