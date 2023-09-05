<?php
    require_once('connect.php');
    $sql = "SELECT * FROM todo";

    $results = mysqli_query($conn, $sql);

    $xml = new DOMDocument();
    $root = $xml->createElement("Todos");
    $xml->appendChild($root);
    
    $xml->formatOutput = true;

    foreach ($results as $result) {
        $task = $xml->createElement("Task");
        $root->appendChild($task);
            $id = $xml->createElement("id", $result['id']);
            $text = $xml->createElement("text", $result['text']);
        $task->appendChild($id);
        $task->appendChild($text);
    }

    echo $xml->saveXML();
?>