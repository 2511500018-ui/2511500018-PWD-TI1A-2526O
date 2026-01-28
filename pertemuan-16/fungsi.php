<?php

function redirect_ke($url)
{
    header("Location: $url");
    exit;
}

function bersih($str)
{
    // AMAN walaupun yang masuk array
    if (is_array($str)) {
        return '';
    }
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

function tidakKosong($str)
{
    return strlen(trim($str)) > 0;
}

function formatTanggal($tgl)
{
    if ($tgl == '') return '';
    return date("d M Y", strtotime($tgl));
}

function tampilkanBiodata($conf, $arr)
{
    $html = "";
    foreach ($conf as $k => $v) {
        $label  = $v['label'];
        $suffix = $v['suffix'] ?? '';
        $nilai  = bersih($arr[$k] ?? '');
        $html  .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }
    return $html;
}

function tampilkanContactus($conf, $arr)
{
    $html = "";
    foreach ($conf as $k => $v) {
        $label  = $v['label'];
        $suffix = $v['suffix'] ?? '';
        $nilai  = bersih($arr[$k] ?? '');
        $html  .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }
    return $html;
}
