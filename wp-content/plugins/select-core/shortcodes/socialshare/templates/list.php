<div class="qodef-social-share-holder qodef-list">
    <ul>
		<?php foreach ( $networks as $net ) {
			if ( function_exists( 'moments_qodef_get_module_part' ) ) {
				print moments_qodef_get_module_part( $net );
			}
		} ?>
    </ul>
</div>