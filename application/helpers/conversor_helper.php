<?php

// converte um formato de data americano para um formato de data brasileiro
function data_us_to_br($dataUsa)
{

    if ($dataUsa) {
        $ano = substr($dataUsa, 0, 4);
        $mes = substr($dataUsa, 5, 2);
        $dia = substr($dataUsa, 8, 2);

        $dataBR = $dia . "/" . $mes . "/" . $ano;

        return $dataBR;
    } else {
        return null;
    }
}

// converte um formato de data brasileiro para um formato de data americano
function data_br_to_us($dataBR)
{

    if ($dataBR) {
        $ano = substr($dataBR, 6, 4);
        $mes = substr($dataBR, 3, 2);
        $dia = substr($dataBR, 0, 2);

        $dataUSA = $ano . "-" . $mes . "-" . $dia;

        return $dataUSA;
    } else {
        echo "data vazia";
        exit;
    }
}

// converte um formato decimal para o formato de moeda
function decimal_to_reais($data)
{

    if ($data) {
        $data = str_replace(',', '', $data);
        $data = str_replace('.', ',', $data);

        return $data;
    } else {
        return NULL;
    }
}

function format_br($data)
{
    return 'R$ ' . number_format($data, 2, ",", ".");
}

// converte um formato de moeda brasileira para decimal
function reais_to_decimal($data)
{
    if ($data) {
        $data = str_replace('.', '', $data);
        $data = str_replace(',', '.', $data);

        return $data;
    } else {
        return NULL;
    }
}

function converter_decimal_pv($strDecimal)
{
    $strDecimalFinal = number_format($strDecimal, 2, ',', '.');
    return $strDecimalFinal;
}

//retorna ddd
function ddd($celular)
{
    $partes = explode(' ', $celular);
    $ret = preg_replace('/[^0-9_]/', '', $partes);
    return $primeiroNome = array_shift($ret);
    // $ultimoNome = array_pop($partes);
}

//retorna número do telefone
function numeroTel($celular)
{
    $partes = explode(' ', $celular);
    $ret = preg_replace('/[^0-9_]/', '', $partes);
    return $primeiroNome = array_shift($ret);
    //eturn $ultimoNome = array_pop($ret);
}


