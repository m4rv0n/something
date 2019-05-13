<?php

namespace App\Controller;

class Product extends \Framework\Controller {
    public function testAction($xaxa, $xa, $as = "as") {
//        var_dump('asdawd');
        prevardump($xaxa);
        prevardump($xa);
        prevardump($as);
        prevardump($this->route_params);
    }
}