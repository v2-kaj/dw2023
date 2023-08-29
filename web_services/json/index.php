<?php
    $j = '{
        "name": "Ron",
        "age": 21,
        "isStudent": true,
        "address": {
                "street": "123 Main St",
                "city": "Exampleville",
                "country": "JSONland"
            },
        "hobbies": ["reading", "swimming", "painting"]
    }';
     $d = json_decode($j, true);
     echo $d["name"];
     echo $d["age"];
     echo $d["hobbies"][1];
     echo $d["address"]["city"];
?>