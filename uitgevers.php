<?php 
	require("index.php");

	require('tools/SourceObj.php');
?>



<!DOCTYPE html>
<html>
<head>
	<title>Uitgvers</title>
	<link rel="stylesheet" type="text/css" href="assets/css/uitgverstyle.css">
</head>
<body>

	<div class="source-containter">
			<?php 

				$sources = new SourceObj();

				$sourceAttr = $sources->returnSources();


				foreach($sourceAttr as $name => $image){

					echo "<a href=".$name." target='_blank' class='source'>
					<div class='logo' style='background-image: url(".$image.");'>
					</div></a>";
				}
				

			?>
	</div>


</body>
</html>