<?php

class Html
{
    static $_inputId;
    static $_inputName;
    static $_options;
    static $_value;
    static $_checked;

    public static function linkTo(string $name, string $url, string $options = "")
    {
        return "<a href=\"". PUBLIC_PATH . "$url\" $options >$name</a>";
    }
    
    public static function img($url, $alt = '', $attributes = '') {
        return "<img src='" . PUBLIC_PATH . "images/$url' alt='$alt' $attributes />";
    }
    
    public static function css($file) {
        return '<link href="' . PUBLIC_PATH . 'css' . DS . $file . '.css" rel="stylesheet">';
    }
    
    public static function js($file) {
        return '<script type="text/javascript" src="' . PUBLIC_PATH . 'js' . DS . $file . '.js"></script>';
    }
    
    public static function resolve($source) {
        return PUBLIC_PATH . $source;
    }

    public static function formOpen(string $url, string $options = "")
    {
        return "<form action=\"". PUBLIC_PATH . "$url\" method=\"post\" $options >" .
                PHP_EOL . self::hidden('safety_key', md5(rand()) .
                chr(rand(65, 90)) . md5(Config::SAFETY_SEED) .
                chr(rand(48, 57))) . PHP_EOL;
    }

    public static function formOpenMultipart(string $url, string $options = "")
    {
        return "<form action=\"". PUBLIC_PATH . "$url\" method=\"post\" $options enctype=\"multipart/form-data\">" .
                PHP_EOL . self::hidden('safety_key', md5(rand()) .
                chr(rand(65, 90)) . md5(Config::SAFETY_SEED) .
                chr(rand(48, 57))) . PHP_EOL;
    }

    private static function getInput($field, $options = '', $value = null, $checked = FALSE) {
        self::$_inputId = $field;
        self::$_inputName = $field;
        self::$_options = $options;
        self::$_value = '';
        self::$_checked = '';

        if (strpos($field, '.') !== FALSE) {
            $elements = explode('.', $field);
            self::$_inputId = $elements[0] . '_' . $elements[1];
            self::$_inputName = $elements[0] . '[' . $elements[1] . ']';
        }
        if ($value != null) {
            self::$_value = " value=\"$value\"";
        }

        if ($checked === TRUE) {
            $checked = " checked=\"checked\"";
        } else {
            $checked = "";
        }
        self::$_options = $options . $checked;
    }

    public static function input($type, $field, $options = '', $value = null, $checked = FALSE) {
        self::getInput($field, $options, $value, $checked);

        return "<input type=\"$type\" id=\"" . self::$_inputId .
                "\" name=\"" . self::$_inputName .
                "\" " . self::$_options .
                " " . self::$_value . " />";
    }

    public static function text($field, $options = '', $value = null) {
        return self::input('text', $field, $options, $value);
    }

    public static function password($field, $options = '', $value = null) {
        return self::input('password', $field, $options, $value);
    }

    public static function textarea($field, $options = '', $value = null) {
        self::getInput($field, $value);

        return "<textarea id=\"" . self::$_inputId .
                "\" name=\"" . self::$_inputName . "\" $options>" .
                $value . "</textarea>";
    }

    public static function check($field, $options = '', $value = '', $checked = FALSE) {
        return self::input('checkbox', $field, $options, $value, $checked);
    }

    public static function select($field, $data, $options = '', $select = null, $value = null) {
        self::getInput($field, $options, $value);

        $result = "<select id=\"" .
                self::$_inputId . "\" name=\"" .
                self::$_inputName . "\" " .
                self::$_options . ">" . PHP_EOL;

        if (!empty($select)) {
            $result .= "<option value=\"\">" . $select . "</option>" . PHP_EOL;
        }

        $result .= $data;

        $result .= "</select>" . PHP_EOL;

        return $result;
    }

    public static function label($field, $text, $options = '') {
        self::getInput($field, $options);

        return "<label for=\"" . self::$_inputName . "\" " .
                self::$_options . ">$text</label>";
    }

    public static function hidden($field, $value = null) {
        return self::input('hidden', $field, "", $value);
    }

    public static function button($value, $type = 'button', $options = '') {
        return "<button type=\"$type\" $options>$value</button>";
    }
    public static function tags(string $tags)
    {
        if (empty($tags)) {
            return "";
        }
        $elements = explode(",", $tags);
        $salida = '';
        foreach($elements as $tag) {
            $salida .= '<span class="label label-default">'.$tag.'</span>&nbsp'; 
        }
        return $salida;
    }
}