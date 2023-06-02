<?php

class PagesController extends Controller
{
    public function initialize()
    {
        Load::setTemplate('default');
    }
    
    public function show(string $slug) 
    {
        //cargar la página por slug
        $this->pagina = (new Pagina)->findFirst("WHERE slug = :slug", [":slug" => $slug]);
        Load::view("Home/index", $this->getProperties());
    }

    
}
