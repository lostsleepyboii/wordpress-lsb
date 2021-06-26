<?
// Подключение скриптов и стилей:
	add_action('wp_enqueue_scripts', 'centerlogistic_scripts');
	add_action('wp_enqueue_scripts', 'centerlogistic_styles');

	function centerlogistic_styles() {
		wp_enqueue_style('stylecss', get_stylesheet_uri());
	}

	function centerlogistic_scripts() {
		wp_enqueue_script('appjs', get_template_directory_uri() . '/assets/js/app.js', array(), null, true);
	}

// Подключение тем:
	show_admin_bar(false);
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');

// Шаблон функции меню:
	add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);

	function filter_nav_menu_link_attributes($atts, $item, $args) {
		if ($args->menu === 'Main') {
			$atts['class'] = 'nav__link';
		};

		if ($args->menu === 'Footer') {
			$atts['class'] = 'footer__link';
		};

		return $atts;
	};

// Шаблон функции меню с активными ссылками:
	// function filter_nav_menu_link_attributes($atts, $item, $args) {
	// 	if ($args->menu === 'Main') {
	// 		$atts['class'] = 'nav__link';
			
	// 		if ($item->current) {
	// 			$atts['class'] .= ' active';
	// 		}
	// 	};

	// 	return $atts;
	// }