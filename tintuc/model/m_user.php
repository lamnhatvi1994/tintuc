<?php
include('database.php');
 
class m_user extends database{	
	
	function dangki($name, $email, $password){
		$sql = "INSERT INTO users(name,email,password) VALUES (?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($name,$email,md5($password)));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
	
}
?>