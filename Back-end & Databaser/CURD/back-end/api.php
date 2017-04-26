<?php

// Include database class
include_once 'database.php';

// retrieve the request method
$method = $_SERVER['REQUEST_METHOD'];
// retrieve and put params in array
$request = $_SERVER['PATH_INFO'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

// Request sampel
// localhost/api.php/{id}/{value}/{check}/{date}

// // Split params into variables for better read
$id = ($request[0] == 'all' ? 'all' : (int)$request[0]);
$value = $request[1];
$check = $request[2];
$date = $request[3];

// // New database connection
$db = new TodoDatabase();

// Request depending on http method and params
switch ($method) {
    case 'GET':
        // Get data
        // sql query from params ('all' for all data from database) else id
        if ($id === 'all') {
            $sql = "SELECT todo.id, todo.value, todo.check, user.date FROM todo join user on todo.id=user.todo_fk;";
        } else if ($id > 0) {
            $sql = 'select * from todo where id = ' . $id;
        }
            $result = $db->connect($sql);
        // convert to json
        echo json_encode($result);
        break;

    case 'POST':
        // Insert data
        // sql query from params
        $valueString = "'$value', $check";
        $sql = "INSERT INTO `todo`(`value`, `check`) VALUES ('$value', false); INSERT INTO `user`(`date`, `todo_fk`) VALUES ('$date', LAST_INSERT_ID());";
        $db->connect($sql);
        break;

    case 'PUT':
        // Update data
        // sql query from params
        $sql = "UPDATE `todo` SET `value`='$value',`check`=$check WHERE id = $id";
        $db->connect($sql);
        break;

    case 'DELETE':
        // Delete data
        // sql query from params, ('all' as id to delete all database rows) else delete from id param
        if ($id == 'all') {
           $sql = "CALL deleteAll()";
        }  else {
            $sql = "DELETE FROM `user` WHERE todo_fk = $id; DELETE FROM `todo` WHERE id = $id;";
        }
        $db->connect($sql);
        break;
}

?>