<?php

include("../model/Template.class.php");
include("../model/DB.class.php");
include("../model/Pasien.class.php");
include("../model/TabelPasien.class.php");
include("ProsesPasien.php");


if (isset($_GET["id"])) {

    try {
        $prosespasien = new ProsesPasien();
        $prosespasien->deleteDataPasien($_GET["id"]);
        header("Location: ../index.php");
    } catch (\Throwable $th) {
        echo "wiw error" . $e->getMessage();
    }
}
