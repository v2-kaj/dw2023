<?php

	require_once('connect.php');
    $text = $_POST["text"];	
    
    $sql = "INSERT INTO todo (text) VALUES ('$text')";
    
    //Execute the sql
    if (mysqli_query($conn, $sql)) {
       echo "succeded";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
        }
    
	mysqli_close($conn);		
?>