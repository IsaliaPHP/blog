<?php

class CategoriasController extends ScaffoldController
{
    protected $_model = "Categoria";
    
    public function cambiar_estado(int $id)
    {
        $datos_categoria = (new Categoria)->findById($id);
        $categoria = new Categoria();
        $categoria->id = $id;
        $categoria->activa = $datos_categoria['activa'] == '1' ? "0" : "1";
        $categoria->save();
        Router::to("Categorias");
    }
}