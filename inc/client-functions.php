<?php

/**
 * Client-specific functionality
 *
 * @package c9-music
 */

/**
 * Adds additional theme settings to customizer
 */
require_once "client-admin-settings.php";

/**
 * Sets up colors and custom styles for core blocks
 */
require_once "client-setup.php";

/**
 * Client frontend styles and scripts
 */
require_once "client-enqueue.php";

/**
 * Client editor styles and scripts
 */
require_once "client-editor.php";

/**
 * Client WooCommerce
 */
require_once "client-woocommerce.php";

/**
 * Client Extra Functions
 */
require_once "client-extras.php";
