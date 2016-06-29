<?php

/**
 * 系统自动生成
 * @author auto create
 */
class Itemlist
{
	
	/** 
	 * 商品ID
	 **/
	public $auction_id;
	
	/** 
	 * 商品主图
	 **/
	public $pic_url;
	
	/** 
	 * 商品价格,元为单位,精确到分
	 **/
	public $price;
	
	/** 
	 * 商品池对应的规则的ID
	 **/
	public $rule_id;
	
	/** 
	 * 卖家ID
	 **/
	public $seller_id;
	
	/** 
	 * 卖家昵称
	 **/
	public $seller_nick;
	
	/** 
	 * 店铺类型,0淘宝店铺,1天猫店铺
	 **/
	public $shop_type;
	
	/** 
	 * 商品标题
	 **/
	public $title;
	
	/** 
	 * 是否是淘客商品,0不是,1是
	 **/
	public $tk_item;	
}
?>