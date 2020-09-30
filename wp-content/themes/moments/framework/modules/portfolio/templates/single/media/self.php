<div class="qodef-self-hosted-video-holder">
    <div class="mobile-video-image" style="background-image: url(<?php echo esc_url( $media['video_cover'] ); ?>);"></div>
    <div class="qodef-video-wrap">
        <video class="qodef-self-hosted-video" poster="<?php echo esc_url( $media['video_cover'] ); ?>" preload="auto">
			<?php if ( ! empty( $media['video_url']['webm'] ) ) { ?>
                <source type="video/webm" src="<?php echo esc_url( $media['video_url']['webm'] ); ?>"> <?php } ?>
			<?php if ( ! empty( $media['video_url']['mp4'] ) ) { ?>
                <source type="video/mp4" src="<?php echo esc_url( $media['video_url']['mp4'] ); ?>"> <?php } ?>
			<?php if ( ! empty( $media['video_url']['ogv'] ) ) { ?>
                <source type="video/ogg" src="<?php echo esc_url( $media['video_url']['ogv'] ); ?>"> <?php } ?>
            <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url( get_template_directory_uri() . '/assets/js/flashmediaelement.swf' ); ?>">
                <param name="movie" value="<?php echo esc_url( get_template_directory_uri() . '/assets/js/flashmediaelement.swf' ); ?>"/>
                <param name="flashvars" value="controls=true&file=<?php echo esc_url( $media['video_url']['mp4'] ); ?>"/>
                <img itemprop="image" src="<?php echo esc_url( $media['video_cover'] ); ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'moments' ); ?>" alt="<?php esc_attr_e( 'Video thumb', 'moments' ); ?>"/>
            </object>
        </video>
    </div>
</div>