<?php if(moments_qodef_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

    <div class="qodef-portfolio-info-item qodef-portfolio-date">
        <h6><?php esc_html_e('Date', 'moments'); ?></h6>

        <p><?php the_time(get_option('date_format')); ?></p>
    </div>

<?php endif; ?>