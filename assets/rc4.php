<?php

class rc4
{
  function enkripsi($key_str, $data_str)
  {
    //proses enkripsi dan dekripsi dilakukan didalam skrip ini,apabila fungsi dipanggil, kunci dan data teks akan di masukkkan dalam
    //key_str dan data_str
    //insial awal untuk kunci dan data teks
    $kunci = array();
    $data = array();

    //merubah / convert string dari key_str dan data_str ke ASCII masuk dalam array kunci dan data
    for ($a = 0; $a < strlen($key_str); $a++) {
      $kunci[] = ord($key_str{
      $a}); //ord akan convert string satu persatu ke ASCII
    }
    for ($b = 0; $b < strlen($data_str); $b++) {
      $data[] = ord($data_str{
      $b}); //sama dengan for pertama, convert to ASCII
    }
    //membuat kunci 256bit
    for ($knc = 0; $knc < 256; $knc++) {
      $state[] = $knc; //membuat array kunci sampai 256
    }

    //tahap saling menukar nilai data ke indek lain
    $len = count($kunci);
    $index1 = $index2 = 0; //inisial index1 dan index2 awal sebagai pointer
    for ($hitung = 0; $hitung < 256; $hitung++) {
      $index2 = ($kunci[$index1] + $state[$hitung] + $index2) % 256;
      $tmp = $state[$hitung]; // mengirim state indek hitung ke variabel smentara
      $state[$hitung] = $state[$index2];
      $state[$index2] = $tmp; //mengirim nilai dari tmp ke state index2
      $index1 = ($index1 + 1) % $len;
    }
    //enkripsi dengan rc4
    $len = count($data); //data dihitung panjang indeksnya
    $ix = $iy = 0; //inisial 2 variabel sebagai pointer
    for ($hitung1 = 0; $hitung1 < $len; $hitung1++) {
      $ix = ($ix + 1) % 256;
      $iy = ($state[$ix] + $iy) % 256;
      $tmp = $state[$ix]; //menyetor data ke variabel sementara
      $state[$ix] = $state[$iy]; //menukar data
      $state[$iy] = $tmp; //menukar data
      $data[$hitung1] ^= $state[($state[$ix] + $state[$iy]) % 256]; //operasi ekslusiv or (XOR) yang hasilnya akan di masukkan ke dalam data index hitung1
    }

    //data waktu di enkripsi maupun dekripsi masih dalam bentuk ASCII.
    //convert ke string
    $data_str = "";
    for ($i = 0; $i < $len; $i++) {
      $data_str .= chr($data[$i]);
    }
    return $data_str;
  }
}
