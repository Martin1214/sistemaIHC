<?php
function cedulaV($cedula)
{    //AQUI SE VALIDA CEDULA ECUATORIANA
    if (strlen($cedula) ===  10) {
        $sum = 0;
        $sumi = 0;
        for ($i = 0; $i < strlen($cedula) - 2; $i++) {
            if ($i % 2 == 0) {
                $sum += substr($cedula, $i + 1, 1);
            }
        }
        $j = 0;
        while ($j < strlen($cedula) - 1) {
            $b = substr($cedula, $j, 1);
            $b = $b * 2;
            if ($b > 9) {
                $b = $b - 9;
            }
            $sumi += $b;
            $j = $j + 2;
        }
        $t = $sum + $sumi;
        $res = 10 - $t % 10;
        $aux = substr($cedula, 9, 9);
        if ($res == $aux) {
            return "Cedula valida!";
        } else {
            return "Cedula invalida!";
        }
    } else {
        return "la cedula tiene que tener 10 digitos";
    }
}