<?php

$qode_pages = array();
$pages      = get_pages();
foreach ( $pages as $page ) {
	$qode_pages[ $page->ID ] = $page->post_title;
}

//Portfolio Images

$qodePortfolioImages = new MomentsQodefMetaBox( "portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images' );
$moments_qodef_Framework->qodeMetaBoxes->addMetaBox( "portfolio_images", $qodePortfolioImages );

$qode_portfolio_image_gallery = new MomentsQodefMultipleImages( "qode_portfolio-image-gallery", "Portfolio Images", "Choose your portfolio images" );
$qodePortfolioImages->addChild( "qode_portfolio-image-gallery", $qode_portfolio_image_gallery );

//Portfolio Images/Videos 2

$qodePortfolioImagesVideos2 = new MomentsQodefMetaBox( "portfolio-item", "Portfolio Images/Videos (single upload)" );
$moments_qodef_Framework->qodeMetaBoxes->addMetaBox( "portfolio_images_videos2", $qodePortfolioImagesVideos2 );

$qode_portfolio_images_videos2 = new MomentsQodefImagesVideosFramework( "Portfolio Images/Videos 2", "ThisIsDescription" );
$qodePortfolioImagesVideos2->addChild( "qode_portfolio_images_videos2", $qode_portfolio_images_videos2 );

//Portfolio Additional Sidebar Items

$qodeAdditionalSidebarItems = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'portfolio-item' ),
		'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'moments' ),
		'name'  => 'portfolio_properties'
	)
);

$qode_portfolio_properties = moments_qodef_add_options_framework(
	array(
		'label'  => esc_html__( 'Portfolio Properties', 'moments' ),
		'name'   => 'qode_portfolio_properties',
		'parent' => $qodeAdditionalSidebarItems
	)
);