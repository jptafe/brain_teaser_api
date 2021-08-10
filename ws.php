<?php

    // we need some setup lines here:
    $dbURI = 'mysql:host=127.0.0.1;port=3306;dbname=todoapp';
    $dbconn = new PDO($dbURI, 'databaseuser', 'somesecurepassword');

    switch($_GET['page']) {
        case 'insert':
            // check to see if its a post, send all post data to a db function()
            if (db_insert() == true) {
                http_response_code(201);
            } else {
                http_response_code(400);
            }
            break;
        case 'update':
            // check to see if its a post, send all post data to a db function()
            if (db_update() == true) {
                http_response_code(201);
            } else {
                http_response_code(400);
            }            
            break;
        case 'delete':
            // check to see if row id is in the request send id to db functiohn()
            if (db_delete() == true) {
                http_response_code(202);
            } else {
                http_response_code(400);
            }               
            break;
        case 'select':
            // check to see if row id is in the request send id to db functiohn()
            if (db_select_one() == true) {
                http_response_code(200);
                echo json_encode(Array('msg'=>'roger select red leader'));
            } else {
                http_response_code(400);
            }               
            break;
        case 'selectall':
            $res = db_select_all();
            if (is_array($res)) {
                http_response_code(200);
                echo json_encode($res);
            } else {
                http_response_code(404);
            }               
            break;
        default:
            http_response_code(501);
            echo json_encode(Array('msg'=>'you gone done wrong'));
            break;
    }

    function db_insert($u, $p) {
        $sql = "INSERT INTO todouser (user_name, `user_email`, `user_password`, `user_picture`, `user_role`) 
                VALUES (:un, 'email@email.com', :pass, 'defaultpic.jpg', 'user');";
        return false;
    }

    function db_update($id, $u, $p) {
        $sql = "UPDATE todouser SET user_name = :u, user_password = :pass WHERE id = :id";
        return false;
    }

    function db_delete($id) {
        $sql = "DELETE FROM todouser WHERE id = :id";
        return false;
    }

    function db_select_one($id) {
        $sql = "SELECT * FROM todouser WHERE id = :id";
        return false;
    }

    function db_select_all() {
        global $dbconn;
        $sql = "SELECT * FROM todouser";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
?>