<?php
class Loader
{
    public function __construct()
    {
    }

    public static function controller($file)
    {
        require_once('app/controllers/' . $file . '.php');
        return new $file();
    }

    public static function adminController($file)
    {
        require_once('app/admin/controllers/' . $file . '.php');
        return new $file();
    }

    public function model($file)
    {
        require_once('app/models/' . $file . '.php');
        return new $file();
    }

    public function adminModel($file)
    {
        require_once('app/models/admin/' . $file . '.php');
        return new $file();
    }

    public function view($file, $data = null)
    {
        require_once('app/views/' . $file . '.php');
    }

    public function fullView($file, $data = null)
    {
        $this->view("inc/header");
        $this->view($file, $data);
        $this->view("inc/footer");
    }

    public function adminView($file, $data = null)
    {
        require_once('app/admin/views/' . $file . '.php');
    }

    public function fullAdminView($file, $data = null)
    {
        $this->adminView("inc/header");
        $this->adminView($file, $data);
        $this->adminView("inc/footer");
    }
}
?>