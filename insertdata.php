<?php
 /** 引入需要的类库*/
require_once 'Classes\phpexcel.php'; 
require_once 'Classes\PHPExcel\IOFactory.php';
require_once 'Classes\PHPExcel\Reader\Excel5.php'; 
// require_once 'connect.php';

 //数据库连接

 $link = mysqli_connect('localhost','hu','123456','test');
 if(!$link){
	 echo "数据库连接失败"; 
	 exit;
 }
 
//读excel表中内容生成对应数组
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load('1.xls'); 
// $objReader = new PHPExcel_Reader_CSV();
// $objPHPExcel = $objReader->load('D.csv'); 

$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); // 取得总行数 
$highestColumn = $sheet->getHighestColumn(); // 取得总列数
// var_dump($highestRow);die;
$arr_result=array();

for($j=1;$j<=$highestRow;$j++)
 { 
    // unset($arr_result);
    // unset($strs);
 for($k='A';$k<= $highestColumn;$k++)
    { 
     //读取单元格
     array_push($arr_result,($objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue()));
    }
 }
// print_r($arr_result); 
foreach($arr_result as $item){
@	$strs.=$item.',';
} 

for($j=2;$j<=$highestRow;$j++)
{
$a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
$b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
$c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
$d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
// $e = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
// $f = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
$sql = "INSERT INTO `code`(`exchange_code`, `source_code`, `create_time`, `end_time`) VALUES ('".$a."','".$b."','".$c."','".$d."')";
// $code = "#TM".make_char(6);
// $time = date('m/d/Y H:i:s');
// $end = '06/31/2016 00:00:00';
// $sql = "INSERT INTO `ticket`(`exchange_code`,`source_code`,`create_time`,`end_time`) VALUES ('".$code."','".$a."','".$time."','".$end."')";

// mysqli_query($link,$sql);
// mysqli_query($link,'set names utf-8');
if(mysqli_query($link,$sql)){
	echo 1;
}
else{
	// var_dump($sql);
	echo "导入数据失败";
	echo mysqli_errno($link);
}
// die;

}


function make_char($length){  

// 密码字符集，可任意添加你需要的字符  

$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',  

'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',  

't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',  

'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',  

'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',  

'0', '1', '2', '3', '4', '5', '6', '7', '8', '9');  

// 在 $chars 中随机取 $length 个数组元素键名  

$char_txt = '';  

for($i = 0; $i < $length; $i++){  
   // 将 $length 个数组元素连接成字符串  
   $char_txt .= $chars[array_rand($chars)];  

}
return ($char_txt);
}

?>