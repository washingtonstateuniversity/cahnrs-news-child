<?php

$is_hiden = get_theme_mod('wsu_wds_site_header_hide', false );

if ( is_front_page() && ! get_theme_mod('wsu_wds_site_header_hide', false ) ) {

	$is_hiden = get_theme_mod('wsu_wds_site_header_home_hide', false );

}

?>
<?php do_action( 'wsu_wds_template_site_header_before' ); ?>
<?php if ( empty( $is_hiden ) ) : ?>
<header class="wsu-header-site<?php if ( ! empty( get_theme_mod('wsu_wds_site_header_style', false ) ) ) : ?> wsu-header-site--<?php echo esc_attr( get_theme_mod( 'wsu_wds_site_header_style', '' ) ); ?><?php endif; ?>">
	<div class="wsu-header-site__label">
		<?php if ( empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?><a class="wsu-header-site__title-link" href="<?php echo esc_url( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', get_home_url() ) ); ?>"><?php endif; ?>
		<?php if ( empty( get_theme_mod( 'wsu_wds_site_header_subtitle_hide', false ) ) ) : ?>
			<div class="wsu-header-site__subtitle">
				<?php if ( ! empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?><a class="wsu-header-site__subtitle-link" href="<?php echo esc_url( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ); ?>"><?php endif; ?>
				<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>
				<?php if ( ! empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?></a><?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="wsu-header-site__title">
				<?php if ( ! empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?><a class="wsu-header-site__title-link" href="<?php echo esc_url( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'title_link', get_home_url() ) ); ?>"><?php endif; ?>
				<?php 
					$site_title = get_bloginfo( 'name' );
					$half_title = explode(' ', $site_title, 2);

					$title = '<span class="light-font">' . $half_title[1] . '</span>';

					if (isset($half_title[0])) {
						$title = $half_title[0] . ' ' . $title;
					}
					
					echo  $title; 
					
					
					
					
					?>
				<?php if ( ! empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?></a><?php endif; ?>
			</div>
		<?php if ( empty( WSUWP\Theme\WDS\WDS_Options::get( 'site', 'subtitle_link', '' ) ) ) : ?></a><?php endif; ?>
	</div>
	<?php if ( 'horizontal' === get_theme_mod('wsu_wds_site_navigation_style', false ) ) : ?>
		<nav class="wsu-navigation-site-horizontal" aria-expanded="false" aria-haspopup="true" aria-label="Site menu"">
    		<button class=" wsu-button-ui--navigation-menu wsu-navigation-site-horizontal--toggle" aria-label="Open site menu">Menu</button>
			<button class="wsu-navigation-site-horizontal__overlay wsu-navigation-site-horizontal--close">Close site menu</button>
			<div class="wsu-navigation-site-horizontal__panel">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'site',
						'menu_class'     => 'wsu-navigation-site-horizontal__menu',
						'container'      => '',
						'walker'         => new WSUWP\Theme\WDS\Walker_Nav_Menu_Category(),
					)
				);
				?>
				<button class="wsu-button-ui--close-after wsu-navigation-site-horizontal--close">Close</button>
			</div>
		</nav>
	<?php endif; ?>
</header>
<?php endif; ?>
<?php do_action( 'wsu_wds_template_site_header_after' ); ?>

