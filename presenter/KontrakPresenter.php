<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function deleteDataPasien($i);
	public function updateDataPasien($i);
	public function addDataPasien($i);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
}
