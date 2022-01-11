<?php
	include 'config.php';
	$id = $_GET['id'];
	if(!$id){
		header("Location: index.php");

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
			<p><i class="fa fa-download fa-2x"></i><span><span>down</span>load</span></p>			
		</div>
		<form class="body">
			<div class="download">
				<?php
				$sql = "SELECT * FROM uploaded_files WHERE id='$id'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)>0){
					if($row = mysqli_fetch_assoc(result)){
						?>
						<a href="uploads/<?php echo $row['name'];?>"
						download="" class="download_link"></a>
						<?php 

					}
				}
				?>
				
			</div>
			
		</form>
	</div>
</body>
</html>