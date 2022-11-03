<?php

function getQueryData ($table, $where, $query, $selectArray) {
    $db = mysqli_connect('localhost','root','','house_rental_db');
   return $db->query("SELECT '$selectArray' FROM '$table'  WHERE '$where' = '$query'")->fetch_assoc();
}
