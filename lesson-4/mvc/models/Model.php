<?php

class Model
{
    function getAll($connect, $table, $orderby = 'id', $lastViewed = 0)
    {
        $query = "SELECT * FROM {$table} order by {$orderby} desc LIMIT {$lastViewed},10";

//    try {
//
//        $sql = $query;
//        $result = $dbh->query($sql);
//    } catch (PDOException $e) {
//    echo "Error: Could not connect. " . $e->getMessage();
//}
        $result = mysqli_query($connect, $query);

        if (!$result)
            die(mysqli_error($connect));

        $n = mysqli_num_rows($result);
        $res = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            //$row = $dbh::FETCH_ASSOC($result);
            $row['number'] = $lastViewed + $i + 1;
            $res[] = $row;
        }

        return $res;
    }
}