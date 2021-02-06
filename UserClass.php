<?php

require 'includes/DB.php';
class userClass
{
    public function userLogin($usernameEmail, $password)
    {
        try {
            $cnn = new ConnMySql();
            $con = $cnn->getConexion();
            $hash_password = hash('sha256', $password); //Password encryption
            $query = "SELECT uid FROM users WHERE  email = '$usernameEmail' and password = '$hash_password'";
            $resultado = mysql_query($query);
            $numero_filas = mysql_num_rows($resultado);
            $data = mysql_free_result($resultado);
            if ($numero_filas) {
                $_SESSION['uid'] = $data->uid; // Storing user session value
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    /* User Registration */
    public function userRegistration($username, $password, $email, $name)
    {
        try {
            $cnn = new ConnMySql();
            $con = $cnn->getConexion();
            $query = "SELECT uid FROM users WHERE  email = '$email'";
            $resultado = mysql_query($query);
            $hash_password = hash('sha256', $password);
            $count = mysql_num_rows($resultado);


            if ($count == 0) {
                $query1 = "INSERT INTO users(name, username, email, password) 
				VALUES('$name', '$username', '$email', '$hash_password');";

                mysql_query($query1);

                $query2 = "SELECT uid FROM users WHERE  email = '$email'";
                $resultado2 = mysql_query($query2);
                $data1 = mysql_free_result($resultado2);


                $uid = $data1->uid;
                $_SESSION['uid'] = $uid;
                return true;
            } else {
                $cnn->Close();
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}
