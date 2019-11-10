<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<p><?php printf( __( 'Thanks for creating an account. <br /><br />USERNAME: %s', 'woocommerce' ), '<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>

<?php /* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */ ?>
<p><?php printf( __( 'You can access your account area to view orders, change your password, and more at: %s', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p><?php // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>


<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

	<p><?php printf( __( 'PASSWORD: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_email_footer', $email );
