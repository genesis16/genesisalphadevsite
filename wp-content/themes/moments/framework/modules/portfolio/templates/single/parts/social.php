<?php if(moments_qodef_options()->getOptionValue('enable_social_share') == 'yes'
    && moments_qodef_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="qodef-portfolio-social">
        <?php echo moments_qodef_get_social_share_html() ?>
    </div>
<?php endif; ?>