<?php

class MomentsQodefFullScreenMenuOpener extends MomentsQodefWidget {
    public function __construct() {
        parent::__construct(
            'qodef_full_screen_menu_opener', // Base ID
            'Select Full Screen Menu Opener' // Name
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> 'Icon Color',
				'description' => esc_html__( 'Define color for Side Area opener icon', 'moments' )
			)
		);

	}

    public function widget($args, $instance) {

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}

		$icon_size = moments_qodef_options()->getOptionValue( 'fullscreen_menu_icon_size' );
		?>
        <a href="javascript:void(0)" class="qodef-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
            <span class="qodef-fullscreen-menu-opener-inner">
                <i class="qodef-line" <?php moments_qodef_inline_style($fullscreen_icon_styles); ?>>&nbsp;</i>
            </span>
        </a>
    <?php }

}