<?php 

set_time_limit(0);
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');
$conn = mysqli_connect('localhost', 'root', '', 'product');
mysqli_query($conn, 'set names utf8');

    $client = new TopClient("23284822","974c065ada3e6f0851a12a10c66dedc9");
    $req = new ItempropvaluesGetRequest();
    $req->setFields("cid,pid,prop_name,vid,name,name_alias,status,sort_order"); 
	$req->setCid(120878006);
	$req->setPvs(142134247);
	$cat1 = $client->execute($req);
	// var_dump($cat1->prop_values->prop_value);die;
	foreach($cat1->prop_values->prop_value as $k=>$v) {
		   // var_dump($v);die;
		   $status = $v->status  == 'normal'?1:0;
		   $log = mysqli_query($conn, "INSERT INTO category_property_value (vid,pid,cid,property_name,name,name_alias,status,sort_order) VALUES ('$v->vid','$v->pid','$v->cid','$v->prop_name','$v->name','$v->name_alias','$status','$v->sort_order')");
		   if(!$log) {
			   file_put_contents('./log.log', var_export($v)."\n", FILE_APPEND);
		   }
	}
	
?>