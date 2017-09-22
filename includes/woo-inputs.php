<?php
namespace DTools;

if( ! class_exists('DTools\WCProductSettings') )
	return;

$options = DevelopersTools::$settings;
$wc_fields = new WCProductSettings();

if( isset($options['wholesales']) ){
	function wholesales_min( $var, $product ){
		if( $var != 1 )
			return $var;

		if( method_exists($product, 'get_meta') ){
			$from = $product->get_meta('wholesale_from');
			$def = $product->get_min_purchase_quantity();
		} else {
			$_post = get_post($product->id);
			if( isset($_post->ID) && $_post->ID > 1 )
				$from = get_post_meta( $_post->ID, 'wholesale_from', true );
			$def = 1;
		}

		if( $from > 1 )
			return $from;

		return $def;
	}
	if( is_admin() ){
		$wc_fields->add_field( array(
			'type'        => 'number',
			'id'          => 'wholesale_from',
			'label'       => 'Опт от:',
			'desc_tip'    => 'true',
			'description' => 'Разрешить продажи от этого количества',
		) );
	}

	add_filter( 'woocommerce_quantity_input_min', 'DTools\wholesales_min', 50, 2 );
}

if( isset($options['product-val']) ){
	$wc_fields->add_field(array(
		'type'        => 'text',
		'id'          => 'pr_value',
		'label'       => 'Ед. измерения',
		'desc_tip'    => 'true',
		'placeholder' => 'К примеру: "шт."',
		'description' => 'На сайте это будет отображаться примерно как "Цена ## руб. / шт."',
		) );

	add_filter( 'woocommerce_sale_price_html', 'DTools\dt_add_price_value', 10, 2 );
	add_filter( 'woocommerce_price_html', 'DTools\dt_add_price_value', 10, 2 );
	add_filter( 'woocommerce_variable_sale_price_html', 'DTools\dt_add_price_value', 10, 2 );
	add_filter( 'woocommerce_variable_price_html', 'DTools\dt_add_price_value', 10, 2 );

	function dt_add_price_value( $price, $product ) {
		$affix = sanitize_text_field( $product->get_meta('pr_value') );
		if($affix)
			$price.= '/' . $affix;
		return $price;
	}
}

$wc_fields->set_fields();
