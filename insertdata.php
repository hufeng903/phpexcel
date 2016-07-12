<?php
 /** 引入需要的类库*/
require_once 'Classes\phpexcel.php'; 
require_once 'Classes\PHPExcel\IOFactory.php';
require_once 'Classes\PHPExcel\Reader\Excel5.php'; 

//数据库连接
 $link = mysqli_connect('localhost','root','','test');
 if(!$link){
	 echo "数据库连接失败"; 
	 exit;
 }
 
//读excel表中内容生成对应数组
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load('1.xlsx'); 

//读取csv文档内容
// $objReader = new PHPExcel_Reader_CSV();
// $objPHPExcel = $objReader->load('D.csv'); 

$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); // 取得总行数 
$highestColumn = $sheet->getHighestColumn(); // 取得总列数

//获取文档中的值，存入数组中
$arr_result=array();
for($j=1;$j<=$highestRow;$j++)
 { 
    for($k='A';$k<= $highestColumn;$k++)
    { 
     //读取单元格
     array_push($arr_result,($objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue()));
    }
 }
 
//数组转换成字符串，方便直接插入数据库中
$str = '';
 foreach($arr_result as $item){
	$strs.=$item.',';
} 

for($j=2;$j<=$highestRow;$j++)
{
	$a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
	$b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
	$c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
	$d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
	// $e = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
	// $f = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
	$sql = "INSERT INTO `test`(`Id`, `price`, `stock`, `num`) VALUES ('".$a."','".$b."','".$c."','".$d."')";

	// mysqli_query($link,$sql);
	// mysqli_query($link,'set names utf-8');
	if(mysqli_query($link,$sql)){
		echo 1;
	}
	else{
		echo "导入数据失败";
		echo mysqli_errno($link);
	}

}

?>