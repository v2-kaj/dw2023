<?php
	require_once('connect.php');

    $task = $_POST["task"];	
    
    $sql = "INSERT INTO todo (text) VALUES ('$task')";
    
    //Execute the sql
    if (mysqli_query($conn, $sql)) {
        //This block will execute if data was successfully inserted into the database
        header("Location: todo.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
        }
    
	mysqli_close($conn);		
?>