<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Pertemuan6_model extends CI_Model
{
    public $harga;
    public function proses ($data)
    {;
        if ($data =="Nike"){
            $this->harga = 375000;
        }elseif ($data =="Adidas"){
            $this->harga = 300000 ;
        }elseif ($data =="Kickers"){
            $this->harga =250000 ;
        }elseif ($data =="Eiger"){
            $this->harga = 275000 ;
        }else {
            $this->harga = 400000 ;
        }
        return $this->harga;
    }
}