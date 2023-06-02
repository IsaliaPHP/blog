<?php

class HomeController extends Controller
{
    public function initialize()
    {
        Load::setTemplate('default');
    }
    
    public function index() 
    {
        //cargar la página inicial
        $this->pagina = (new Pagina)->findById(1);
        Load::view("Home/index", $this->getProperties());
    }

}
