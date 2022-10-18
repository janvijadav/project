//w.a.p to upload,rename and display pic. in table.

<?php
   $con=mysqli_connect("localhost","root","","janvi");
   if(isset($_FILES['pic']))
	{   
        
	    $filename=$_FILES['pic'];
		$target_dir="pic/";
		$target_file=$target_dir.basename($_FILES["pic"]["name"]);
		$temp=explode(".",$_FILES['pic']['name']);
		$newfilename=rand(35000,350000).'.'.end($temp);
		move_uploaded_file($_FILES["pic"]["tmp_name"],$target_dir.$newfilename);
		$sql="INSERT INTO `pic`(`pic`) VALUES ('$newfilename')";
		$res=mysqli_query($con,$sql);
   }
?>

 
 <head>
	   
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css"/>
</head>
<div class="container-fluid mt-2">
 <form action="pic.php" method="POST" enctype="multipart/form-data">
<input type="file"  class="from-control" name="pic"  accept=".jpg,.png,.jpeg"></br></br>
<input type ="submit" value="save" class="btn btn-primary">
</div>
</form>
<table class="table table-bordered text-center ">
<div class="container mt-2">
<tr>
	<th>pic
  <?php
		$sql="SELECT * FROM `pic`";
		$res=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($res))
		{
 ?>
  <tr>
     <td><img src="<?php echo "pic/".$row['pic'];?>" height="100" width="100">
	<?php
	      }
		?>
</div>
</table>		 		 
