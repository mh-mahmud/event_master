<?php

require_once 'core/init.php';

if(isset($_POST['upload_form'])) {
    if($_FILES['upload_file']['type'] != "application/json") {
        return;
    }

    $json_data = json_decode(file_get_contents($_FILES['upload_file']['tmp_name']));
    $insert = (new Upload())->uploadJsonData($json_data);
    if($insert===true) {
        echo "<span style='color:green'>File uploaded successfully</span><br /><br />";
    }
    else {
        echo $insert;
    }
}

$query_params = [];
if(isset($_POST['search'])) {
    $query_params = $_POST;
}
$e_data = (new Events())->get_events($query_params);


require_once("views/upload.php");
require_once("views/events.php");
?>