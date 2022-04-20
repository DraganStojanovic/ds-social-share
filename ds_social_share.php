<?php

/*
Plugin Name: Social Share buttons
Plugin URI: https://www.google.com
Description: Displays Social Share icons below every post and page
Version: 0.0.1
Author: Dragan
*/
function ds_social_share()
{
    add_submenu_page("options-general.php", "Social Share", "Social Share", "manage_options", "social-share", "social_share_page");
}

add_action("admin_menu", "ds_social_share");

//function ds_social_share_color()
//{
//    add_submenu_page("options-general.php", "Social Share Color", "Social Share Color", "manage_options", "social-share-color", "social_share_color_page");
//}
//
//add_action("admin_menu", "ds_social_share_color");


function social_share_page()
{
    ?>
    <div class="wrap">
        <h1>Social Sharing Options</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields("social_share_config_section");

            do_settings_sections("social-share");

            submit_button();
            ?>
        </form>
    </div>
    <br>
    <hr>
    <div class="wrap">
        <h1>Social Color Sharing Options</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields("ss_config_change_color_section");

            do_settings_sections("social-share-color");

            submit_button();
            ?>
        </form>
    </div>


    <?php
}

//function social_share_color_page()
//{
//    ?>
<!--    <div class="wrap">-->
<!--        <h1>Social Color Sharing Options</h1>-->
<!---->
<!--        <form method="post" action="options.php">-->
<!--            --><?php
//            settings_fields("ss_config_change_color_section");
//
//            do_settings_sections("social-share-color");
//
//            submit_button();
//            ?>
<!--        </form>-->
<!--    </div>-->
<!---->
<!---->
<!--    --><?php
//}


function social_share_change_color_settings()
{
    add_settings_section("ss_config_change_color_section", "", null, "social-share-color");

    add_settings_field("ss-facebook_change_color", "Do you want to change Facebook color?", "social_share_facebook_change_color", "social-share-color", "ss_config_change_color_section");
    add_settings_field("ss-twitter_change_color", "Do you want to change Twitter color?", "social_share_twitter_change_color", "social-share-color", "ss_config_change_color_section");
    add_settings_field("ss-linkedin_change_color", "Do you want to change LinkedIn color?", "social_share_linkedin_change_color", "social-share-color", "ss_config_change_color_section");
    add_settings_field("ss-google_plus_change_color", "Do you want to change Google+ color?", "social_share_google_plus_change_color", "social-share-color", "ss_config_change_color_section");
    add_settings_field("ss-instagram_change_color", "Do you want to change Instagram color?", "social_share_instagram_change_color", "social-share-color", "ss_config_change_color_section");

    register_setting("ss_config_change_color_section", "ss-facebook_change_color");
    register_setting("ss_config_change_color_section", "ss-twitter_change_color");
    register_setting("ss_config_change_color_section", "ss-linkedin_change_color");
    register_setting("ss_config_change_color_section", "ss-google_plus_change_color");
    register_setting("ss_config_change_color_section", "ss-instagram_change_color");
    register_setting("section", "primary_color");


}


function social_share_settings()
{
    add_settings_section("social_share_config_section", "", null, "social-share");

    add_settings_field("social-share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-linkedin", "Do you want to display LinkedIn share button?", "social_share_linkedin_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-google_plus", "Do you want to display Google+ share button?", "social_share_google_plus_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-instagram", "Do you want to display Instagram share button?", "social_share_instagram_checkbox", "social-share", "social_share_config_section");

    register_setting("social_share_config_section", "social-share-facebook");
    register_setting("social_share_config_section", "social-share-twitter");
    register_setting("social_share_config_section", "social-share-linkedin");
    register_setting("social_share_config_section", "social-share-google_plus");
    register_setting("social_share_config_section", "social-share-instagram");
}


function social_share_facebook_checkbox()
{
    ?>
    <label>
        <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> />
    </label> Check to display
    <br>


    <?php
}

function social_share_facebook_change_color()
{
    ?>
    <label>
<!--        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" />-->
        <input type="text" class="my-color-field" value="<?php echo esc_attr( get_option( 'primary_color', '#bada55' ) ); ?>" />
    </label>
    <?php
}


function social_share_twitter_checkbox()
{
    ?>
    <label>
        <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> />
    </label> Check to display
    <br>

    <?php
}

function social_share_twitter_change_color()
{
    ?>
    <label>
<!--        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff"  />-->
        <input type="text" class="my-color-field" value="<?php echo esc_attr( get_option( 'primary_color', '#effeff' ) ); ?>" />
    </label>
    <?php
}

function social_share_linkedin_checkbox()
{
    ?>
    <label>
        <input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> />
    </label> Check to display
    <br>
    <?php
}

function social_share_linkedin_change_color()
{
    ?>
    <label>
<!--        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" />-->
        <input type="text" class="my-color-field" value="<?php echo esc_attr( get_option( 'primary_color', '#effefh' ) ); ?>" />

    </label>
    <?php
}

function social_share_google_plus_checkbox()
{
    ?>
    <label>
        <input type="checkbox" name="social-share-google_plus" value="1" <?php checked(1, get_option('social-share-google_plus'), true); ?> />
    </label> Check to display
    <br>
    <br>

    <?php
}

function social_share_google_plus_change_color()
{
    ?>
    <label>
<!--        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" />-->
        <input type="text" class="my-color-field" value="<?php echo esc_attr( get_option( 'primary_color', '#eafeff' ) ); ?>" />
    </label>
    <?php
}

function social_share_instagram_checkbox()
{
    ?>
    <label>
        <input type="checkbox" name="social-share-instagram" value="1" <?php checked(1, get_option('social-share-instagram'), true); ?> />
    </label> Check to display
    <br>

    <?php
}

function social_share_instagram_change_color()
{
    ?>
    <label>
<!--        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" />-->
        <input type="text" class="my-color-field" value="<?php echo esc_attr( get_option( 'primary_color', '#efaeff' ) ); ?>" />
    </label>
    <?php
}

    add_action("admin_init", "social_share_settings");
    add_action("admin_init", "social_share_change_color_settings");



function add_social_share_icons($content): string
{
    $html = "<div class='social-share-wrapper'><div class='share-on'>Share on: </div>";

    global $post;

    $url = get_permalink($post->ID);
    $url = esc_url($url);

    if(get_option("social-share-facebook") == 1)
    {
        $html = $html . "<div class='facebook'><a target='_blank' href='https://www.facebook.com/" . $url . "'>Facebook</a></div>";
    }

    if(get_option("social-share-twitter") == 1)
    {
        $html = $html . "<div class='twitter'><a target='_blank' href='https://twitter.com/" . $url . "'>Twitter</a></div>";
    }

    if(get_option("social-share-linkedin") == 1)
    {
        $html = $html . "<div class='linkedin'><a target='_blank' href='https://www.linkedin.com/" . $url . "'>LinkedIn</a></div>";
    }

    if(get_option("social-share-google_plus") == 1)
    {
        $html = $html . "<div class='google_plus'><a target='_blank' href='https://google.com/" . $url . "'>Google+</a></div>";
    }

    if(get_option("social-share-instagram") == 1)
    {
        $html = $html . "<div class='google_plus'><a target='_blank' href='https://instagram.com/" . $url . "'>Instagram</a></div>";
    }
    $html = $html . "<div class='clear'></div></div>";

    return $content . $html;
}


add_filter("the_content", "add_social_share_icons");

function social_share_style()
{
    wp_register_style("social-share-style-file", plugin_dir_url(__FILE__) . "style.css");
    wp_enqueue_style("social-share-style-file");
}
add_action("wp_enqueue_scripts", "social_share_style");

function ds_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'ds_enqueue_color_picker' );




