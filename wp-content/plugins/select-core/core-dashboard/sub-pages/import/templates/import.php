<div class="wrap about-wrap qodef-core-dashboard">
	<h1 class="qodef-cd-title"><?php esc_html_e('Import', 'moments-core'); ?></h1>
	<h4 class="qodef-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'moments-core'); ?></h4>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-core-dashboard-column">
			<div class="qodef-core-dashboard-box qodef-cd-import-box">
				<?php
				if(!empty(MomentsCoreDashboard::get_instance()->get_purchased_code())) {?>
					<div class="qodef-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'moments-core'); ?></h3>
						<p><?php esc_html_e('Start the demo import process by choosing which content you wish to import. ', 'moments-core'); ?></p>
					</div>
					<div class="qodef-cd-box-inner">
						<form method="post" class="qodef-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'moments-core'); ?>">
							<div class="qodef-cd-box-form-section">
								<?php echo moments_core_get_module_template_part('core-dashboard/sub-pages/import', 'notice', ''); ?>
								<label class="qodef-cd-label"><?php esc_html_e('Select Demo to import', 'moments-core'); ?></label>
								<select name="demo" class="qodef-import-demo">
									<option value="moments-v2" data-thumb="<?php echo QODE_CORE_URL_PATH . '/core-dashboard/assets/img/demo.png'; ?>"><?php esc_html_e('Moments', 'moments-core'); ?></option>
								</select>
							</div>
							<div class="qodef-cd-box-form-section qodef-cd-box-form-section-columns">
								<div class="qodef-cd-box-form-section-column">
									<label class="qodef-cd-label"><?php esc_html_e('Select Import Option', 'moments-core'); ?></label>
									<select name="import_option" class="qodef-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
										<option value="none"><?php esc_html_e('Please Select', 'moments-core'); ?></option>
										<option value="complete"><?php esc_html_e('All', 'moments-core'); ?></option>
										<option value="content"><?php esc_html_e('Content', 'moments-core'); ?></option>
										<option value="widgets"><?php esc_html_e('Widgets', 'moments-core'); ?></option>
										<option value="options"><?php esc_html_e('Options', 'moments-core'); ?></option>
<!--										<option value="single-page">--><?php //esc_html_e('Single Page', 'moments-core'); ?><!--</option>-->
									</select>
								</div>
								<div class="qodef-cd-box-form-section-column">
									<label class="qodef-cd-label"><?php esc_html_e('Import Attachments', 'moments-core'); ?></label>
									<div class="qodef-cd-switch">
										<label class="qodef-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'moments-core'); ?></span></label>
										<label class="qodef-cd-cb-disable"><span><?php esc_html_e('No', 'moments-core'); ?></span></label>
										<input type="checkbox" class="qodef-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
									</div>
								</div>
							</div>
							<div class="qodef-cd-box-form-section qodef-cd-box-form-section-dependency"></div>
							<div class="qodef-cd-box-form-section qodef-cd-box-form-section-progress">
								<span><?php esc_html_e('The import process may take some time. Please be patient.', 'moments-core') ?></span>
								<progress id="qodef-progress-bar" value="0" max="100"></progress>
								<span class="qodef-cd-progress-percent"><?php esc_attr_e('0%', 'moments-core'); ?></span>
							</div>
							<div class="qodef-cd-box-form-section qodef-cd-box-form-last-section">
								<span class="qodef-cd-import-is-completed"><?php esc_html_e('Import is completed', 'moments-core') ?></span>
								<input type="submit" class="qodef-cd-button" value="<?php esc_attr_e('Import', 'moments-core'); ?>" name="import" id="qodef-<?php echo esc_attr($submit); ?>" />
							</div>
							<?php wp_nonce_field("qodef_cd_import_nonce","qodef_cd_import_nonce") ?>
						</form>
					</div>
				<?php } else { ?>
					<div class="qodef-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'moments-core'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'moments-core'); ?></p>
					</div>
					<div class="qodef-cd-box-inner">
						<div class="qodef-cd-box-section">
							<div class="qodef-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=moments_core_dashboard'); ?>" class="qodef-cd-button"><?php esc_attr_e('Activate your theme copy', 'moments-core'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>