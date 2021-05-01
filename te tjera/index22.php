<?php
include('connect');

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

?>

<?php
	while ($row=mysqli_fetch_array($result)){
		
	}
?>