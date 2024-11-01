<?php if(!defined('ABSPATH')) exit;?>
<div class="wrap">
	<div style="float:left;margin:7px 8px 0 0;width:36px;height:34px;background:url(<?php echo esc_url(SIDETALK_AI_URL . '/images/icon-big.png')?>) left top no-repeat;"></div>
	<h1 class="wp-heading-inline"><?php echo __('Sidetalk AI', 'sidetalk-ai'); ?></h1>
	<a href="https://sidetalk.kr/" class="page-title-action" onclick="window.open(this.href);return false;"><?php echo __('Homepage', 'sidetalk-ai'); ?></a>
	<a href="https://cosmosfarm.notion.site/eab4ff8cf84b47689da3f5ca64245531" class="page-title-action" onclick="window.open(this.href);return false;"><?php echo __('User Guide', 'sidetalk-ai'); ?></a>
	<p><?php echo __('This is the Sidetalk AI settings for those tired of various consultation tasks.', 'sidetalk'); ?></p>
	
	<hr class="wp-header-end">
	<form method="post" action="<?php echo esc_url(admin_url('admin-post.php'))?>">
		<?php wp_nonce_field('sidetalk-ai-setting-save', 'sidetalk-ai-setting-save-nonce')?>
		<input type="hidden" name="action" value="sidetalk_setting_save">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_site_key">SITE_KEY</label><span style="font-size:12px;color:red;"> (<?php echo __('Required', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_site_key" class="regular-text" name="sidetalk_site_key" value="<?php echo esc_attr($option->site_key)?>" placeholder="<?php echo __('Please enter', 'sidetalk-ai'); ?>">
						<p class="description"><?php echo __('Please enter it if you want to install Sidetalk.', 'sidetalk-ai'); ?></p>
						<p class="description"><a href="https://cosmosfarm.notion.site/SITE-KEY-ab7d56f2d9984262b4f8e04aba009adf" target="_blank"><?php echo __('How to check SITE_KEY information.', 'sidetalk-ai'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_sign_key">SIGN KEY</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_sign_key" class="regular-text" name="sidetalk_sign_key" value="<?php echo esc_attr($option->sign_key)?>" placeholder="">
						<p class="description"><?php echo __('Enter it if you want to link WordPress user information.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('WordPress user information is sent to Sidetalk and used for CRM (Customer Relationship Management) functions.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_theme"><?php echo __('Theme', 'sidetalk'); ?></label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<select id="sidetalk_button_theme" name="sidetalk_button_theme" class="regular-text">
							<option value="" <?php selected($option->button_theme, ''); ?>><?php echo __('System Default', 'sidetalk-ai'); ?></option>
							<option value="dark" <?php selected($option->button_theme, 'dark'); ?>><?php echo __('Dark Theme', 'sidetalk-ai'); ?></option>
							<option value="light" <?php selected($option->button_theme, 'light'); ?>><?php echo __('Light Theme', 'sidetalk-ai'); ?></option>
						</select>
						<p class="description"><?php echo __('You can select the chat window button theme. Choose if you want to change.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_top">buttonTop</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_button_top" class="regular-text" name="sidetalk_button_top" value="<?php echo esc_attr($option->button_top)?>" placeholder="">
						<p class="description"><?php echo __('Enter the top position of the button. If you enter only a number, % will be applied automatically, and if you add px, it will be set in pixels.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('If you do not want to use this setting, save it as an empty value.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_bottom">buttonBottom</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_button_bottom" class="regular-text" name="sidetalk_button_bottom" value="<?php echo esc_attr($option->button_bottom)?>" placeholder="200px">
						<p class="description"><?php echo __('Enter the bottom position of the button. If you enter only a number, % will be applied automatically, and if you add px, it will be set in pixels.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('If you do not want to use this setting, save it as an empty value.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_left">buttonLeft</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_button_left" class="regular-text" name="sidetalk_button_left" value="<?php echo esc_attr($option->button_left)?>" placeholder="">
						<p class="description"><?php echo __('Enter the left position of the button. If you enter only a number, % will be applied automatically, and if you add px, it will be set in pixels.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('If you do not want to use this setting, save it as an empty value.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_right">buttonRight</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_button_right" class="regular-text" name="sidetalk_button_right" value="<?php echo esc_attr($option->button_right)?>" placeholder="5px">
						<p class="description"><?php echo __('Enter the right position of the button. If you enter only a number, % will be applied automatically, and if you add px, it will be set in pixels.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('If you do not want to use this setting, save it as an empty value.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_button_text">buttonText</label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="text" id="sidetalk_button_text" class="regular-text" name="sidetalk_button_text" value="<?php echo esc_attr($option->button_text)?>" placeholder="<?php echo __('AI Consultation', 'sidetalk-ai'); ?>">
						<p class="description"><?php echo __('Enter the button text above the chat window if you want to change it.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_hide_button"><?php echo __('Hide Sidetalk Button', 'sidetalk-ai'); ?></label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<select id="sidetalk_hide_button" name="sidetalk_hide_button" class="regular-text">
							<option value="" <?php selected($option->hide_button, ''); ?>><?php echo __('Show', 'sidetalk-ai'); ?></option>
							<option value="hide" <?php selected($option->hide_button, 'hide'); ?>><?php echo __('Hide', 'sidetalk-ai'); ?></option>
						</select>
						<p class="description"><?php echo __('This setting allows you to hide the chat window button.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="sidetalk_set_button_img_url"><?php echo __('Set Chat Button Image', 'sidetalk-ai'); ?></label><span style="font-size:12px;color:gray;"> (<?php echo __('Optional', 'sidetalk-ai'); ?>)</span></th>
					<td>
						<input type="url" id="sidetalk_set_button_img_url" class="regular-text" name="sidetalk_set_button_img_url" value="<?php echo esc_attr($option->set_button_img_url)?>">
						<p class="description"><?php echo __('You can set the background image for the chat window button.', 'sidetalk-ai'); ?></p>
						<p class="description"><?php echo __('Enter the image URL.', 'sidetalk-ai'); ?></p>
					</td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php echo __('Save Changes', 'sidetalk-ai'); ?>">
		</p>
	</form>
</div>
<div class="clear"></div>