<?php
/*
Plugin Name: Sidetalk AI
Plugin URI: https://sidetalk.kr/?utm_source=wp-plugins&utm_campaign=plugin-uri&utm_medium=wp-dash
Description: This is the Sidetalk AI plugin for those tired of handling various consultation tasks.
Version: 1.1
Author: 사이드톡
Author URI: https://sidetalk.kr/?utm_source=wp-plugins&utm_campaign=author-uri&utm_medium=wp-dash
License: GPLv3
*/

if (!defined('ABSPATH')) exit;

define('SIDETALK_AI_VERSION', '1.0');
define('SIDETALK_AI_DIR', dirname(__FILE__));
define('SIDETALK_AI_URL', plugins_url('', __FILE__));

include_once SIDETALK_AI_DIR . '/class/Sidetalk_AI.class.php';
include_once SIDETALK_AI_DIR . '/class/Sidetalk_Controller.class.php';
include_once SIDETALK_AI_DIR . '/class/Sidetalk_Option.class.php';

add_action('init', 'sidetalk_ai_init');
function sidetalk_ai_init(){
	load_plugin_textdomain('sidetalk-ai', false, dirname(plugin_basename(__FILE__)) . '/languages');
	new Sidetalk_Controller();
	new Sidetalk_AI();
}

function sidetalk_get_option(){
	global $sidetalk_option;
	if($sidetalk_option === null){
		$sidetalk_option = new Sidetalk_Option();
	}
	return $sidetalk_option;
}

add_action('admin_menu', 'sidetalk_menu');
function sidetalk_menu(){
	add_menu_page('사이드톡 AI', '사이드톡 AI', 'manage_options', 'sidetalk_menu_setting', 'sidetalk_menu_setting', SIDETALK_AI_URL . '/images/icon.png');
}

function sidetalk_menu_setting(){
	$option = sidetalk_get_option();
	
	include SIDETALK_AI_DIR . '/admin/sidetalk_setting.php';
}

add_action('admin_notices', 'sidetalk_admin_notice');
function sidetalk_admin_notice() {
	$option = sidetalk_get_option();
	
	if (empty($option->site_key)) {
		$settings_url = esc_url(admin_url('admin.php?page=sidetalk_menu_setting'));
		echo '<div class="notice notice-warning is-dismissible">
			<p><a href="https://sidetalk.kr/" target="_blank">사이드톡</a>을 사용하시려면 <a href="' . $settings_url . '">SITE_KEY 정보를 입력</a>해 주세요. 회원가입 후 이용 가능합니다. 사용을 원치 않으시는 경우 플러그인을 비활성화해 주세요.</p>
		</div>';
	}
}