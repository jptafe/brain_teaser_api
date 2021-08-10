<?php

    // we need some setup lines here:
    $dbURI = 'mysql:host=127.0.0.1;port=3306;dbname=todoapp';   
    $dbconn = new PDO($dbURI, 'databaseuser', 'somesecurepassword');
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    switch($_GET['page']) {
        case 'insert':
            if (db_insert($_POST['username'], $_POST['password']) == true) {
                http_response_code(201);
            } else {
                http_response_code(400);
            }
            break;
        case 'update':
            if (db_update($_POST['id'], $_POST['username'], $_POST['password']) == true) {
                http_response_code(201);
            } else {
                http_response_code(400);
            }            
            break;
        case 'delete':
            if (db_delete($_GET['id']) == true) {
                http_response_code(202);
            } else {
                http_response_code(400);
            }               
            break;
        case 'select':
            $res = db_select_one($_GET['id']);
            if (is_array($res)) {
                http_response_code(200);
                echo json_encode($res);
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

    function db_insert ($u, $p) {
        global $dbconn;
        $sql = "INSERT INTO todouser (user_name, user_email, user_surname, user_password, user_picture, user_role) 
                VALUES (:un, 'email@email.com', :un, :pass, 'defaultpic.jpg', 'user')";
        $stmt = $dbconn->prepare($sql);
        $stmt->bindParam(':un', $u, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $p, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 1) { 
            return true;
        }
        return false;
    }

    function db_update ($id, $u, $p) {
        global $dbconn;
        $sql = "UPDATE todouser 
            SET user_name = :u, user_password = :pass WHERE id = :id";
        $stmt = $dbconn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':u', $u, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $p, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 1) { 
            return true;
        }
        return false;
    }

    function db_delete ($id) {
        global $dbconn;
        $sql = "DELETE FROM todouser WHERE id = :id";
        $stmt = $dbconn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) { 
            return true;  
        }
        return false;
    }

    function db_select_one ($id) {
        global $dbconn;
        $sql = "SELECT * FROM todouser WHERE id = :id";
        $stmt = $dbconn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) { 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function db_select_all () {
        global $dbconn;
        $sql = "SELECT * FROM todouser";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
?>