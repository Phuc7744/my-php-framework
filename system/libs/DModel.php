<?php
class DModel
{
    protected $db = array();

    public function __construct()
    {
        $this->db = new Database(DB_URL, DB_USER, DB_PASSWORD);
    }
}
?>