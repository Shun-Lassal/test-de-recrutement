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
  // First we check if the values are valid (i.e. positive numbers)
  if($bytes <= 0 || $precision <= 0)
  {
    return false;
  }

  // if the number of bytes is less than 1024 we don't need to convert anything
  if($bytes < 1024)
  {
    return $bytes . "B";
  }

  // Lets define the units in an array
  $units = array("KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB", "HB");
  $index = 0;

  while ($bytes >= 1024) {
    $bytes =/ 1024;
    $index++;
  }

  // An array starts by 0, so lets remove one (because of the while loop)
  $index--;

  // we return the converted value and we set the unit thanks to the index
  return round($bytes, $precision) . " " . $units[$index];

}