<?php

include("../model/Template.class.php");
include("../model/DB.class.php");
include("../model/Pasien.class.php");
include("../model/TabelPasien.class.php");
include("../view/UpdateForm.php");


if (isset($_GET["id"])) {

    try {
        $updateform = new UpdateForm($_GET["id"]);
        $updateform->tampil();
    } catch (\Throwable $th) {
        echo "wiw error" . $e->getMessage();
    }
}

if (isset($_POST["id"])) {

    try {
        $prosespasien = new ProsesPasien();
        $prosespasien->updateDataPasien($_POST);
        header("Location: ../index.php");
    } catch (\Throwable $th) {
        echo "wiw error" . $e->getMessage();
    }
}
