<?php

    require_once "./configuration/connect.php";

    class ClientModel extends Connect{
        
        private $table;

        function __construct(){
            parent::__construct();
            $this->table = "exped";
        }

        public function getAll(){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table ORDER BY id DESC");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function search($data,$view=null){
            if($view == 'index')
            {
                $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data' or datahora LIKE '%$data%' or numeronf LIKE '%$data%' or exped LIKE '%$data%' or quemrecebeu LIKE '%$data%' or statusdep LIKE '%$data%'");
            }
            else
            {
                $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data'");
            }
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function new($data){
            $sqlUpdate = "INSERT INTO $this->table (datahora,numeronf,exped,quemrecebeu,statusdep) VALUES (:datahora, :numeronf, :exped, :quemrecebeu, :statusdep)";
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['datahora'=>$data['datahora'],'numeronf'=>$data['numeronf'],'exped'=>$data['exped'],'quemrecebeu'=>$data['quemrecebeu'],'statusdep'=>$data['statusdep']]);
            return $this->verifyReturn($resultQuery);
        }

        public function edit($data){
            if(strlen($data['phone']) <= 11)
            {
                $sqlUpdate = "UPDATE $this->table SET datahora = :datahora, numeronf = :numeronf, exped = :exped, quemrecebeu = :quemrecebeu, statusdep = :statusdep WHERE id = :id";
                $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['id'=>$data['id'],'datahora'=>$data['datahora'],'numeronf'=>$data['numeronf'],'exped'=>$data['exped'],'quemrecebeu'=>$data['quemrecebeu'],'statusdep'=>$data['statusdep']]);
                return $this->verifyReturn($resultQuery);
            }
            return false;
        }

        public function delete($id){ 
            if(!$this->search($id))
            {
                return false;
            }
            $sqlDelete = "DELETE FROM $this->table WHERE id = :id";
            $resultQuery = $this->connection->prepare($sqlDelete)->execute(['id'=>$id]);
            return $this->verifyReturn($resultQuery);
        }

        public function verifyReturn($result){
            if($result == 1)
            {
                return true;
            }
            return false;
        }
    }

?>
