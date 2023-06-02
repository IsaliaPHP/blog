<?php

class Pagina extends Model
{
    use SlugifyTrait;
    
    public function beforeCreate()
    {
        $this->f_creacion = date('Y-m-d H:i:s');
        $this->slug = $this->slugify($this->titulo);
        $this->ult_actualizacion = date('Y-m-d H:i:s');
    }
    
    public function beforeUpdate()
    {
        $this->ult_actualizacion = date('Y-m-d H:i:s');
    }
}