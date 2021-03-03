<?php
/**
 * Plugin name: Snow Monkey Demo 01
 * Description: オレインデザインの Snow Monkey のデモサイト用プラグインです
 * Version: 0.0.1
 *
 * @package snow-monkey-demo-01
 * @author Olein-jp
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * import css
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'sbdemo01-styles',
			MY_SNOW_MONKEY_URL . '/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( plugin_dir_path( __FILE__ ) )
		);
		wp_enqueue_script(
			'smdemo01-script',
			MY_SNOW_MONKEY_URL . '/scripts.js',
			null,
			filemtime( plugin_dir_path( __FILE__ ) ),
			false
		);
	}
);

/**
 * Insert loading DOM
 */
add_action(
	'wp_body_open',
	function() {
		?>
		<div id="loading">
			<div class="spinner"></div>
		</div>
		<?php
	}
);
