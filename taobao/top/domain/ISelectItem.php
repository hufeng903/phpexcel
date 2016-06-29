<?php

/**
 * 选品平台返回的商品基本信息
 * @author auto create
 */
class ISelectItem
{
	
	/** 
	 * 折后价,单位为元,精确到分,没有折扣就和原价相等
	 **/
	public $discount_price;
	
	/** 
	 * 商品混淆id
	 **/
	public $open_iid;
	
	/** 
	 * 商品主图url
	 **/
	public $pic_url;
	
	/** 
	 * 商品多图地址，第一张是主图
	 **/
	public $pics;
	
	/** 
	 * 商品原价,单位为元,精确到分
	 **/
	public $price;
	
	/** 
	 * 商品属性、属性值串，可能为空，格式p:v;p:v
	 **/
	public $properties_and_values;
	
	/** 
	 * 商品的店铺类型，0为淘宝店铺，1为天猫店铺
	 **/
	public $shop_type;
	
	/** 
	 * 选品商品上的标签id
	 **/
	public $tag_id;
	
	/** 
	 * 商品名称
	 **/
	public $title;	
}
?>