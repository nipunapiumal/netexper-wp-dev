<?php
define( 'DISABLE_JETPACK_WAF', false );
if ( defined( 'DISABLE_JETPACK_WAF' ) && DISABLE_JETPACK_WAF ) return;
define( 'JETPACK_WAF_MODE', 'normal' );
define( 'JETPACK_WAF_SHARE_DATA', '1' );
define( 'JETPACK_WAF_SHARE_DEBUG_DATA', '1' );
define( 'JETPACK_WAF_DIR', '/home/u684762784/domains/netexper.com.au/public_html/wp-content/jetpack-waf' );
define( 'JETPACK_WAF_WPCONFIG', '/home/u684762784/domains/netexper.com.au/public_html/wp-content/../wp-config.php' );
define( 'JETPACK_WAF_ENTRYPOINT', 'rules/rules.php' );
require_once '/home/u684762784/domains/netexper.com.au/public_html/wp-content/plugins/jetpack/vendor/autoload.php';
Automattic\Jetpack\Waf\Waf_Runner::initialize();
