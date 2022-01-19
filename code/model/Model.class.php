<?php 
    
   abstract class Model{
       private $pdo;

        private function setDB(){
            $this -> pdo = new PDO ("mysql:host=localhost;dbname=etoile_actu_projet;charset-utf8","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }

        protected function getDB(){
            if(empty($this->pdo)){
                $this->setDB();
            }
            return $this->pdo;
        }
    }

?>