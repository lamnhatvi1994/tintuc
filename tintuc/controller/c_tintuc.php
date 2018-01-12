<?php
include ('model/m_tintuc.php');
include('model/pager.php');
class c_tintuc{
	function index(){
		$m_tintuc = new m_tintuc();
		$slide = $m_tintuc->getSlide();
		$menu = $m_tintuc->getMenu();
		return array('slide'=>$slide, 'menu'=>$menu);
	}
	
	function loaitin(){
		$id_loai = $_GET['id_loai'];
		$m_tintuc = new m_tintuc();
		$alias = $m_tintuc->getAliasLoaiTin($id_loai);
		$danhmuctin = $m_tintuc->getTinTucByIdLoaiTin($id_loai);
		$trang_hientai = (isset($_GET['page']))?($_GET['page']):1;
		$pagination = new pagination(count($danhmuctin), $trang_hientai, 4, 2);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$vitri = ($trang_hientai-1)*$limit;
		$danhmuctin = $m_tintuc->getTinTucByIdLoaiTin($id_loai, $vitri, $limit);
		$menu = $m_tintuc->getMenu();
		$title = $m_tintuc->getTitleById($id_loai);
		return array('danhmuctin'=>$danhmuctin, 'menu'=>$menu, 'title'=>$title, 'thanh_phantrang'=>$paginationHTML, 'alias'=>$alias);
	}
	
	function chiTietTin(){
		$id_tin = $_GET['id_tin'];
		$alias = $_GET['loai_tin'];
		$m_tintuc = new m_tintuc();
		$chiTietTin = $m_tintuc->getChiTietTin($id_tin);
		$comment = $m_tintuc->getComment($id_tin);
		$relatednews = $m_tintuc->getRelatedNews($alias);
		$tinnoibat = $m_tintuc->getTinNoiBat();
		return array('chiTietTin'=>$chiTietTin, 'comment'=>$comment, 'relatednews'=>$relatednews, 'tinnoibat'=>$tinnoibat);
	}
	

	
	
	
	
}
	
?>