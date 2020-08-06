<?php 

    //CRUD
    class TaskService{
        private $con; 
        private $task;

        public function __construct(Connection $con, Task $task){
            $this->con = $con->connect(); 
            $this->task = $task;
        }

        public  function create(){
            $query = 'iNSERT into tb_task (task) values(:task)';
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':task' , $this->task->__get('task'));
            $stmt->execute();
        }
        public function read(){
            $query = '
                SELECT
                    t.id, s.status, t.task 
                FROM
                    tb_task as t
                        left join tb_status as s on  (t.id_status = s.id)';

            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function update(){
            $query = "update tb_task set task = :task where id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':task' , $this->task->__get('task'));
            $stmt->bindValue(':id' , $this->task->__get('id'));
            return $stmt->execute();
            
        }
        public function delete(){
            $query = 'delete from tb_task where id = :id'; 
            $stmt = $this->con->prepare($query); 
            $stmt->bindValue(':id' , $this->task->__get('id'));
            $stmt->execute();
        }
        public function check(){
            $query = "update tb_task set id_status = :id_status where id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindValue(':id_status' , $this->task->__get('id_status'));
            $stmt->bindValue(':id' , $this->task->__get('id'));
            return $stmt->execute();
            
        }

    }