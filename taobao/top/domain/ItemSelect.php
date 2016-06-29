<?php

/**
 * 商品选品数据结构
 * @author auto create
 */
class ItemSelect
{
	
	/** 
	 * 商品类目名称
	 **/
	public $category_name;
	
	/** 
	 * 后台类目id
	 **/
	public $cid;
	
	/** 
	 * 商品的最近修改时间。格式为yyyymmddhhmmss
	 **/
	public $last_modified;
	
	/** 
	 * 商品id。字段已经废弃，请使用open_iid
	 **/
	public $num_iid;
	
	/** 
	 * 混淆的商品id
	 **/
	public $open_iid;
	
	/** 
	 * 商家ERP商品ID
	 **/
	public $outer_id;
	
	/** 
	 * 商品主图
	 **/
	public $pict_url;
	
	/** 
	 * 商品价格(元)
	 **/
	public $price;
	
	/** 
	 * 选品输出结果中包含ｓｋｕ信息
	 **/
	public $skus;
	
	/** 
	 * 标题
	 **/
	public $title;
	
	/** 
	 * 0为C店；1为B店
	 **/
	public $user_type;	
}
?>