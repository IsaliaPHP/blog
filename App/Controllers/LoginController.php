<?php

/**
 * 
 * @author nelson
 *
 */
class LoginController extends Controller
{

    public function initialize()
    {
        Load::setTemplate("login");
    }

    public function signin()
    {
        // revisar si el formulario incluye un input name="user" y
        // otro input name="password"
        if (Request::hasPost("user") && Request::hasPost("password")) {
            // extraer los inputs enviados desde el formulario
            $user_name = Request::post("user");
            $user_pass = Request::post("password");
            $remember_me = Request::post("remember");

            // revisar si las credenciales coinciden con un usuario en la
            // base de datos
            if (Usuario::check($user_name, $user_pass, $remember_me)) {
                // usuario encontrado, por lo tanto volvemos a la página principal
                // ir a Home/index
                Router::to("admin");
            }
            // el usuario no fue encontrado, por lo tanto dejamos este mensaje
            // para que pueda ser cargado en la vista
            $this->error_message = "Usuario o clave incorrecto!";
        }
        // cargar la vista con el formulario de login
        Load::view("Login/signin", $this->getProperties());
    }

    public function signout()
    {
        Usuario::destroyCookies();
        Session::destroy();
        Router::to("");
    }
}