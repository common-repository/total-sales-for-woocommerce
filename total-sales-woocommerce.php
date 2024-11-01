<?php
/**
 * Plugin Name: Total Sales For Woocommerce
 * Plugin URI: https://troplr.com/
 * Description: Show total sales for each woocommerce products.
 * Version: 1.1
 * Author: Troplr
 * Author URI: https://troplr.com
 * Requires at least: 4.5
 * Tested up to: 4.7.x
 * Tags: slideshow,slider,gallery,posts,pages
 *
 * Text Domain: troplr
 *
 */

require_once('titan-framework/titan-framework-embedder.php');




add_action( 'tf_create_options', 'tsw_opt' );
function tsw_opt() {
// Initialize Titan & options here

 $titan = TitanFramework::getInstance( 'tsw-opt' );

 $generalTab = $titan->createAdminPanel( array(
'name' => 'Total Sales Woocmmerce',
) );

 $generalTab->createOption( array(
'name' => 'Show total sales on shop/category pages',
'id' => 'total_sales_is_enabled',
'type' => 'enable',
'desc' => 'Enabling this will show total sales on product pages',
) );

$generalTab->createOption(  array(
'name' => 'Total Sales Text',
'id' => 'total_text',
'type' => 'text',
'desc' => 'E.g: <b>Units Sold</b>'
) );

$generalTab->createOption(  array(
'name' => 'Total Sales Text Styles for single product pages',
'id' => 'total_text_styles',
'type' => 'font',
'desc' => 'Select a style',
'show_font_weight' => true,
'show_font_style' => true,
'show_line_height' => false,
'show_letter_spacing' => false,
'show_text_transform' => false,
'show_font_variant' => false,
'show_text_shadow' => false,
'default' => array(
'font-family' => 'Exo 2',
'color' => '#888888',
'line-height' => '1em',
'font-weight' => '700',
)
) );


$generalTab->createOption( array(
'name' => 'Show total sales on shop/category pages',
'id' => 'total_is_enabled',
'type' => 'enable',
'desc' => 'Enabling this will show total sales on shop/category loop pages',
) );


$generalTab->createOption(  array(
'name' => 'Total Sales Text Styles for shop,category pages',
'id' => 'total_text_styles_loop',
'type' => 'font',
'desc' => 'Select a style',
'show_font_weight' => true,
'show_font_style' => true,
'show_line_height' => false,
'show_letter_spacing' => false,
'show_text_transform' => false,
'show_font_variant' => false,
'show_text_shadow' => false,
'default' => array(
'font-family' => 'Exo 2',
'color' => '#888888',
'line-height' => '1em',
'font-weight' => '700',
)
) );


$generalTab->createOption( array(
'type' => 'save'
) );

$generalTab->createOption( array(
'name' => '',
'id' => 'tswpay',
'type' => 'note',
'desc' => 'Thankyou for using <b>Total Sales For woocommerce</b>.<br>You may want to support my development: <a target="_blank" href="https://paypal.me/sandeeptete">Paypal me a tip</a>'
) );

$generalTab->createOption(  array(
'name' => '',
'id' => 'tsw_message_grid',
'type' => 'note',
'desc' => 'You may find other plugins from us to be useful below.<br><div class="autowide">
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/categories-gallery/">Bootstrap Categories Gallery</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-scroll-bar-designer/">Custom Scrollbar Designer</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-text-selection-colors/">Custom Text Selection Colors</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/disable-image-right-click/">Disable Image Right Click</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/easy-gallery-slideshow/">Easy Gallery Slideshow</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/exit-popup-show/">Exit Popup Show</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/popup-modal-for-youtube/">Popup Modal For Youtube</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/woo-availability-date/">Product Limited Time Availability Date for woocommerce</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/email-my-posts/">Share Posts To Email</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-scroll-bar-designer/">Share Woocommerce to Email</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/share-woocommerce-email/">Custom Scrollbar Designer</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/total-sales-for-woocommerce/">Total Sales For Woocommerce</a></b></p>
  </div>
</div>'
) );
}

function tsw_customcss()
{
  $tswcss = '<style>.autowide {
  margin: 0 auto;
  width: 98%;
}
.autowide img {
  float: left;
  margin: 0 .75rem 0 0;
}
.autowide .module {
  xbackground-color: lightgrey;
  border-radius: .25rem;
  margin-bottom: 1rem;
  color: #0f8cbb;
}
.autowide .module p {
  padding: 4px 0px;
}

/* 2 columns: 600px */
@media only screen and (min-width: 600px) {
  .autowide .module {
    float: left;
    margin-right: 2.564102564102564%;
    width: 48.717948717948715%;
  }
  .autowide .module:nth-child(2n+0) {
    margin-right: 0;
  }
}

/* 3 columns: 768px */
@media only screen and (min-width: 768px) {
  .autowide .module {
    width: 31.623931623931625%;
  }
  .autowide .module:nth-child(2n+0) {
    margin-right: 2.564102564102564%;
  }
  .autowide .module:nth-child(3n+0) {
    margin-right: 0;
  }
}

/* 4 columns: 992px and up */
@media only screen and (min-width: 992px) {
  .autowide .module {
    width: 23.076923076923077%;
  }
  .autowide .module:nth-child(3n+0) {
    margin-right: 2.564102564102564%;
  }
  .autowide .module:nth-child(4n+0) {
    margin-right: 0;
  }
}</style>';
echo $tswcss;

}
add_action('admin_head','tsw_customcss');

function tsw_text_style()
{
  if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'tsw-opt' );
    $total_text_styles = $titan->getOption( 'total_text_styles');
    $total_text_styles_loop = $titan->getOption( 'total_text_styles_loop');

  ?>
  <style type="text/css">
    .total{
      font-family: <?php echo $total_text_styles['font-family'];?>;
      color:<?php echo $total_text_styles['color'];?>;
      font-weight: <?php echo $total_text_styles['font-weight'];?>;
      font-style: <?php echo $total_text_styles['font-style'];?>;
      font-size: <?php echo $total_text_styles['font-size'];?>;
    }
    .total-loop{
      font-family: <?php echo $total_text_styles_loop['font-family'];?>;
      color:<?php echo $total_text_styles_loop['color'];?>;
      font-weight: <?php echo $total_text_styles_loop['font-weight'];?>;
      font-style: <?php echo $total_text_styles_loop['font-style'];?>;
      font-size: <?php echo $total_text_styles_loop['font-size'];?>;
    }
    
  </style>

  <?php

}
add_action('wp_head','tsw_text_style');



  function tsw_show()
  {
    if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'tsw-opt' ); 
    $total_text = $titan->getOption( 'total_text');
    $total_sales_is_enabled = $titan->getOption( 'total_sales_is_enabled');
    if ( 1 == $total_sales_is_enabled ) {
    global $product;
    $units_sold = get_post_meta( $product->id, 'total_sales', true );
    echo '<p>'.'<span class="total">'.$total_text.": ".$units_sold.'</span>';
}

  }
add_action( 'woocommerce_single_product_summary', 'tsw_show', 11 );



function tsw_show_loop()
  {
    if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'tsw-opt' ); 
    $total_text = $titan->getOption( 'total_text');
    $total_is_enabled = $titan->getOption( 'total_is_enabled');
     if ( 1 == $total_is_enabled ) {
      global $product;
    $units_sold = get_post_meta( $product->id, 'total_sales', true );
    echo '<p style="text-align: center;">'.'<span class="total-loop">'.$total_text.": ".$units_sold.'</span>';    
    }
    


  }
add_action( 'woocommerce_after_shop_loop_item', 'tsw_show_loop', 11 );


?>