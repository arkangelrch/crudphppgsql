<?php
require_once("Database.php");
	//insertamos usuarios en una tabla con postgreSql
	function save($obj){
		try{
			$conn = conectardb();
			$query = "INSERT INTO users (username, password, created_at) values ('".$obj->username."','".$obj->password."',NOW())";
			$save = pg_query($query) or die('Error: ' . pg_last_error());
			pg_close($conn);
			header("Location: list.php");
		}catch(PDOException $e){
			echo  $e->getMessage();
		}
	}

	function update($obj){
		try{
			$conn = conectardb();
			$query = "UPDATE users SET username='".$obj->username."', password='".$obj->password."' WHERE id='".$obj->id."'";
			$update = pg_query($query) or die('Error: ' . pg_last_error());
			pg_close($conn);
			header("Location: list.php");
		}catch(PDOException $e){
	        	echo  $e->getMessage();
	    	}
	}

	//obtenemos usuarios de una tabla con postgreSql
	function get($id=''){
		try{
			$conn = conectardb();
			if(is_int($id)){
				$query = 'SELECT * FROM users where id = '.$id;
				$listar = pg_query($query) or die('Error: ' . pg_last_error());
				$row = pg_fetch_assoc($listar);
				pg_close($conn);
    				return json_encode($row);
			}else{
				$query = 'SELECT * FROM users';
				$listar = pg_query($query) or die('Error: ' . pg_last_error());
				$resutado = array();
				while ($row = pg_fetch_assoc($listar)) {
					$resutado[] = $row;
				}
				pg_close($conn);
    				return json_encode($resutado);
            		}
		}catch(PDOException $e){
	        	echo  $e->getMessage();
	    	}
	}

	function delete($id){
		try{
			$conn = conectardb();
			$query = "DELETE FROM users WHERE id = '".$id."'";
			$delete = pg_query($query) or die('Error: ' . pg_last_error());
			pg_close($conn);
			header("Location: list.php");
		}catch(PDOException $e){
			echo  $e->getMessage();
		}
	}

	/*
	function baseurl(){
		return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'];
	}
	*/
	
	function checkUser($user){
		if( ! $user ){
			header("Location: list.php");
		}
	}

