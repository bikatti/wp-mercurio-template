<?php
/**
 * Custom CSS and Anchor link on wp-admin route
 *
 * @param      mercurio
 * @package    mercurio
 */


function login_logo() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo $image[0]; ?>);
            height: 60px;
            width: 100%;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        #login form, .login form {
            background: none;
            padding: 0;
            border: none;
            box-shadow: none;
        }

        #login {
            margin: 50px auto !important;
            border-radius: 4px;
            box-shadow: 0 3px 9px rgb(0 0 0 / 14%);
            padding: 20px !important;
            background: #fff;
        }

        .login #backtoblog, .login #nav {
            text-align: center;
        }

        .login {
            display: flex;
            justify-content: center;
            height: auto;
        }

        @media screen and (max-width: 550px) {
            #login {
                margin: 25px 20px !important;
            }
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );


function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

 
function login_logo_url_title() {
    return 'Mercurio Revista Digital';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );