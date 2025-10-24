<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka, $withPrefix = true)
    {
        $hasil = number_format($angka, 0, ',', '.');
        return $withPrefix ? 'Rp ' . $hasil : $hasil;
    }
}
