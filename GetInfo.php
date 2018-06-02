<?php
/**
 * Created by PhpStorm.
 * User: youmerachat
 * Date: 02/06/2018
 * Time: 02:25
 */

require 'model/model.php';

if (isset($_POST["id_prop"]) && isset($_POST["id_app"]))
{

    $model = new Model();
    $result = $model->fetchInfo($_POST["id_prop"],$_POST["id_app"]);
    echo json_encode($result);
}

else if (isset($_POST["id_prop"]) && isset($_POST["id_equi"]))
{

    $model = new Model();
    $result = $model->fetchInfoEqui($_POST["id_prop"],$_POST["id_equi"]);
    echo json_encode($result);
}