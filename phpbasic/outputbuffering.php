<?php
 ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Website</title>
</head>
<body>
	<h1>Hello from My Website</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A laudantium nulla quae modi. Facilis eum assumenda eligendi laudantium recusandae consequatur voluptas est, natus libero sequi in itaque, aperiam quos consectetur!</p>
	<h2>Hello from my website</h2>
</body>
</html>

<?php
 $variable = ob_get_clean();
 echo $variable;
?>