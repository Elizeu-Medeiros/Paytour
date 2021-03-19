<?php
function validaCPF($cpf)
{
    // Extrai somente os números
    $value = preg_replace('/[^0-9]/is', '', $cpf);
    
    if (strlen($value) !== 11 || preg_match('/(\d)\1{10}/', $value)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $value{
            $c} * (($t + 1) - $c);
        }

        $d = ((10 * $d) % 11) % 10;

        if ($value{
        $c} != $d) {
            return false;
        }
    }

    return true;
}
