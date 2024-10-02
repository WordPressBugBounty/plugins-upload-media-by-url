<?php
/*
Plugin Name: Upload Media By URL
Plugin URI: http://wordpress.org/extend/plugins/upload-media-by-url/
Text Domain: UploadMediaByUrl
Description: Upload files to your Media Library via URL. 
Author: NoteToServices
Author URI: https://notetoservices.com
License: GPLv2 or later
Version: 1.0.10
*/

if ( ! defined( 'ABSPATH' ) ) { die(); }


// Set some global paths
// Set some global paths
define('UMBU_SITE_URL', get_home_url());
define('UMBU_PLUGIN_DIR', dirname(__FILE__));
define('UMBU_PLUGIN_URLDIR', plugin_dir_url(__DIR__));
define('UMBU_PLUGIN_NAME', plugin_basename(UMBU_PLUGIN_DIR));

add_action( 'admin_footer', 'umbu_media' );
add_action('wp_enqueue_scripts', 'umbu_callback_css');
add_action( 'admin_init','umbu_callback_css');
function umbu_callback_css() {
	if (  is_admin() ) {
    		wp_register_style( 'popup', UMBU_PLUGIN_URLDIR.UMBU_PLUGIN_NAME.'/assets/css/popup.css' );
    		wp_enqueue_style( 'popup' );
	}
}

// Load all files
spl_autoload_register('umbu_ClassAPILoad');
function umbu_ClassAPILoad($class) 
{
	require_once(UMBU_PLUGIN_DIR.'/inc/umbumedia.php');
}

	/**
	 * umbu_nonce
	 *
	 * generate a nonce for additional security
	 * @since 1.0.8
	 * @param
	 */

function umbu_nonce() {
  $nonce = wp_create_nonce('umbu');
  return $nonce;
}

	/**
	 * umbu_checknonce
	 *
	 * check nonce for additional security
	 * @since 1.0.8
	 * @param
	 */

function umbu_checknonce($nonce) {
  $valid = wp_verify_nonce($nonce, 'umbu');
  return $valid;
}

	/**
	 * umbu_download
	 *
	 * download file from url and add it to the media gallery
	 * @since 1.0.0
	 * @param
	 */

function umbu_download($imgurl) { 

$url = $imgurl;
$timeout_seconds = 5;

// Download file to temp dir
$temp_file = download_url( $url, $timeout_seconds );

if ( !is_wp_error( $temp_file ) ) {

        $wp_file_type = wp_check_filetype($temp_file);

        $filemime = $wp_file_type['type'];

	// Array based on $_FILE as seen in PHP file uploads
	$file = array(
		'name'     => basename($url), // ex: wp-header-logo.png
		'type'     => $filemime,
		'tmp_name' => $temp_file,
		'error'    => 0,
		'size'     => filesize($temp_file),
	);


	if ( ! isset( $_POST['multiurl'] ) || ! umbu_checknonce($_POST["nonce"]) ) {
	   	echo 'Error: nonce not verified. Please reload this page and try again'; 
		exit;
	}
	// Move the temporary file into the uploads directory
		// Tells WordPress to not look for the POST form
		// fields that would normally be present as
		// we downloaded the file from a remote server, so there
		// will be no form fields
		// Default is true

	if ($post !== null && property_exists($post, 'id')) {
    		$results = media_handle_sideload($file, $post->id, NULL, array('test_size' => false));
	} else {
 	   	$results = media_handle_sideload( $file, $overrides );
  	}
    }
}



	/**
	 * umbu_media
	 *
	 * shows the dialog for the upload media by url button
         * also does all the transfer via wp code upload
	 * @since 1.0.0
	 * @param
	 */

function umbu_media() {
	global $pagenow;
	$post_type = get_post_type();
    if ( ! current_user_can( 'upload_files' ) ) return;
    if ( $pagenow != 'upload.php' ) return; //fix issue of plugin being loaded on other admin pages
    if ( $post_type == 'shop_order' ) return; // fix issue of plugin being loaded on WooCommerce pages
    //	make sure plugin is not conflicting with WooCommerce at all
    if( function_exists("is_shop") ) {
	return;
    }

    //	check for multiurl
    if(isset($_REQUEST["multiurl"])) { $multiurl = preg_split( '/\A\s+|\s*?\R\s*+|\s+\z/', $_REQUEST['multiurl'], -1, PREG_SPLIT_NO_EMPTY );
 }

    if(!empty($multiurl)) { 
          // 	navigate through any urls
		
          foreach($multiurl as $mu) {                    
              //	download and insert as media attachment
              umbu_download(esc_url_raw($mu)); 
          }
    }


    echo __( '<div id="openUMBU" class="modalDialog"><div><a href="" title="Close" class="close">X</a><h2>Upload Media By URL</h2><p><form action="" method="post"><textarea style="width:100%;height:300px;" name="multiurl" required/></textarea><br><small>Separate each URL by a new line</small><p><input type="submit" class="button"> <a href="" class="button">Cancel</a></p><input type="hidden" name="nonce" value="'.umbu_nonce().'"></form></p></div></div>');
}


?>
