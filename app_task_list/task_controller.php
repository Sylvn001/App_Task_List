<?php  
    require "../../app_task_list/model.task.php";
    require "../../app_task_list/task.Service.php";
    require "../../app_task_list/Connection.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action; 

    if($action == 'insert'){
        //recovering data 

        $task = new Task(); 
        if(!empty($_POST['task'] ))
        {
            $task->__set('task' , $_POST['task']); 
        }
        else
        {
           return header('Location: new_task.php?add=2');
        }

        //creating connection
        $con = new Connection(); 

        $taskService = new TaskService($con, $task);
        $taskService->create();

        header('Location: new_task.php?add=1');
    }
     else if($action == 'read'){
        $task  = new Task();
        $con = new Connection();
        $taskService = new TaskService($con, $task);
        $tasks = $taskService->read();
         
    }else if ($action == 'update'){
        
        $task = new Task();
        $task->__set('id' , $_POST['id']);
        $task->__set('task' , $_POST['task']);
        $con = new Connection();

        $taskService = new taskService($con, $task);
        if( $taskService->update()){
            if(isset($_GET['pag'])&& $_GET['pag'] == 'index')
                header('location: index.php');
            else
                header('location: all_tasks.php');
        }
    }else if($action == 'remove'){
        $task = new Task(); 
        $task->__set('id', $_GET['id']);
        $con = new Connection();
        $taskService = new TaskService($con, $task);
        $taskService->delete();
        echo $_GET['pag'];
        if(isset($_GET['pag']) && $_GET['pag'] == 'index')
            header('location: index.php');
        else 
            header('location: all_tasks.php');
    }else if ($action == 'check'){
        $task = new Task(); 
        $task->__set('id' ,$_GET['id']  );
        $task->__set('id_status' , 2);

        echo $task->__get('id');
        echo '<br>'; 
        echo $task->__get('id_status');
        $con = new Connection(); 

        $taskService = new TaskService($con, $task); 
        $taskService->check();

        if(isset($_GET['pag'])&& $_GET['pag'] == 'index')
            header('location: index.php');
        else
            header('location: all_tasks.php');
    }