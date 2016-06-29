<?php

/**
 * 爱淘宝商品详情
 * @author auto create
 */
class AitaobaoItemDetail
{
	
	/** 
	 * 商品详细信息. fields中需要设置Item下的字段,如设置:iid,detail_url等; 只设置item_detail,则不返回的Item下的所有信息.
	 **/
	public $item;
	
	/** 
	 * 商品所属卖家的信用等级
	 **/
	public $seller_credit_score;	
}
?>