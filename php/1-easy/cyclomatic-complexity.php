<?php

// Fonction donnée

function convertSize($bytes, $precision = 2) {
  $kilobytes = $bytes / 1024;

  if ($kilobytes < 1024) {
    return round($bytes, $precision) . ' KB';
  }

  $megabytes = $kilobytes / 1024;

  if ($megabytes < 1024) {
    return round($megabytes, $precision) . ' MB';
  }

  $gigabytes = $megabytes / 1024;

  if ($gigabytes < 1024) {
    return round($gigabytes, $precision) . ' GB';
  }

  $terabytes = $gigabytes / 1024;

  if ($terabytes < 1024) {
    return round($terabytes, $precision) . ' TB';
  }

  $petabytes = $terabytes / 1024;

  if ($petabytes < 1024) {
    return round($petabytes, $precision) . ' TB';
  }

  $exabytes = $petabytes / 1024;

  if ($exabytes < 1024) {
    return round($exabytes, $precision) . ' EB';
  }

  $zettabytes = $exabytes / 1024;

  if ($zettabytes < 1024) {
    return round($zettabytes, $precision) . ' ZB';
  }

  $yottabytes = $zettabytes / 1024;

  if ($yottabytes < 1024) {
    return round($yottabytes, $precision) . ' ZB';
  }

  $hellabyte = $yottabytes / 1024;

  if ($hellabyte < 1024) {
    return round($hellabyte, $precision) . ' HB';
  }
  
  return $bytes . ' B';
}

// Fonction Refactorisée

function convertSizeFromBytes($bytes, $precision = 2)
{
  // Tout d'abord je verifie si les arguments sont valides (supérieurs à 0)
  if($bytes <= 0 || $precision <= 0)
  {
    return false;
  }

  // Je vérifie ensuite si le nbr de bytes est inférieur à 1024, sa ne servirais à rien de convertir
  if($bytes < 1024)
  {
    return $bytes . "B";
  }

  // Je défini les unités dans un tableau
  $units = array("KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB", "HB");
  $index = 0;

  while ($bytes >= 1024) {
    $bytes =/ 1024;
    $index++;
  }

  // Un tableau commence par 0, donc j'enlève 1 par rapport au While()
  $index--;

  // Je retourne la valeur convertie et j'y attribue l'unité grace à l'index
  return round($bytes, $precision) . " " . $units[$index];

}