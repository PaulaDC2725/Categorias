<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller{

    function mostarForm ($id=NULL){
        return (!$id) ? 'Debe pasar un id' : 'Form id: '.$id;
    }

}