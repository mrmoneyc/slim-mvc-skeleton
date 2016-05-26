<?php
namespace App\Model;

class BaseModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
