<?php

function rupiah($value)
{
    $result = "Rp. " . number_format($value, 2, ',', '.');
    return $result;
}
