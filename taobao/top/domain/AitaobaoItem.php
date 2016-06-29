<?php

/**
 * 爱淘宝商品
 * @author auto create
 */
class AitaobaoItem
{
	
	/** 
	 * 推广点击url
	 **/
	public $click_url;
	
	/** 
	 * 淘宝客佣金
	 **/
	public $commission;
	
	/** 
	 * 累计成交量.注：返回的数据是30天内累计推广量
	 **/
	public $commission_num;
	
	/** 
	 * 淘宝客佣金比率，比如：1234.00代表12.34%
	 **/
	public $commission_rate;
	
	/** 
	 * 累计总支出佣金量
	 **/
	public $commission_volume;
	
	/** 
	 * 折扣活动结束时间
	 **/
	public $coupon_end_time;
	
	/** 
	 * 折扣价格
	 **/
	public $coupon_price;
	
	/** 
	 * 折扣比率
	 **/
	public $coupon_rate;
	
	/** 
	 * 折扣活动开始时间
	 **/
	public $coupon_start_time;
	
	/** 
	 * 商品所在地
	 **/
	public $item_location;
	
	/** 
	 * 卖家昵称
	 **/
	public $nick;
	
	/** 
	 * 淘宝客商品数字id
	 **/
	public $num_iid;
	
	/** 
	 * 开放商品id
	 **/
	public $open_iid;
	
	/** 
	 * 图片url
	 **/
	public $pic_url;
	
	/** 
	 * 商品价格
	 **/
	public $price;
	
	/** 
	 * 促销价格
	 **/
	public $promotion_price;
	
	/** 
	 * 卖家信用等级
	 **/
	public $seller_credit_score;
	
	/** 
	 * 卖家id
	 **/
	public $seller_id;
	
	/** 
	 * 店铺类型:B(商城),C(集市)
	 **/
	public $shop_type;
	
	/** 
	 * 商品title 宝贝名称
	 **/
	public $title;
	
	/** 
	 * 30天内交易量
	 **/
	public $volume;	
}
?>