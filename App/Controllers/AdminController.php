<?php

class AdminController extends ScaffoldController
{
    protected $_model = "Pagina";
    
    public function cambiar_estado(int $id)
    {
        $datos_pagina = (new Pagina)->findById($id);
        $pagina = new Pagina();
        $pagina->id = $id;
        $pagina->activo = $datos_pagina['activo'] == '1' ? "0" : "1";
        $pagina->save();
        Router::to("admin");
    }
}
