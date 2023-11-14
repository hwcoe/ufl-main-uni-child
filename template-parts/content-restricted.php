<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *  @package Bootscore
 */
?>

<?php
// $page_title = get_the_title();

?>

<main id="main" class="site-main">
	<header class="entry-header">
		<h1><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php if ( ufl_check_page_visitor_level( get_the_ID() ) > 0 ) {

			// Display a login message, depending on login status
			if( !ufl_shibboleth_valid_user() ){

			// User has not logged in ?>
	        <p>This content can only be seen by authorized users.</p>
	        <?php
			} else {
			// If logged in and denied access
			$webmaster_email = get_bloginfo('admin_email');
			$site_admin = ( !empty($webmaster_email) )? $webmaster_email : 'webmaster@eng.ufl.edu';
			?>

			<h2><?php esc_html_e( 'Access Denied', 'ufl_stamatschild' ); ?>
			<p>Sorry, you do not have permission to view this page. Please <a href="mailto:<?php echo $site_admin ?>">contact the site administrator</a> if you have questions about accessing this content.</p>
	        <?php	
			}
			// Display the correct login button
			if( ufl_check_page_visitor_level( get_the_ID() ) >= 2 ){
				// GatorLink logins
				ufl_shibboleth_login_button();
			}
			else {
				// WordPress login
				?>
				<p><a href="<?php echo wp_login_url( get_permalink() ); ?>" class="button animated-border-button button-border-orange button-text-dark" title="Login"><?php esc_html_e( 'WordPress Login', 'ufl_stamatschild' ); ?></a></p>
		        <?php
			}
		}
		?>
	</div>
</main>

    

