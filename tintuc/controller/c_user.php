<?php
session_start();
include('model/m_user.php');
class c_user{
	function dangkiTK($name,$email,$password){
		$m_user = new m_user();
		$id_user = $m_user->dangki($name,$email,$password);
		if($id_user > 0){
			$_SESSION['success'] = "Đăng kí thành công";
			echo "<script>alert('Đăng ký thành công ! ');location.href='dangki.php'</script>";
			if(isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
		}else{
			$_SESSION['error'] = "Đăng kí không thành công";
			echo "<script>alert('Đăng ký thất bại! Vui lòng kiểm tra lại! ');location.href='dangki.php'</script>";
		}
	}
}
?>