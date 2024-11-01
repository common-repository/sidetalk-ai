<?php
/**
 * Sidetalk_Controller
 * @link https://www.cosmosfarm.com/
 * @copyright Copyright 2024 사이드톡. All rights reserved.
 */
class Sidetalk_Controller {
	
	public function __construct(){
		add_action('admin_post_sidetalk_setting_save', array($this, 'sidetalk_save'), 10);
	}

	public function sidetalk_save(){
		// nonce 검증 부분을 수정합니다.
		if ( current_user_can( 'manage_options' )
			&& isset( $_POST['sidetalk-ai-setting-save-nonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sidetalk-ai-setting-save-nonce'] ) ), 'sidetalk-ai-setting-save' )
		) {
			
			$option = sidetalk_get_option();
			$option->update('sidetalk_site_key');
			$option->update('sidetalk_sign_key');
			$option->update('sidetalk_button_top');
			$option->update('sidetalk_button_bottom');
			$option->update('sidetalk_button_left');
			$option->update('sidetalk_button_right');
			$option->update('sidetalk_button_text');
			$option->update('sidetalk_button_theme');
			$option->update('sidetalk_hide_button');
			$option->update('sidetalk_set_button_img_url');
			
			wp_redirect(wp_get_referer());
			exit;
		}
		else{
			wp_die('권한이 없습니다.');
		}
	}
}