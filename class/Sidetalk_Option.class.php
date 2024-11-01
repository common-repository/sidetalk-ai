<?php
/**
 * Sidetalk_Option
 * @link https://www.cosmosfarm.com/
 * @copyright Copyright 2024 사이드톡. All rights reserved.
 */
class Sidetalk_Option {
	
	var $site_key;
	var $sign_key;
	var $button_top;
	var $button_bottom;
	var $button_left;
	var $button_right;
	var $button_text;
	var $button_theme;
	var $hide_button;
	var $set_button_img_url;
	
	public function __construct(){
		$this->init();
	}
	
	public function init(){
		$this->site_key = get_option('sidetalk_site_key', '');
		$this->sign_key = get_option('sidetalk_sign_key', '');
		$this->button_top = get_option('sidetalk_button_top', '');
		$this->button_bottom = get_option('sidetalk_button_bottom', '200px');
		$this->button_left = get_option('sidetalk_button_left', '');
		$this->button_right = get_option('sidetalk_button_right', '5px');
		$this->button_text = get_option('sidetalk_button_text', 'AI 상담');
		$this->button_theme = get_option('sidetalk_button_theme', '');
		$this->hide_button = get_option('sidetalk_hide_button', '');
		$this->set_button_img_url = get_option('sidetalk_set_button_img_url', '');
	}
	
	public function update($option_name, $default=false){
		if(isset($_POST[$option_name])){
			if(is_array($_POST[$option_name])){
				$new_value = array_map('sanitize_text_field', $_POST[$option_name]);
			}
			else{
				$new_value = sanitize_text_field($_POST[$option_name]);
			}
			if(get_option($option_name) !== false){
				update_option($option_name, $new_value, 'yes');
			}
			else add_option($option_name, $new_value, '', 'yes');
		}
		else if($default !== false){
			if(get_option($option_name) !== false){
				update_option($option_name, $default, 'yes');
			}
			else add_option($option_name, $default, '', 'yes');
		}
	}
	
	public function truncate(){
		delete_option('sidetalk_site_key');
		delete_option('sidetalk_sign_key');
		delete_option('sidetalk_button_top');
		delete_option('sidetalk_button_bottom');
		delete_option('sidetalk_button_left');
		delete_option('sidetalk_button_right');
		delete_option('sidetalk_button_text');
		delete_option('sidetalk_button_theme');
		delete_option('sidetalk_hide_button');
		delete_option('sidetalk_set_button_img_url');
	}
}