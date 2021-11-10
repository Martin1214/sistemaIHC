<?php
function sumarNum($n1, $n2)
{    //AQUI SE VALIDA CEDULA ECUATORIANA
    if (is_numeric($n1) && is_numeric($n2)) {
        $suma = intval($n1) + intval($n2);
        $arr = [
            "msj" => $suma,
            "code" => "500"
        ];
        //$arr = $this->genericResponse($suma, '', 500);
    } else {
        //$arr = genericResponse('Problemas con su solicitud', '', 200);
        $arr = [
            "msj" => "Problemas con su solicitud",
            "code" => "200"
        ];
    }

    return $arr;
}
