<?php
include ('database.php');
class m_tintuc extends database{
	function getSlide(){
		$sql = "select* from slide";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	function getMenu(){
		$sql = "SELECT tl.*, GROUP_CONCAT(DISTINCT lt.Id,':', lt.Ten,':', lt.TenKhongDau) AS LoaiTin, tt.id AS idTin, tt.TieuDe AS TieuDeTin, tt.Hinh AS HinhTin, tt.TomTat AS TomTatTin, tt.TieuDeKhongDau AS TieuDeKhongDauTin FROM theloai tl INNER JOIN loaitin lt ON tl.id = lt.idTheLoai INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id GROUP BY tl.Id";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	function getTinTucByIdLoaiTin($id_loaitin, $vitri=-1, $limit=-1){
		$sql = "SELECT* FROM tintuc WHERE idLoaiTin = $id_loaitin";
		if($vitri>-1 && $limit>1){
			$sql .= " LIMIT $vitri,$limit";
		}
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_loaitin));
	}
	
	function getTitleById($id_loaitin){
		$sql = "SELECT Ten FROM loaitin WHERE id = $id_loaitin";
		$this->setQuery($sql);
		return $this->loadRow(array($id_loaitin));
	}
	
	function getChiTietTin($id){
		$sql = "SELECT * FROM tintuc WHERE id = $id";
		$this->setQuery($sql);
		return $this->loadRow(array($id));
	}
	
	function getComment($id_tin){
		$sql = "SELECT * FROM comment WHERE idTinTuc = $id_tin";
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_tin));
	}
	
	function getRelatedNews($alias){
		$sql = "SELECT tt.*, lt.TenKhongDau AS TenKhongDau, lt.id AS idLoaiTIn FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE lt.TenKhongDau = '$alias' LIMIT 0,5";
		$this->setQuery($sql);
		return $this->loadAllRows(array($alias));
	}
	
	function getAliasLoaiTin($id_loaitin){
		$sql = "SELECT TenKhongDau FROM loaitin WHERE id = $id_loaitin";
		$this->setQuery($sql);
		return $this->loadRow(array($id_loaitin));
	}
	
	function getTinNoiBat(){
		$sql = "SELECT tt.*, lt.TenKhongDau AS TenKhongDau, lt.id AS idLoaiTIn FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE tt.NoiBat = 1 LIMIT 0,5";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	
}

	
?>
