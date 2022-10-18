<?php
   $con=mysqli_connect("localhost","root","","janvi");
   if(isset($_FILES['picture']))
	{   
        
	    $filename=$_FILES['picture'];
		$target_dir="image/";
		$target_file=$target_dir.basename($_FILES["picture"]["name"]);
		$temp=explode(".",$_FILES['pic']['name']);
		$newfilename=rand(35000,350000).'.'.end($temp);
		move_uploaded_file($_FILES["pic"]["tmp_name"],$target_dir.$newfilename);
		$sql="INSERT INTO `image`(`pic`) VALUES ('$newfilename')";
		$res=mysqli_query($con,$sql);
   }
?>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
</head>
 <form action="pic.php" method="POST" enctype="multipart/form-data">
<input type="file" name="pic" accept=".jpg ,.png,.jpeg">
<input type ="submit" value="save">

</form>
<table class="table table-bordered text-center ">
<div class="container mt-2">
<tr>
	<th>picture
  <?php
		$sql="SELECT * FROM `pic`";
		$res=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($res))
		{
 ?>
  <tr>
     <td><img src="<?php echo "image/".$row['picture'];?>" height="100" width="100">
	<?php
	      }
		?>
</div>
</table>		 