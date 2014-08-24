<?php 

ob_start();

echo "How are you? <br />";
echo "Where do you live? <br />";
echo "How do you study this lecture? <br />";

$output = ob_get_clean();

echo $output;
 ?>