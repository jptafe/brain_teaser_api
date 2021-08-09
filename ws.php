<?php
    switch($_GET['page']) {
        case 'insert':
            http_response_code(201);
            echo 'roger insert red leader';
            break;
        case 'update':
            http_response_code(202);
            echo 'roger update red leader';
            break;
        case 'delete':
            http_response_code(202);
            echo 'roger delete red leader';
            break;
        case 'select':
            http_response_code(200);
            echo 'roger select red leader';
            break;
        case 'selectall':
            http_response_code(200);
            echo 'roger selectall red leader';
            break;
        default:
            http_response_code(501);
            echo 'you\'re breaking up red leader';
            break;
    }
?>