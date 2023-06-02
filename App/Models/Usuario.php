<?php 

class Usuario extends Model
{
    public static function hasLoggedIn():bool
    {
        self::checkByCookie();
        return Session::get('is_auth') == true;
    }
    
    public static function checkByCookie()
    {
        if (isset($_COOKIE["user_id"]) && 
            isset($_COOKIE["user_stamp"])){
            
            if (!empty($_COOKIE["user_id"]) && !empty($_COOKIE["user_stamp"])){
                $sql = "SELECT * FROM usuario WHERE id= :id and stamp = :stamp and stamp <> ''";
                $parametros = [
                    ":id" => $_COOKIE["user_id"], 
                    ":stamp" => $_COOKIE["user_stamp"]
                ];
                $current_user_data = Db::findFirst($sql, $parametros);
                //asignamos las variables de la sesión
                self::setAuth($current_user_data);
                               
                return true;
            }            
        }
        return false;
    }
    
    public static function check($user_name, $password, $remember_me)
    {        
        $current_user_data = Db::findFirst(
            "SELECT * FROM usuario WHERE login = :login AND activo = 1", 
            [":login" => $user_name]);
        
        if (isset($current_user_data)) {
            if (password_verify($password, $current_user_data['clave'])) {
                
                self::setAuth($current_user_data);
                
                if ($remember_me == "remember-me") {
                    self::setAuthCookies($current_user_data);                    
                }
                
                return true;
            }
        }
        return false;
    }
    
    public static function destroyCookies()
    {
        unset($_COOKIE['user_id']);
        setcookie('user_id', null, -1, '/'); 
        
        unset($_COOKIE['user_stamp']);
        setcookie('user_stamp', null, -1, '/'); 
    }
    
    private static function setAuth($current_user_data)
    {
        Session::set("is_auth", true);
        Session::set("user_id", $current_user_data['id']);
        Session::set("user_name", $current_user_data['nombre']);
    }
    
    private static function setAuthCookies($current_user_data)
    {
        mt_srand (time());
        $random_number = mt_rand(1000000,999999999);
        $data = ["stamp" => $random_number];
        Db::update("usuario", $data, "WHERE id = " . $current_user_data['id']);
        
        setcookie("user_id", $current_user_data['id'] , time()+(60*60*24*365), "/");
        setcookie("user_stamp", $random_number, time()+(60*60*24*365), "/");
    }

    public function generateHash($password)
    {
        $options = [ 'cost' => 12, ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function beforeCreate()
    {
        $this->activo = 1;
        $this->ult_actualizacion = date('Y-m-d H:i:s');
        $this->clave = $this->generateHash($this->clave);
    }

    public function beforeUpdate()
    {
        $this->ult_actualizacion = date('Y-m-d H:i:s');
    }
}