<?php
	function mamurjor_dev(){
		load_theme_textdomain("1stproject");
		add_theme_support("post-thumbnails");
		add_theme_support("title-tag");
		$menu_custom_header= array(
		'header-text'		=> true,
		'default-text-color'=> '#elelel'
		);
		add_theme_support("custom-header", $menu_custom_header);
		add_theme_support("custom-logo", );
		add_theme_support("custom-background", );
		register_nav_menu('topmenu', __('topmenu','1stproject'));
		register_nav_menu('socailmenu', __('socailmenu','1stproject'));
		
	}
	
	add_action("after_setup_theme","mamurjor_dev");

	function mamurjor_scripts(){
		wp_enqueue_style("mamurjor_font","http://fonts.googleapis.com/css?family=Nova+Mono");
		wp_enqueue_style("mamurjor_style",get_stylesheet_uri());
		
	}
	
	add_action("wp_enqueue_scripts","mamurjor_scripts");


	function mamurjor_sideber(){
		register_sidebar(
			array(
				"name"			=>		__("right-sidebar", "1stproject"),
				"id"			=>		__("sidebar1"),
				"description"	=>		__("this is right sidebar", "1stproject"),
				"before_widget"			=>		"<ul>",
				"after_widget"			=>		"</ul>",
				"before_title"			=>		"<h2>",
				"after_title"			=>		"</h2>"
			)
			);
			register_sidebar(
			array(
				"name"			=>		__("footer", "1stproject"),
				"id"			=>		__("footer"),
				"class"			=>		__("inner"),
				"description"	=>		__("this is footer sidebar", "1stproject"),
				"before_widget"			=>		"",
				"after_widget"			=>		"",
				"before_title"			=>		"<h2>",
				"after_title"			=>		"</h2>"
			)
		);
		
	}
	
	add_action("widgets_init","mamurjor_sideber");
	
	
		function mamurjor_protected($excerpt){
		if(post_password_required()){
			return get_the_password_form();
		}else{
			return "$excerpt";
		}
		
	}
	
	add_filter("the_excerpt","mamurjor_protected");

		function mamurjor_protected_title(){
			return "locked: %s";
		
		
	}
	
	add_filter("protected_title_format","mamurjor_protected_title");
	
		function mamurjor_custom_header(){
			if(is_front_page()){
				if(current_theme_supports('custom-header')){
					
					?>
					<style>
						#banner{
							background-image: url(<?php echo header_image();?>);
							background-size: cover;
						}
						#header #logo h1 a ,p {
							color: #<?php echo get_header_textcolor();?>
							
						}
						#header #logo{
							<?php if(!display_header_text()){ 
							echo "display: none";
							}?>
						}
						#logo .custom-logo {
							width:100px;
							height:100px;
							float: left;
							margin-top: 120px;
							border-radius: 30%;
						}
						
					
					
					</style>
					<?php
					
				}
			}
		
		
	}
	
	add_filter("wp_head","mamurjor_custom_header");

?>