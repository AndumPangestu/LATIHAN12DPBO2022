<?php


include("KontrakView.php");


class AddForm implements KontrakView
{
    private $tpl;

    function AddForm()
    {
        // Membaca template skin.html
        $this->tpl = new Template("../templates/form.html");
    }

    function tampil()
    {

        $tform = '"Tambah.php"';
        $this->tpl->replace("TUJUAN_FORM", $tform);
        // Menampilkan ke layar
        $this->tpl->write();
    }
}
