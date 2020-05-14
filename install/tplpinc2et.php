<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
//YOUR COMPANY DETAIL
$pcomp  = 'W3BTITLE';
$psupp  = 'Support';
$mysig  = 'Fai-Leigh';
//YOUR PAYPAL DETAIL
$ppleml = 'business@mmtechworks.com';
$pplcur = 'USD';
$ppldemo= 'https://www.sandbox.paypal.com/uk/cgi-bin/webscr'; 
$ppllive= 'https://www.paypal.com/uk/cgi-bin/webscr'; 
$pplenv = $ppllive; 
//=============================================
$pdom   = parse_url(get_site_url(), PHP_URL_HOST); //ie yourdomain.com
$psupp  = $psupp.'@'.ucfirst($pdom);       //ie your supportemail@yourdomain.com
$url    = parse_url( $_SERVER["REQUEST_URI"],PHP_URL_PATH ); //ie the url of this page
$chunks = explode('/', $url);
$pfxlead= 6;      //ie #chars prefix to product-name - "M1001 "
$pdir   = urldecode(substr($chunks[2],$pfxlead));  //eg 'Beat Information Overload' which is 2 levels deep;



function get_wc_product_by_title( $title ){
    global $wpdb;
    $post_title = strval($title);
    $post_table = $wpdb->prefix . "posts";
    $result = $wpdb->get_col("SELECT ID FROM $post_table WHERE post_title LIKE '$post_title' AND post_type LIKE 'product' ");
    // We exit if title doesn't match
    if( empty( $result[0] ) ) 
        return;
    else
        return wc_get_product( intval( $result[0] ) );
}

$prod=get_wc_product_by_title($pdir);
$pnam = $prod->get_title();
$pdosh= $prod->get_price();
$psku = $prod->get_sku();
$pid  = $prod->get_id();
//$pshop = $pdom . '/account/'; 

?>
<!-- FONTS etc -->
<link rel="icon" href="<?php echo '/wp-content/uploads/PLRFavicon-100x100.gif'; ?>" sizes="any" type="image/png">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,600,700,900">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Alex+Brush">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rammetto+One">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand">
