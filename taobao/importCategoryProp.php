<?php
/*                            _ooOoo_
 *                           o8888888o
 *                           88" . "88
 *                           (| -_- |)
 *                            O\ = /O
 *                        ____/`---'\____
 *                      .   ' \\| |// `.
 *                       / \\||| : |||// \
 *                     / _||||| -:- |||||- \
 *                       | | \\\ - /// | |
 *                     | \_| ''\---/'' | |
 *                      \ .-\__ `-` ___/-. /
 *                   ___`. .' /--.--\ `. . __
 *                ."" '< `.___\_<|>_/___.' >'"".
 *               | | : `- \`.;`\ _ /`;.`/ - ` : | |
 *                 \ \ `-. \_ __\ /__ _/ .-` / /
 *         ======`-.____`-.___\_____/___.-`____.-'======
 *                            `=---='
 *
 *         .............................................
 *                  佛祖保佑             永无BUG
 *
 * ======================================================
 * @author: Ethan Lu <ethan.lu@qq.com>
 * 
 */


set_time_limit(0);
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai');

$conn = mysqli_connect('localhost', 'root', '', 'shopbox');
mysqli_query($conn, 'set names utf8');
$result = mysqli_query($conn,'SELECT * from category where parent_cid = 124242008');
$result = mysqli_fetch_all($result);

foreach ($result as $item ) {
	$client = new TopClient("23278352","79de3a1285a8d4d623a9e0dbfb33962a");
	$res = new ItempropsGetRequest();
	$res->setCid($item['0']);
	$res->setFields('pid,parent_pid,parent_vid,name,is_key_prop,is_sale_prop,is_color_prop,is_enum_prop,is_item_prop,must,multi,prop_values,status,sort_order,child_template,is_allow_alias,is_input_prop,features');
	$cat = $client->execute($res);
	// print_r((array)($cat)); die;
	insert_categoryProp($cat,$conn,$client,$res,$item['0']);
}

function insert_categoryProp($cat, $link, $client, $res,$cid)
	{
	   // $ignore = [
		   // 50024451,50020611,121536003,121536007,50008075,50024971,50454031,50011665,50602001,50019095,121940001,40,124116010,50023724,50025004,120894001,50019379,50008907,121266001,124466001,121938001,124050001,50014811,50016350,99,122918002,50017652,50016891,123536002,50012029,50025618,50025111,121380001,124698018,50024612,124624003,50158001,50734010,124110010,124750013,124024001,50023878,50018252,124568010,50014927,50690010,50004958,123500005,50014442,50025707,50025968,124470001,120950001,120886001,50230002,120950002,124470006,50020857,50024186
	   // ];
	   $data = $cat->item_props->item_prop;
	   // print_r($data->pid);die;
	   foreach($data as $k => $v) {
		   // $status = $v->status =='normal'?1:0;
		   // if(in_array($v->cid, $ignore)) {
			   // $status = 2;
		   // }
		  // var_dump($v);die;
		   $is_key_property = $v->is_key_prop == 'true'?1:0;
		   $is_color_property = $v->is_color_prop == 'true'?1:0;
		   $is_sale_property = $v->is_sale_proper == 'true'?1:0;
		   $is_input_property = $v->is_input_prop  == 'true'?1:0;
		   $multi = $v->multi  == 'true'?1:0;
		   $must = $v->must  == 'true'?1:0;
		   $status = $v->status  == 'normal'?1:0;
		   $is_enum_prop = $v->is_enum_prop  == 'true'?1:0;
		   $is_item_prop = $v->is_item_prop  == 'true'?1:0;
		   // $log = mysqli_query($link, "INSERT INTO category_property (cid,pid,parent_pid,parent_vid,name,is_key_property,is_color_property,is_sale_property,is_input_property,sort_order,status,must,is_enum_prop,is_item_prop,multi)
		   // VALUES ('$cid','$v->pid','$v->parent_pid','$v->parent_vid','$v->name','$is_key_property','$is_color_property','$is_sale_property','$is_input_property','$v->sort_order','$status','$must','$is_enum_prop','$is_item_prop','$multi')");
		   // if(!$log) {
			   // file_put_contents('./log.log', var_export($v)."\n", FILE_APPEND);
		   // }
		    insert_categoryPropValue($cid,$v->pid);
	//       if($is_parent && !in_array($v->cid, $ignore)) {
	//           $res->setParentCid($v->cid);
	//           insert_category($client->execute($res), $link, $client, $res);
	//       }
	   }
	}

//插入到属性值表	
function insert_categoryPropValue($cid,$pid)
{
	// echo $cid;die;
	// set_time_limit(0);
date_default_timezone_set('Asia/Shanghai');
$conn = mysqli_connect('localhost', 'root', '', 'shopbox');
mysqli_query($conn, 'set names utf8');
    // echo $pid;die;
    $client = new TopClient("23284822","974c065ada3e6f0851a12a10c66dedc9");
    $req = new ItempropvaluesGetRequest();
    $req->setFields("cid,pid,prop_name,vid,name,name_alias,status,sort_order"); 
	$req->setCid(124708025);
	$req->setPvs(20000);
	$cat1 = $client->execute($req);
	// var_dump($cat1->prop_values->prop_value);die;
	foreach($cat1->prop_values->prop_value as $k=>$v) {
		   var_dump($v);die;
		   $status = $v->status  == 'normal'?1:0;
		   $log = mysqli_query($conn, "INSERT INTO category_property_value (vid,pid,cid,property_name,name,name_alias,status,sort_order) VALUES ('$v->vid','$v->pid','$v->cid','$v->prop_name','$v->name','$v->name_alias','$status','$v->sort_order')");
		   if(!$log) {
			   file_put_contents('./log.log', var_export($v)."\n", FILE_APPEND);
		   }
	}
}	