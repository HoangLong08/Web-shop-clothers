<?php

function executeQuery($conn, $query){
	$result_post = mysqli_query($conn, $query);	
	return $result_post;
}
function validate($regex, $string){
	if (preg_match($regex, $string)) {
		return true;
	} else { 
		return false;
	} 
}
?>