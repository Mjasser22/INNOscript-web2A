
<?php
$id=$_POST['id'];
echo $id;

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login.css">
	<title>Image Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		
	</style>
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="upload.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="image">
				  <input type="text" name="id_u">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>


<?php
$id=$_POST['id'];
echo $id;
?>