<?php

class ScaffoldController extends Controller
{
    protected $_model;

    public function initialize()
    {
        Load::setTemplate('admin');
    }

    public function beforeFilter()
    {
        if (!Usuario::hasLoggedIn()) {
            //redirigir a Login/signin
            return Router::to("Login/signin");
        }
    }

    public function index()
    {
        $this->list_of_items = (new $this->_model)->findAll("ORDER BY id DESC");
        Load::view($this->_controller . "/index", $this->getProperties());
    }

    public function create()
    {
        $current_model = new $this->_model();
        if (Request::hasPost('data')) {
            $request_data = Request::post('data');
            $current_model->load($request_data);
            if ($current_model->save()) {
                Router::to($this->_controller);
            } else {
                $this->message = "Imposible crear el elemento";
            }
        }
        Load::view($this->_controller . "/create", $this->getProperties());
    }

    public function edit(int $id)
    {
        $current_model = new $this->_model();
        if (Request::hasPost('data')) {
            $request_data = Request::post('data');
            $current_model->load($request_data);
            $current_model->id = $id;
            if ($current_model->save()) {
                Router::to($this->_controller);
            } else {
                $this->message = "Imposible actualizar el elemento";
            }
        }
        $this->current_item = $current_model->findById($id);
        Load::view($this->_controller . "/edit", $this->getProperties());
    }

    public function delete(int $id)
    {
        $current_model = new $this->_model();
        $current_model->id = $id;
        $current_model->delete();
        Router::to($this->_controller);
    }
}