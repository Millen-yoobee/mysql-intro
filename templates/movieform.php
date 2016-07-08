<?php

if (isset($_GET ["id"])) {
	$verb = "Edit a ";
	$action = "./?page=update";
} else {
	$verb = "Add a ";
	$action = "./?page=insert";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Movie Create Form</title>
</head>
<body>
	<h1> <?=$verb ?>Movie</h1>
	<form method="post" action="<?=$action?>">
		<input type="hidden" name = "id" value="<?=$singleMovie->id?>" >
		<div>
			<label>Title</label>
			<input type= = "text" name = "title" value = "<?= $singleMovie->title  ?>" >
		</div>
		<div>
			<label>Description</label>
			<textarea name = "description"><?= $singleMovie->description ?> </textarea>
		</div>
		<div>
			<label>Rating</label>
			<select name = "rating" value = "<?= $singleMovie->rating  ?>" >
				<option value = "PGR"> PGR</option>
				<option value = "R"> R</option>
				<option value = "M"> M</option>
				<option value  = "G"> G</option>
			</select>
		</div>
		<div>
			<label>Year Released</label>
			<input type ="year" name ="release_date" value = "<?= $singleMovie->release_date  ?>" >
		</div>
		<div>
			<label>Duration</label>
			<input type = "number" name = "duration" value = "<?= $singleMovie->duration  ?>" >
		</div>
		<button type = "submit">Submit</button>
	</form>
</body>
</html>