<?php
/**
 * Kirki Config
 */
Kirki::add_config( 'plant', [
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
] );
Kirki::add_section( 'header', [
	'title'          => __( 'Header' , 'plant'),
	'panel'          => '',
	'priority'       => 81,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
Kirki::add_section( 'body', [
	'title'          => __( 'Body' , 'plant'),
	'description'    => '',
	'panel'          => '',
	'priority'       => 82,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'shop', [
		'title'          => __( 'Shop' , 'plant'),
		'description'    => '',
		'panel'          => '',
		'priority'       => 83,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
	] );
}
Kirki::add_section( 'footer', [
	'title'          => __( 'Footer' , 'plant'),
	'description'    => __( 'These settings will be disabled if using Widgets in Footbar or creating Page with "footer" slug.','plant' ),
	'panel'          => '',
	'priority'       => 90,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
Kirki::add_section( 'general', [
	'title'          => __( 'Other' , 'plant'),
	'description'    => __( 'Layouts and other settings', 'plant' ),
	'panel'          => '',
	'priority'       => 91,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );



/* HEADER */

Kirki::add_field( 'plant', [
	'settings'    => 'header_style_d',
    'label'       => __( 'Header Style', 'plant' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'autoshow',
	'priority'    => 10,
	'choices'     => [
        'autoshow' => esc_html__( 'Auto Show', 'plant' ),
        'fixed'     => esc_html__( 'Fixed', 'plant' ),
        'standard'  => esc_html__( 'Standard', 'plant' ),      
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'header_layout',
	'label'       => __( 'Header Layout', 'plant' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'menu',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'left-logo'		=> esc_attr__( 'Left Logo', 'plant' ),
        'top-logo'  	=> esc_attr__( 'Top Logo', 'plant' ),
        'center-menu'  	=> esc_attr__( 'Center Menu', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
    'settings'    => 'head_height_d',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Header Height', 'kirki' ),
	'section'     => 'header',
	'default'     => '70px',
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-header, .site-header-space, .site-header > .s-container',
            'property'  	=> 'height',
		],
    ],
] );
Kirki::add_field( 'plant', [
    'settings'    => 'head_logo_height_d',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Logo Height', 'kirki' ),
	'section'     => 'header',
	'default'     => '50px',
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'max-height',
		],
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'height',
        ],
    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'dimension',
	'settings'    => 'head_logo_padding_top',
	'label'       => esc_html__( 'Logo Top Space', 'plant' ),
	'section'     => 'header',
	'default'     => '20px',
    'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'  		=> '.site-header.-top-logo .site-branding',
			'property' 		=> 'padding-top',
		],
	],
] );
Kirki::add_field( 'plant', [
	'type'        => 'dimension',
	'settings'    => 'head_nav_height',
	'label'       => esc_html__( 'Menu Height', 'plant' ),
	'section'     => 'header',
	'default'     => '60px',
    'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output' => [
		[
			'element'  => '.site-header.-top-logo .site-nav-d, .site-header.-top-logo .site-action',
			'property' => 'height',
		],
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'  => '.site-header.-top-logo .site-branding',
			'property' => 'height',
			'prefix'    => 'calc(100% - ',
            'suffix'    => ')',
		],
	],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'hide_title',
	'label'       => __( 'Hide Site Title?', 'plant' ),
	'section'     => 'header',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'head_shadow',
	'label'       => __( 'Has Shadow?', 'plant' ),
	'section'     => 'header',
	'type'        => 'toggle',
    'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'color',
	'settings'    => 'head_shadow_color',
	'label'       => __( 'Shadow Color', 'plant' ),
	'section'     => 'header',
	'default'     => 'rgba(0,0,0,0.2)',
	'choices'     => [
		'alpha' => true,
    ],
    'active_callback' => [
	    [
		'setting'  => 'head_shadow',
		'operator' => '==',
		'value'    => true,
        ]
    ]
] );
Kirki::add_field( 'plant', [
	'type'        => 'slider',
	'settings'    => 'head_shadow_blur',
	'label'       => esc_html__( 'Shadow Blur', 'plant' ),
	'section'     => 'header',
	'default'     => 1,
	'choices'     => [
		'min'  => 1,
		'max'  => 30,
		'step' => 1,
    ],
    'active_callback' => [
	    [
		'setting'  => 'head_shadow',
		'operator' => '==',
		'value'    => true,
        ]
    ]
] );
Kirki::add_field( 'plant', [
	'settings'    => 'header_action',
    'label'       => __( 'Action Icon', 'plant' ),
	'section'     => 'header',
	'type'        => 'multicheck',
	'default'     => array('search'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'search'  	=> esc_attr__( 'Search', 'plant' ),
        'cart'      => esc_attr__( 'Cart', 'plant' ),
        'my-account'=> esc_attr__( 'My Account', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'cart_icon',
	'label'       => __( 'Cart Icon', 'plant' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'cart',
	'priority'    => 10,
	'choices'     => [
        'cart'		=> '<i class="si-cart"></i>',
        'cart-o'    => '<i class="si-cart-o"></i>',
        'basket'	=> '<i class="si-basket"></i>',
        'basket-alt'=> '<i class="si-basket-alt"></i>',
        'bag'       => '<i class="si-bag"></i>',
        'bag-alt'   => '<i class="si-bag-alt"></i>',
    ],
    'active_callback' => [
	    [ 
		    'setting'  => 'header_action',
		    'operator' => 'in',
		    'value'    => array('cart'),
	    ]
    ],
] );
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'head_colors',
    'label'       => esc_html__( 'Link Colors', 'plant' ),
    'section'     => 'header',
    'priority'    => 10,
    'choices'     => [
        'link'    	=> esc_html__( 'Link', 'plant' ),
        'hover'   	=> esc_html__( 'Link: Hover', 'plant' ),
		'active'  	=> esc_html__( 'Link: Active', 'plant' ),
		'active_bg' => esc_html__( 'Link: Active Background', 'plant' ),
    ],
    'default'     	=> [
        'link'    	=> '#242d2e',
        'hover'   	=> '#0f6b4e',
		'active'  	=> '#878f9d',
		'active_bg' => 'rgba(255,255,255,0)',
	],
	'output' => [
		[
			'choice'   => 'link',
			'element'  => '.site-header, .site-header a, .site-nav-d .sub-menu li > a',
			'property' => 'color',
        ],
        [
			'choice'   => 'link',
			'element'  => '.site-toggle b, .site-toggle b:after, .site-toggle b:before',
			'property' => 'background-color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-header a:hover, .site-nav-d .sub-menu li > a:hover',
			'property' => 'color',
        ],
		[
			'choice'   => 'active',
			'element'  => '.site-header a:active, .site-nav-d li.current-menu-item > a, .site-nav-d li.current-menu-ancestor > a, .site-nav-d li.current_page_item > a',
			'property' => 'color',
		],
		[
			'choice'   => 'active_bg',
			'element'  => '.site-header li:active, .site-nav-d li.current-menu-item, .site-nav-d li.current-menu-ancestor, .site-nav-d li.current_page_item',
			'property' => 'background-color',
		],
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'header_effect',
    'label'       => __( 'Header Effect on Homepage', 'plant' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'none',
	'priority'    => 10,
	'choices'     => [
        'none' 		=> esc_html__( 'None', 'plant' ),
        'slide-in'  => esc_attr__( 'Slide In', 'plant' ),
        'overlay'  	=> esc_attr__( 'Overlay', 'plant' ),
    ],
] );


Kirki::add_field( 'plant', [
    'settings'    => 'header_scroll',
    'type'        => 'number',
	'label'       => esc_html__( 'Scroll before fade in', 'kirki' ),
	'section'     => 'header',
	'default'     => '300',
	'choices'     => [
		'min'  => 1,
		'max'  => 900,
		'step' => 1,
	],
	'active_callback' => [
	    [
		'setting'  => 'header_effect',
		'operator' => '==',
		'value'    => 'slide-in',
        ]
    ]
] );



Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_header_logo_bg',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<div class="_h">Logo Background</div>',
	'priority'    => 10,
	'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
] );
Kirki::add_field( 'plant', [
	'type'        => 'background',
	'settings'    => 'header_logo_bg',
	'section'     => 'header',
	'default'     => [
		'background-color'      => 'rgba(255,255,255,0)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output'      => [
		[
			'element' => '.site-header.-top-logo .site-branding ',
        ],
    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_header_bg',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<style type="text/css">._h{background-color: rgba(0,0,0,0.4);padding: 3px 12px;margin:6px -12px 0;color:#fff;font-weight: normal;font-size:12px}</style><div class="_h">Header Background</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'background',
	'settings'    => 'header_bg',
	'section'     => 'header',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-header, .site-nav-d .sub-menu',
        ],
    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_mobile',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<div class="_h">For Mobile</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'header_style_m',
    'label'       => __( 'Header Style', 'plant' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'autoshow',
	'priority'    => 10,
	'choices'     => [
        'autoshow' => esc_html__( 'Auto Show', 'plant' ),
        'fixed'     => esc_attr__( 'Fixed', 'plant' ),
        'standard'  => esc_attr__( 'Standard', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
    'settings'    => 'head_height_m',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Header Height', 'kirki' ),
	'section'     => 'header',
    'default'     => '50px',
    'output' => [
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   => '.site-header, .site-header-space',
            'property'  => 'height',
        ],
        [
			'element'   => '.site-nav-m',
            'property'  => 'top',
        ],
        [
			'element'   => '.site-nav-m.active',
            'property'  => 'height',
            'prefix'    => 'calc(100vh - ',
            'suffix'    => ')',
        ],
    ],
] );
Kirki::add_field( 'plant', [
    'settings'    => 'head_logo_height_m',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Logo Height', 'kirki' ),
	'section'     => 'header',
	'default'     => '30px',
	'output' => [
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'max-height',
		],
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'height',
        ],
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'left_area',
	'label'       => __( 'Left Area', 'plant' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'menu',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'menu' 	  => esc_attr__( 'Menu', 'plant' ),
        'search'  => esc_attr__( 'Search', 'plant' ),
        'phone'    => esc_attr__( 'Phone', 'plant' ),
        'custom'  => esc_attr__( 'Custom', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
	'type'     => 'text',
	'settings' => 'left_area_phone',
	'label'    => esc_html__( 'Phone No.', 'plant' ),
	'section'  => 'header',
    'priority' => 10,
    'active_callback' => [
	    [
		'setting'  => 'left_area',
		'operator' => '==',
		'value'    => 'phone',
        ]
    ]
] );
Kirki::add_field( 'plant', [
	'type'     => 'code',
	'settings' => 'left_area_custom',
	'label'    => esc_html__( 'Custom HTML', 'plant' ),
	'section'  => 'header',
    'priority' => 10,
    'choices'     => [
		'language' => 'html',
	],
    'active_callback' => [
	    [
		'setting'  => 'left_area',
		'operator' => '==',
		'value'    => 'custom',
        ]
    ]
] );
Kirki::add_field( 'plant', [
	'settings'    => 'right_area',
	'label'       => __( 'Right Area', 'plant' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'search',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'menu' 	  => esc_attr__( 'Menu', 'plant' ),
        'search'  => esc_attr__( 'Search', 'plant' ),
        'phone'    => esc_attr__( 'Phone', 'plant' ),
        'custom'  => esc_attr__( 'Custom', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
	'type'     => 'text',
	'settings' => 'right_area_phone',
	'label'    => esc_html__( 'Phone No.', 'plant' ),
	'section'  => 'header',
    'priority' => 10,
    'active_callback' => [
	    [
		'setting'  => 'right_area',
		'operator' => '==',
		'value'    => 'phone',
        ]
    ]
] );
Kirki::add_field( 'plant', [
	'type'     => 'code',
	'settings' => 'right_area_custom',
	'label'    => esc_html__( 'Custom HTML', 'plant' ),
	'section'  => 'header',
    'priority' => 10,
    'choices'     => [
		'language' => 'html',
	],
    'active_callback' => [
	    [
		'setting'  => 'right_area',
		'operator' => '==',
		'value'    => 'custom',
        ]
    ]
] );
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'menu_colors',
    'label'       => esc_html__( 'Menu Colors', 'plant' ),
    'section'     => 'header',
    'priority'    => 10,
    'choices'     => [
        'bg'      => esc_html__( 'Background', 'plant' ),
        'link'    => esc_html__( 'Link', 'plant' ),
        'hover'   => esc_html__( 'Link: Hover', 'plant' ),
		'active'  => esc_html__( 'Link: Active', 'plant' ),
		'border'  => esc_html__( 'Border', 'plant' ),
    ],
    'default'     => [
        'bg'      => '#242d2e',
        'link'    => 'rgba(255,255,255,0.9)',
        'hover'   => 'rgba(255,255,255,1)',
		'active'  => 'rgba(255,255,255,0.6)',
		'border'  => 'rgba(255,255,255,0.15)',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.site-nav-m.active',
			'property' => 'background-color',
        ],
        [
			'choice'   => 'link',
			'element'  => '.site-nav-m li a',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-nav-m li a:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'active',
			'element'  => '.site-nav-m li a:active, .site-nav-m li.current-menu-item a, .site-nav-m li.current-menu-ancestor a, .site-nav-m li.current_page_item a',
			'property' => 'color',
		],
		[
			'choice'   => 'border',
			'element'  => '.site-nav-m li',
			'property' => 'border-bottom-color',
        ],
    ],
] );




/* BODY */
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'body_colors',
    'label'       => esc_html__( 'Link Colors', 'plant' ),
    'section'     => 'body',
    'priority'    => 10,
    'choices'     => [
        'link'    => esc_html__( 'Link', 'plant' ),
        'hover'   => esc_html__( 'Link: Hover', 'plant' ),
        'active'  => esc_html__( 'Link: Active', 'plant' ),
    ],
    'default'     => [
        'link'    => '#0f6b4e',
        'hover'   => '#60c760',
        'active'  => '#878f9d',
	],
	'output' => [
		[
			'choice'   => 'link',
			'element'  => 'a',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => 'a:hover',
			'property' => 'color',
		],
        [
			'choice'   => 'active',
			'element'  => 'a:active',
			'property' => 'color',
        ],
        ],
] );
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'body_bg',
    'label'       => esc_html__( 'Background Color', 'plant' ),
    'section'     => 'body',
    'priority'    => 10,
    'choices'     => [
		'home'      => esc_html__( 'Homepage', 'plant' ),
		'other'      => esc_html__( 'Other pages', 'plant' ),
    ],
    'default'     => [
		'home'    => '#ffffff',
		'other'    => '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'home',
			'element'  => 'body.home',
			'property' => 'background',
		],
		[
			'choice'   => 'other',
			'element'  => 'body',
			'property' => 'background',
		],
	],
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_blog',
	'label'       => '',
	'section'     => 'body',
	'default'     => '<div class="_h">For Single Post</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_profile',
	'label'       => __( 'Show Author Profile?', 'plant' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_comments',
	'label'       => __( 'Enable WP Comments?', 'plant' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_layout_single',
	'label'       => __( 'Sidebar', 'plant' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'full-width',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'full-width' => esc_attr__( 'No Sidebar', 'plant' ),
		'rightbar'   => esc_attr__( 'Right Sidebar', 'plant' ),
		'leftbar'    => esc_attr__( 'Left Sidebar', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_card',
	'label'       => '',
	'section'     => 'body',
	'default'     => '<div class="_h">For Archive</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'radio-buttonset',
	'settings'    => 'blog_columns_d',
	'label'       => __( 'Columns on Desktop', 'plant' ),
	'section'     => 'body',
	'default'     => '3',
	'choices'     => [
		'1'	=> '1',
		'2'	=> '2',
		'3'	=> '3',
		'4'	=> '4',
		'5'	=> '5',
		'6'	=> '6',
    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'radio-buttonset',
	'settings'    => 'blog_columns_m',
	'label'       => __( 'Columns on Mobile', 'plant' ),
	'section'     => 'body',
	'default'     => '1',
	'choices'     => [
		'1'	=> '1',
		'2'	=> '2',
		'3'	=> '3',
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_archive_profile',
	'label'       => __( 'Show Author Name?', 'plant' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '1',
    'priority'    => 10
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_template',
	'label'       => __( 'Template', 'plant' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'card',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'card' 		=> esc_attr__( 'Card', 'plant' ),
		'list' 		=> esc_attr__( 'List', 'plant' ),
		'hero' 		=> esc_attr__( 'Hero', 'plant' ),
		'caption' 	=> esc_attr__( 'Caption', 'plant' ),
    ],
] );
Kirki::add_field( 'plant', [
	'settings'    => 'blog_layout',
	'label'       => __( 'Sidebar', 'plant' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'standard',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'full-width' => esc_attr__( 'No Sidebar', 'plant' ),
		'rightbar' => esc_attr__( 'Right Sidebar', 'plant' ),
		'leftbar'   => esc_attr__( 'Left Sidebar', 'plant' ),
    ],
] );

/* WOOCOMMERCE */

if ( class_exists( 'WooCommerce' ) ) {
	
	Kirki::add_field( 'plant', [
		'settings'    => 'shop_layout',
		'label'       => __( 'Shop Layout', 'plant' ),
		'section'     => 'shop',
		'type'        => 'select',
		'default'     => 'full-width',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'full-width' => esc_attr__( 'No Sidebar', 'plant' ),
			'rightbar' => esc_attr__( 'Right Sidebar', 'plant' ),
			'leftbar'   => esc_attr__( 'Left Sidebar', 'plant' ),
        ],
	] );
	Kirki::add_field( 'plant', [
		'settings' => 'shop_border_color',
		'label'    => __( 'Shop Highlight Border', 'plant' ),
		'description' => __( 'Show on Product Detail and Checkout', 'plant' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#222',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#main .related.products > h2, #main .wc-tabs li.active, #main .wc-tabs li:hover',
				'property' => 'border-top-color',
            ],
			[
				'element'  => '#main #order_review_heading, #main #order_review',
				'property' => 'border-color',
            ],
			[
				'element'  => '#content #main .woocommerce-pagination .current, #content #main .woocommerce-pagination .page-numbers:hover, #content #main .woocommerce-pagination .page-numbers:focus',
				'property' => 'border-color',
            ],
			[
				'element'  => '#content #main .woocommerce-pagination .current, #content #main .woocommerce-pagination .page-numbers:hover, #content #main .woocommerce-pagination .page-numbers:focus',
				'property' => 'color',
            ],
        ],
	] );
	Kirki::add_field( 'plant', [
		'settings' => 'shop_badge_color',
		'label'    => __( 'Sale Badge Color', 'plant' ),
		'description' => __( 'Show on Product Archive and Detail', 'plant' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#c30',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#page .onsale',
				'property' => 'background-color',
            ],
		],
	] );
	Kirki::add_field( 'plant', [
		'settings' => 'shop_price_color',
		'label'    => __( 'Price Color', 'plant' ),
		'description' => __( 'Show on Product Archive and Detail', 'plant' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#222',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#main .price',
				'property' => 'color',
            ],
        ],
	] );

	Kirki::add_field( 'plant', [
		'settings'    => 'shop_pagebuilder',
		'label'       => __( 'Page Builder on Shop Page?', 'plant' ),
		'description' => __( 'Show only content, not products list on Shop page.', 'plant' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '0',
		'priority'    => 10,
	] );
	Kirki::add_field( 'plant', [
		'settings'    => 'shop_hide_addtocart',
		'label'       => __( 'Hide Add to Cart Button?', 'plant' ),
		'description' => __( 'On Product Archive page.', 'plant' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '1',
		'priority'    => 10,
	] );
	Kirki::add_field( 'plant', [
		'settings'    => 'shop_hide_related',
		'label'       => __( 'Hide Related Products?', 'plant' ),
		'description' => __( 'On Product Detail page.', 'plant' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'plant', [
		'type'        => 'number',
		'settings'    => 'shop_products',
		'label'       => __( 'Products Per Page', 'plant' ),
		'description' => __( 'Save and refresh to see the result.', 'plant' ),
		'section'     => 'shop',
		'default'     => 12,
		'choices'     => [
			'min'  => '1',
			'max'  => '99',
			'step' => '1',
        ],
	] );
}

/* FOOTER */
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'footer_colors',
    'label'       => esc_html__( 'Footer Colors', 'plant' ),
    'section'     => 'footer',
    'priority'    => 10,
    'choices'     => [
		'bg'      => esc_html__( 'Background', 'plant' ),
		'text'    => esc_html__( 'Text', 'plant' ),
        'link'    => esc_html__( 'Link', 'plant' ),
        'hover'   => esc_html__( 'Link: Hover', 'plant' ),
		'active'  => esc_html__( 'Link: Active', 'plant' ),
    ],
    'default'     => [
		'bg'      => 'rgba(0,0,0,0.03)',
		'text'    => 'rgba(0,0,0,0.5)',
        'link'    => 'rgba(0,0,0,0.5)',
        'hover'   => 'rgba(0,0,0,0.6)',
		'active'  => 'rgba(0,0,0,0.3)',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.site-footer',
			'property' => 'background-color',
		],
		[
			'choice'   => 'text',
			'element'  => '.site-footer .site-info',
			'property' => 'color',
		],
		[
			'choice'   => 'link',
			'element'  => '.site-footer a',
			'property' => 'color',
		],
        [
			'choice'   => 'link',
			'element'  => '.site-footer a',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-footer a:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'active',
			'element'  => '.site-footer a:active',
			'property' => 'color',
		],
    ],
] );

Kirki::add_field( 'plant', [
	'type'     => 'textarea',
	'settings' => 'foot_note',
	'label'    => __( 'Note', 'plant' ),
	'section'  => 'footer',
	'default'  => esc_attr__( '©' .  date("Y") . ' ' . $_SERVER['HTTP_HOST'] . '. All rights reserved.', 'plant' ),
	'priority' => 10,
] );

/* Other */
Kirki::add_field( 'plant', [
	'settings'    => 'fontawesome',
	'label'       => __( 'Load Font Awesome 5?', 'plant' ),
	'description'    => __( 'Save and refresh to see.', 'plant' ),
	'section'     => 'general',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'settings'    => 'show_admin_bar',
	'label'       => __( 'Show Admin Bar?', 'plant' ),
	'description'    => __( 'Save and refresh to see.', 'plant' ),
	'section'     => 'general',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_button_alt',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<div class="_h">Action Button</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_button_alt_desc',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<small><i>WooCommerce large button and .s-button, .button.alt</i></small>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'button_alt_colors',
    'label'       => esc_html__( 'Button Colors', 'plant' ),
    'section'     => 'general',
    'priority'    => 10,
    'choices'     => [
        'bg'      	=> esc_html__( 'Background', 'plant' ),
        'bg_hover'  => esc_html__( 'Background: Hover', 'plant' ),
        'link'   	=> esc_html__( 'Text', 'plant' ),
		'link_hover'=> esc_html__( 'Text: Hover', 'plant' ),
    ],
    'default'     => [
        'bg'      	=> '#0f6b4e',
        'bg_hover'  => '#60c760',
        'link'   	=> '#ffffff',
		'link_hover'=> '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.woocommerce .button.alt, #page.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'background',
		],
		[
			'choice'   => 'bg',
			'element'  => '.s-modal .search-form',
			'property' => 'border-bottom-color',
		],
		[
			'choice'   => 'bg',
			'element'  => '.s-modal-close:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'bg_hover',
			'element'  => '.woocommerce .button.alt:hover, #page.site .button.alt:hover, .site .s-button a:hover, .site a.s-button:hover',
			'property' => 'background',
		],
		[
			'choice'   => 'link',
			'element'  => '.woocommerce .button.alt, #page.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'color',
		],
		[
			'choice'   => 'link_hover',
			'element'  => '.woocommerce .button.alt:hover, #page.site .button.alt:hover, .site .s-button a:hover, .site a.s-button:hover',
			'property' => 'color',
		],

    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'dimension',
	'settings'    => 'button_alt_border_radius',
	'label'       => esc_html__( 'Border Radius', 'plant' ),
	'section'     => 'general',
	'default'     => '50px',
	'output' => [
		[
			'element'  => '.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'border-radius',
		],
	],
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_button',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<div class="_h">Plain Button</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_button_desc',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<small><i>For .button: WooCommerce small button.</i></small>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
    'type'        => 'multicolor',
    'settings'    => 'button_colors',
    'label'       => esc_html__( 'Button Colors', 'plant' ),
    'section'     => 'general',
    'priority'    => 10,
    'choices'     => [
        'bg'      	=> esc_html__( 'Background', 'plant' ),
        'bg_hover'  => esc_html__( 'Background: Hover', 'plant' ),
        'link'   	=> esc_html__( 'Text', 'plant' ),
		'link_hover'=> esc_html__( 'Text: Hover', 'plant' ),
    ],
    'default'     => [
        'bg'      	=> '#878f9d',
        'bg_hover'  => '#575f6d',
        'link'   	=> '#ffffff',
		'link_hover'=> '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.woocommerce .button:not(.kt-button), #page .button:not(.kt-button)',
			'property' => 'background',
        ],
        [
			'choice'   => 'bg_hover',
			'element'  => '.woocommerce .button:not(.kt-button):hover, #page .button:not(.kt-button):hover',
			'property' => 'background',
		],
		[
			'choice'   => 'link',
			'element'  => '.woocommerce .button:not(.kt-button), #page .button:not(.kt-button)',
			'property' => 'color',
		],
		[
			'choice'   => 'link_hover',
			'element'  => '.woocommerce .button:not(.kt-button):hover, #page .button:not(.kt-button):hover',
			'property' => 'color',
		],

    ],
] );
Kirki::add_field( 'plant', [
	'type'        => 'dimension',
	'settings'    => 'button_border_radius',
	'label'       => esc_html__( 'Border Radius', 'plant' ),
	'section'     => 'general',
	'default'     => '50px',
	'output' => [
		[
			'element'  => '#page .button:not(.kt-button)',
			'property' => 'border-radius',
		],
	],
] );




Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_thumbsize',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<div class="_h">Thumbnail Size</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'custom',
	'settings'    => 'h_thumbsize_desc',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<small><i>Save and use <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a> plugin</i></small>',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'toggle',
	'settings'    => 'thumbsize_crop',
	'label'       => __( 'Crop Thumbnail?', 'plant' ),
	'section'     => 'general',
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( 'plant', [
	'type'        => 'dimensions',
	'settings'    => 'thumbsize',
	'label'       => __( '', 'plant' ),
	'section'     => 'general',
	'default'     => [
		'width'  => '350',
		'height' => '184',
	],
] );











/*
 * Convert Color Funtion
 */
function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	if(empty($color)) return $default; 
	if ($color[0] == '#' ) { $color = substr( $color, 1 );}
	if (strlen($color) == 6) {$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );} 
	elseif ( strlen( $color ) == 3 ) {$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );} 
	else {return $default;}
	$rgb =  array_map('hexdec', $hex);
	if($opacity){ if(abs($opacity) > 1) $opacity = 1.0; $output = 'rgba('.implode(",",$rgb).','.$opacity.')';} 
	else { $output = 'rgb('.implode(",",$rgb).')';}
	return $output;
}

/*
 * Hide Admin Bar
 */
$show_admin_bar  = get_theme_mod( 'show_admin_bar', '0' );
if ($show_admin_bar) { 
	$GLOBALS['s_admin_bar']  = 'show';
} else {
	$GLOBALS['s_admin_bar']  = 'hide';
}

/*
 * Load Font Awesome
 */
function fontawesome_scripts() {
	wp_enqueue_style( 'seed-fontawesome', get_template_directory_uri() . '/vendor/fonts/font-awesome/css/fontawesome-all.min.css' );
}
if (get_theme_mod( 'fontawesome', '0' )) {
	add_action( 'wp_enqueue_scripts', 'fontawesome_scripts' );	
}


/*
 * WooCommerce
 */

/* Display x products per page */
if ( class_exists( 'WooCommerce' ) ) {
	$GLOBALS['shop_products'] = get_theme_mod( 'shop_products', '12' );
	add_filter( 'loop_shop_per_page', 'seed_loop_shop_per_page', 20 );
	function seed_loop_shop_per_page( $cols ) {
		$cols = $GLOBALS['shop_products'];
		return $cols;
	}
}

/*
 * Assign $GLOBALS
 */
if ( ! function_exists( 'plant_var' ) ) {
	function plant_var() {
        $GLOBALS['s_header_style_m']        = get_theme_mod( 'header_style_m', 'autoshow' );
		$GLOBALS['s_header_style_d']        = get_theme_mod( 'header_style_d', 'autoshow' );
        $GLOBALS['s_header_layout']			= get_theme_mod( 'header_layout','left-logo');
        $GLOBALS['s_header_action']			= get_theme_mod( 'header_action', array('search'));
        $GLOBALS['s_cart_icon']			    = get_theme_mod( 'cart_icon', 'cart');
        $GLOBALS['s_left_area']             = get_theme_mod( 'left_area', 'menu' );
        $GLOBALS['s_left_area_phone']       = get_theme_mod( 'left_area_phone', '' );
        $GLOBALS['s_left_area_custom']      = get_theme_mod( 'left_area_custom', '' );
        $GLOBALS['s_right_area']            = get_theme_mod( 'right_area', 'search' );
        $GLOBALS['s_right_area_phone']      = get_theme_mod( 'right_area_phone', '' );
        $GLOBALS['s_right_area_custom']     = get_theme_mod( 'right_area_custom', '' );
		$GLOBALS['s_blog_columns_m']        = get_theme_mod( 'blog_columns_m', '1' );
		$GLOBALS['s_blog_columns_d']        = get_theme_mod( 'blog_columns_d', '3' );
		$GLOBALS['s_header_effect']			= get_theme_mod( 'header_effect','none');
        $GLOBALS['s_header_scroll']    		= get_theme_mod( 'header_scroll', '300' );
        $GLOBALS['s_blog_layout_single']    = get_theme_mod( 'blog_layout_single', 'full-width' );
        $GLOBALS['s_blog_layout']           = get_theme_mod( 'blog_layout', 'full-width' );
		$GLOBALS['s_blog_profile']      	= (get_theme_mod( 'blog_profile', '1' ))? 'enable' : 'disable';
		$GLOBALS['s_blog_archive_profile']  = (get_theme_mod( 'blog_archive_profile', '1' ))? 'enable' : 'disable';
		$GLOBALS['s_wp_comments']  			= (get_theme_mod( 'blog_comments', '0' ))? 'enable' : 'disable';
		$GLOBALS['s_blog_template']    		= get_theme_mod( 'blog_template', 'card' );
        $GLOBALS['s_shop_pagebuilder']      = get_theme_mod( 'shop_pagebuilder', '0' );
        $GLOBALS['s_shop_layout']           = get_theme_mod( 'shop_layout', 'full-width' );
        $GLOBALS['s_footer']                = get_theme_mod( 'foot_note', '©' .  date("Y") . ' ' . $_SERVER['HTTP_HOST'] . '. All rights reserved.' );
        $GLOBALS['s_logo_overlay ']         = get_theme_mod('logo_overlay' , '');
        $thumbsize                          = get_theme_mod( 'thumbsize', array('width'   => '350','height'  => '184'));
        $GLOBALS['s_thumb_width']           = $thumbsize['width'];
        $GLOBALS['s_thumb_height']          = $thumbsize['height'];
        $GLOBALS['s_thumb_crop']            = get_theme_mod( 'thumbsize_crop', '1' );
    }
}
plant_var();

/*
 * Assign CSS in header.php.
 */
if ( ! function_exists( 'plant_css' ) ) {
	function plant_css() {
		$header_style_m         = get_theme_mod( 'header_style_m','autoshow');
        $header_style_m         = get_theme_mod( 'header_style_m','autoshow');
		$header_style_d         = get_theme_mod( 'header_style_d','autoshow');
		$header_layout			= get_theme_mod( 'header_layout','left-logo');
		$header_bg 				= get_theme_mod( 'header_bg',array('background-color'   => '#ffffff'));
		$header_effect			= get_theme_mod( 'header_effect','none');
        $head_height_m          = get_theme_mod( 'head_height_m','50px');
        $head_height_d          = get_theme_mod( 'head_height_d','70px');
        $head_shadow 			= get_theme_mod( 'head_shadow','0');
        $head_shadow_color  	= get_theme_mod( 'head_shadow_color','rgba(0,0,0,0.15)');
		$head_shadow_blur       = get_theme_mod( 'head_shadow_blur','1');
        $hide_title 			= get_theme_mod( 'hide_title','0');
        $blog_archive_profile   = get_theme_mod( 'blog_archive_profile','1');
		
		$shop_hide_addtocart 	= get_theme_mod('shop_hide_addtocart' , '1');
		$shop_hide_related 		= get_theme_mod('shop_hide_related' , '0');

		echo '<style id="kirki_css" type="text/css">';

        if ($header_style_m == 'standard') {
			echo '.site-header{position:absolute;}';
        } else {
            echo '.site-header{position:fixed;}';
        }

        // MOBILE
        echo '@media(max-width:991px){';
        echo '.s-autoshow-m.-hide{transform: translateY(-' . $head_height_m . ')}';
        echo '.s-autoshow-m.-show{transform: translateY(0)}';
        echo '}';
        
        // DESKTOP
		echo '@media(min-width:992px){';
        if ($header_style_d == 'standard') {
			echo '.site-header{position: absolute;}';
        } else {
            echo '.site-header{position: fixed;}';
        }
        echo '.s-autoshow-d.-hide{transform: translateY(-' . $head_height_d . ')}';
		echo '.s-autoshow-d.-show{transform: translateY(0)}';
		switch ($header_layout) {
			case 'top-logo':
				echo '.site-branding{flex: 0 0 100%;justify-content: center}.site-action{margin-right:auto}';
				break;
			case 'center-menu':
				echo '.site-nav-d{margin-right:auto}';
				break;
			default:
				break;
		}
		echo '.site-nav-d .sub-menu::before{border-bottom-color:' . $header_bg['background-color'] . '}';
		echo '}';

		if ($hide_title) {
			echo '.site-title{display:none}';
		}
		if (!$head_shadow) {
			echo '.site-header{box-shadow:none;}'; 
		} else {
			echo '.site-header{box-shadow: 0 0 ' . $head_shadow_blur . 'px ' . $head_shadow_color .  '}'; 
		}
		switch ($header_effect) {
			case 'slide-in':
				echo 'body.home .site-header-space{display:none}body.home .site-header{opacity:0;}body.home .site-header.-active{opacity:1;transform: translateY(0)}body.home .site-header.-not-active{opacity:0;transform:translateY(-' . $head_height_d . ')}';
				break;
			case 'overlay':
				echo 'body.home .site-header-space{display:none}body.home .site-header:not(.-active){background:none;}';
				break;
			default:
				break;
		}
        if (!$blog_archive_profile) {
            echo '.content-item .byline,.content-item a.author{display:none}.content-item.-card{padding-bottom:15px}';
        }
		if ($shop_hide_addtocart) {
			echo '#main .add_to_cart_button {display:none;}';
		}
		if ($shop_hide_related) {
			echo '#main .related.products{display:none;}';
		}
		echo '</style>';

	}
}