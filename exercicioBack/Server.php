<?php

class Server {


    public DataBaseInterface $db;
    
    public function __construct(DataBaseInterface $d)
    {
        $this->db = $d;
    }
}