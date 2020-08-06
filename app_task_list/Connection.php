<?php  

class Connection{
    private $host = 'localhost';
    private $dbname ='db_task'; 
    private $user = 'root';
    private $pass = '';

    public function connect(){
        try{
            $con = new PDO(
             "mysql:host=$this->host;dbname=$this->dbname",
             "$this->user",
             "$this->pass");

            return $con; 

        }catch(PDOException $e){
            $msg = $e->getMessage();
            echo $msg;
        }
    }

    
}