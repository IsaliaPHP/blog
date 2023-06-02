<?php

class Categoria extends Model
{
    use SlugifyTrait;

    public function beforeCreate()
    {
        $this->slug = $this->slugify($this->nombre);
        $this->activa = 1;
        $this->ult_actualizacion = date('Y-m-d H:i:s');
    }
    
    public function beforeUpdate()
    {
        $this->slug = $this->slugify($this->nombre);
        $this->ult_actualizacion = date('Y-m-d H:i:s');
    }
    
    public static function getNombre(int $id)
    {
        return Db::getScalar("SELECT nombre FROM categoria WHERE id = $id");
    }
    
    public static function optionsForSelect(int $selected = null)
    {
        $result = Db::findAll("SELECT id, nombre FROM categoria WHERE activa = 1");
        $options = '<option value="">Seleccione</option>';
        foreach($result as $item) {
            $seleccionado = '';
            if ($selected == intval($item['id'])) {
                $seleccionado = ' selected="selected" ';
            }
            $options .= '<option value="'.$item['id'].'" '.$seleccionado.'>'.$item["nombre"].'</option>';
        }
        return $options;
    }
}