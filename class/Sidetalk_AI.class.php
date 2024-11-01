<?php
/**
 * Sidetalk_AI
 * @link https://www.cosmosfarm.com/
 * @copyright Copyright 2024 사이드톡. All rights reserved.
 */
class Sidetalk_AI
{
	public function __construct()
	{
		// wp_footer 액션 대신 wp_enqueue_scripts 액션을 사용합니다.
		add_action('wp_enqueue_scripts', array($this, 'enqueue_sidetalk_script'));
	}
	
	public function enqueue_sidetalk_script()
	{
		$option = sidetalk_get_option();
		$site_key = esc_js($option->site_key);
		
		$button_top = $option->button_top;
		$button_bottom = $option->button_bottom;
		$button_left = $option->button_left;
		$button_right = $option->button_right;
		$button_text = $option->button_text;
		$button_theme = $option->button_theme;
		$hide_button = $option->hide_button;
		$set_button_img_url = $option->set_button_img_url;
		
		// sidetalk.js 파일을 wp_enqueue_script 함수를 사용하여 등록합니다.
		wp_enqueue_script( 'sidetalk-ai-script', 'https://pages.sidetalk.ai/sidetalk.js', array(), null, true );
		
		// 스크립트 설정을 위한 변수를 준비합니다.
		$script_data = array(
			'siteKey' => $site_key,
			'buttonTop' => $button_top,
			'buttonBottom' => $button_bottom,
			'buttonLeft' => $button_left,
			'buttonRight' => $button_right,
			'buttonText' => $button_text,
			'buttonTheme' => $button_theme,
			'hideButton' => $hide_button,
			'setButtonImageUrl' => $set_button_img_url,
		);
		
		// 사용자가 로그인했다면 사용자 정보를 추가합니다.
		if(is_user_logged_in() && $option->sign_key) {
			$member_id = get_current_user_id();
			$user_data = get_userdata($member_id);
			
			$user_name = $user_data->display_name;
			$user_email = $user_data->user_email;
			$user_phone = isset($user_data->billing_phone) ? $user_data->billing_phone : '';
			$signature = $this->signature($user_name, $user_email, $user_phone, $member_id);
			
			$script_data['userInfo'] = array(
				'signature' => $signature,
				'member_id' => $member_id,
				'user_name' => $user_name,
				'user_email' => $user_email,
				'user_phone' => $user_phone,
			);
		}

		// wp_add_inline_script 함수를 사용하여 스크립트 설정을 추가합니다.
		wp_add_inline_script('sidetalk-ai-script', 'SidetalkAI("init", ' . wp_json_encode($script_data) . ');');
	}
	
	private function signature($user_name, $user_email, $user_phone, $member_id) {
		$option = sidetalk_get_option();
		
		$expires_in = time() + 3600; // 1시간 후 만료
		$user_agent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
		
		$token_string = $member_id . $user_name . $user_email . $user_phone . $user_agent . $option->sign_key . $expires_in;
		$token = hash_hmac('sha256', $token_string, $option->sign_key);
		
		$signature = base64_encode(wp_json_encode(array(
			'expires_in' => $expires_in,
			'token' => $token
		)));
		
		return $signature;
	}
}