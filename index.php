<?php

include 'config.php';
$link = "";
$link_status = "display: none;";

if(isset($_POST['upload'])){
	//describing variables
	$location = "uploads/";
	$file_new_name = date("dmy") . $_FILES["file"]["name"];//for unique name
	$file_name = $_FILES["file"]["name"];
	$file_temp = $_FILES["file"]["tmp_name"];
	$file_size = $_FILES["file"]["size"];

	echo "your uploaded material name is: " . $file_name;

	if($file_size >10485760){
		echo " <script>alert('WOOPS!! File is too big. Max size can be 10 mb') </script>"; 
	} else{
		$sql = "INSERT INTO  uploaded_files(name, new_name)
		VALUES ('$file_name', '$file_new_name')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
		move_uploaded_file($file_temp, $location . $file_new_name);
		echo "<script>congrats('File is Uploaded Successfully.') </script>";
		$sql = "SELECT id FROM uploaded_files ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
		if($row = mysqli_fetch_assoc($result)){
			$link = $base_url ."download.php?id=" .$row['id'];
			$link_status = "diplay: block;";
		}
			}
			else{
				echo "<script>alert('Woops! Something is Went Wrong.') </script>";
			}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Study Materials</title>
</head>
<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">
			<input type="checkbox" id="link_checkbox">
			<input type="text" value="<?php echo $link; ?>" id="link" readonly>
			<label for="link_checkbox" style=" <?php echo $link_status; ?>">Get Shareble Link</label>
			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span>browse</span> to begin the upload
				</p>
			</label>
			<button name="upload" class="btn">UPLOAD</button>
		</form>
	</div>
</body>
</html>