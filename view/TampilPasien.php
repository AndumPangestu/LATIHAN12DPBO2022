<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function TampilPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>
            <a href='presenter/Update.php?id=" . $this->prosespasien->getId($i)  . "' class='btn btn-warning' '>Edit</a>
            <a href='presenter/Delete.php?id=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a>
            </td>
            </tr>";
		}


		$ttambah = '"presenter/tambah.php?add=1"';

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");


		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("TUJUAN_TAMBAH", $ttambah);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tambah()
	{
		$this->tpl = new Template("templates/tambah.html");
		$this->tpl->write();
	}
}
