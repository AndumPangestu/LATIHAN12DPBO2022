<?php

include("../model/Template.class.php");
include("../model/DB.class.php");
include("../model/Pasien.class.php");
include("../model/TabelPasien.class.php");
include("../view/AddForm.php");
include("ProsesPasien.php");


if (isset($_GET["add"])) {

    try {
        $addform = new AddForm();
        $addform->tampil();
    } catch (\Throwable $th) {
        echo "wiw error" . $e->getMessage();
    }
}

if (isset($_POST["id"])) {

    try {
        $prosespasien = new ProsesPasien();
        $prosespasien->addDataPasien($_POST);
        var_dump($_POST);
    } catch (\Throwable $th) {
        echo "wiw error" . $e->getMessage();
    }
}
