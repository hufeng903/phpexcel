<?php
    set_time_limit(0);
	include "TopSdk.php";
	date_default_timezone_set('Asia/Shanghai');

    $conn = mysqli_connect('localhost', 'root', '123456', 'product');
    mysqli_query($conn, 'set names utf8');


	$client = new TopClient("23278352","79de3a1285a8d4d623a9e0dbfb33962a");

	$res = new ItemcatsGetRequest();
    $res->setParentCid(0);
    $res->setFields('cid,parent_cid,name,is_parent,status,sort_order,features');
    $cat = $client->execute($res);

    insert_category($cat, $conn, $client, $res);



    function insert_category($cat, $link, $client, $res)
    {
        $ignore = [
            50024451,50020611,121536003,121536007,50008075,50024971,50454031,50011665,50602001,50019095,121940001,40,124116010,50023724,50025004,120894001,50019379,50008907,121266001,124466001,121938001,124050001,50014811,50016350,99,122918002,50017652,50016891,123536002,50012029,50025618,50025111,121380001,124698018,50024612,124624003,50158001,50734010,124110010,124750013,124024001,50023878,50018252,124568010,50014927,50690010,50004958,123500005,50014442,50025707,50025968,124470001,120950001,120886001,50230002,120950002,124470006,50020857,50024186
        ];
        $data = $cat->item_cats->item_cat;
        foreach($data as $k => $v) {
            $status = $v->status =='normal'?1:0;
            if(in_array($v->cid, $ignore)) {
                $status = 2;
            }
            $is_parent = $v->is_parent == 'true'?1:0;
            $log = mysqli_query($link, "INSERT INTO category (cid,parent_cid,name,sort_order,is_parent,status,features) VALUES ('$v->cid','$v->parent_cid','$v->name',$v->sort_order,$is_parent,$status, '$v->features')");
            if(!$log) {
                file_put_contents('./log.log', var_export($v)."\n", FILE_APPEND);
            }

            if($is_parent && !in_array($v->cid, $ignore)) {
                $res->setParentCid($v->cid);
                insert_category($client->execute($res), $link, $client, $res);
            }
        }
    }

?>