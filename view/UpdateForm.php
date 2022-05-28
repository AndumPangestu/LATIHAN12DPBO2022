<?php


include("KontrakView.php");
include("../presenter/ProsesPasien.php");

class UpdateForm implements KontrakView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $id;
    private $tpl;

    function UpdateForm($id)
    {
        $this->id = $id;
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil()
    {
        $this->prosespasien->getSpesifikPasien($this->id);

        // Membaca template skin.html
        $this->tpl = new Template("../templates/form.html");

        $idin = '<input type="hidden" name="id2" class="form-control" id="id" value="' . $this->prosespasien->getId(0) .  '"  required >';
        $this->tpl->replace("V_ID", $idin);
        $this->tpl->replace("V_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("V_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("V_TL", $this->prosespasien->getTl(0));
        $this->tpl->replace("V_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("V_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("V_TELP", $this->prosespasien->getTelp(0));

        if ($this->prosespasien->getGender(0) === "Laki-laki") {
            $this->tpl->replace("V_LK", "checked");
        } else {
            $this->tpl->replace("V_PR", "checked");
        }

        $tform = '"Update.php"';
        $this->tpl->replace("TUJUAN_FORM", $tform);
        // Menampilkan ke layar
        $this->tpl->write();
    }
}
