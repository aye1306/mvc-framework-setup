<?php
require_once "../models/example_model.php";

if (isset($_GET['example_method'])) {
    $example = new Example_Model();
    $result = $example->example_use_database();
    echo json_encode(array('massage' => "GET Method", 'data' => $result));
}

if (isset($_POST['example_method'])) {
    $example = new Example_Model();
    $result = $example->example_use_database();
    echo json_encode(array('massage' => "POST Method", 'data' => $result));
}
