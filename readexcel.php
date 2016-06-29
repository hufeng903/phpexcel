<?php
 /** 引入需要的类库*/
require_once 'Classes\phpexcel.php'; 
require_once 'Classes\PHPExcel\IOFactory.php';
require_once 'Classes\PHPExcel\Reader\Excel5.php'; 
// require_once 'connect.php';

 //数据库连接

 $link = mysqli_connect('localhost','hu','123456','product');
 if(!$link){
	 echo "数据库连接失败"; 
	 exit;
 }
 
//读excel表中内容生成对应数组
$objReader = PHPExcel_IOFactory::createReader('CSV');
$objPHPExcel = $objReader->load('categoryProp.csv'); 
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); // 取得总行数 
$highestColumn = $sheet->getHighestColumn(); // 取得总列数
// var_dump($highestColumn);die;
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
// print_r($arr_result); die;
foreach($arr_result as $item){
@	$strs.=$item.',';
} 

for($j=2;$j<=$highestRow;$j++)
{
$a = cid $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
$b = pid $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
$c = name $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
$d = required $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
$e = is_key_prop $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
$f = is_sale_prop $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
$g = is_color_prop $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();
$h = child_template $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();
$i = parent_pid $objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();
$j = parent_vid $objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();
$k = sort_order $objPHPExcel->getActiveSheet()->getCell("K".$j)->getValue();
$l = is_allow_alias $objPHPExcel->getActiveSheet()->getCell("L".$j)->getValue();
$m = type $objPHPExcel->getActiveSheet()->getCell("M".$j)->getValue();
$sql = "INSERT INTO `category_prop`(`pid`, `cid`, `parent_vid`, `parent_pid`, `name`, `is_key_property`,`is_color_property`,`is_sale_property`,
`is_input_property`,`multi`,`must`,`sort_order`,`status`,`is_enum_prop`,`is_item_prop`,`child_path`,`features`) 
VALUES ('".$b."','".$a."','".$j."','".$i."','".$c."','".$e."','".$g."','".$f."','0','".$e."')";
var_dump($sql);
// mysqli_query($link,$sql);
// mysqli_query($link,'set names utf-8');
if(mysqli_query($link,$sql)){
	echo "导入数据成功";
}
else{
	echo "导入数据失败";
	echo mysqli_errno($link);
}

}

?>