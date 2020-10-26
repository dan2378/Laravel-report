<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/*Array di cambio valuta->EURO*/
class CambioEuro extends Controller
{
    public function getCambio(){

        $arrayCambio = array(
            "$" => "0.84",
            "£" => "1.10"
        );

        return json_encode($arrayCambio);
    }
}
