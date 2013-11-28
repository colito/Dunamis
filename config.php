<?php

class Config
{
    public $user_name = 'admin_dunamis';
    public $user_pword= 'KEmohae';

    public function file_root()
    {
        # set this to the root folder relative to this projects containing folder
        $root = $_SERVER['DOCUMENT_ROOT'].'/emp/';
        return $root;
    }
}

# navigation links
define('navi_home', '../open_file/');
define('navi_open_file', '../open_file/');
define('navi_edit_file', '../edit_file/');
define('navi_file_explorer', '../file_explorer/');
define('navi_shell', '../shell/');

# included file paths
define('main_include', '../includes/');
define('main_header', '../includes/header.php');
define('main_footer', '../includes/footer.php');

define('main_fns', '../fns/');
define('main_user_handler', '../fns/user_hanlder/');

# login
define('main_login', '../login/');
define('main_sign_out', '../login/sign_out.php');

# css
define('main_images', '../images/');
define('main_css', '../css/');
define('main_css_reset', '../css/normalize.css');
define('main_css_grid', '../css/grid.css');
define('main_css_style', '../css/style.css');

# js
define('main_js', '../js/');
define('main_jquery', '../js/jquery-2.0.3.min.js');
define('main_edit_area', '../js/edit_area/');
define('main_edit_area_js', '../js/edit_area/edit_area_full.js');


?>