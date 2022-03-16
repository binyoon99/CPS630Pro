<?php

    function selectCol($connection, $table, $col) {
        $sql = "SELECT ". $col ." FROM ". $table ."";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $list;
            while($row = $result->fetch_assoc()) {
                
            }
        }
    }

?>