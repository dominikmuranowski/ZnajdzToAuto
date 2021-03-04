<?php

// Constants
    define('ROOT', get_template_directory_uri());
    define('IMAGES', ROOT . '/images');
    define('STYLES', ROOT . '/styles/css');
    define('SCRIPTS', ROOT . '/scripts');

    // Add styles
    function theme_styles() {
        wp_enqueue_style( 'animate', STYLES . '/animate.css' );
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet');
        wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css');
        wp_enqueue_style( 'bx-slider', STYLES . '/bx-slider.css' );
        wp_enqueue_style( 'styles', ROOT . '/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'theme_styles' );


    // Add scripts
    function theme_scripts() {
        wp_enqueue_script( 'bootstrap', SCRIPTS . '/bootstrap.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script( 'bx-slider', SCRIPTS . '/bx-slider.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script( 'scripts', SCRIPTS . '/scripts.js', array('jquery'), '1.0', true);
        
    }

    add_action( 'wp_enqueue_scripts', 'theme_scripts' );



    //Add menus

    function register_my_menus(){
        register_nav_menus(
            array(
                "main-menu" => "Main menu",
                "header-menu" => "Header menu",
                "footer-menu" => "Footer menu"
            )
        );
    }
    
    add_action("init", "register_my_menus");



    // Enable post thumbnails
    add_theme_support( 'post-thumbnails' );

    
         // Add Custom Post Type - moj taki byl zanim dodalam Dominika
    // function add_custom_post_types() {         
    //     $ads_args = array(
    //         'label'               => 'Ads',
    //         'labels'              => array('name' => 'Ads', 'menu_name' => 'Ads'),
    //         'supports'            => array( 'title', 'thumbnail', 'editor' ),
    //         'public'              => true,
    //         'exclude_from_search' => false,
    //         'menu_position'       => 20,
    //         'menu_icon'           => 'dashicons-admin-post',
    //         'taxonomies'          => array('ads_cats')
    //     );

    //     register_post_type( 'ads', $ads_args );
    // }
    // add_action( 'init', 'add_custom_post_types', 0);       


    // od tej lini dodane z functions Dominika
        //Add Post
        function add_post($title, $desc, $name, $insert_email, $phone, $category, $image){
            $id = wp_insert_post(array(
                 "post_type" => "advertisement",
                 "post_title" => $title,
                 'post_content'=> $desc,
                 "post_status" => "Draft"
             ));
             wp_set_object_terms($id, (int)$category, 'addition_cats');
             update_field('nazwa_sprzedajacego', $name, $id );
             update_field('podaj_email', $insert_email, $id );
             update_field('podaj_telefon', $phone, $id );
             update_field('dodaj_zdjecie', get_home_url() . "/wp-content/uploads/" . $image, $id);
     
             return $id;
             }
     
          // Add Custom Taxonomy
          function add_custom_taxonomy() {  
             $addition_cats_args = array(
                 'hierarchical' => true,
                 'label' => 'Kategorie ogłoszeń',
                 'labels' => array('name' => 'Kategorie ogłoszeń', 'menu_name' => 'Kategorie ogłoszeń')
             );
     
             register_taxonomy('addition_cats', array('advertisement'), $addition_cats_args);
         }    
         add_action( 'init', 'add_custom_taxonomy', 0 );

                 // Add Custom Post Type

        function add_custom_post_types() {         
            $addition_args = array(
                'label'                => 'Ogłoszenia',
                'labels'              => array('name' => 'advertisement', 'menu_name' => 'Ogłoszenia'),
                'supports'            => array( 'title','editor','custom-fields'),
                'public'              => true,
                'exclude_from_search' => false,
                'menu_position'       => 20,
                'menu_icon'           => 'dashicons-admin-post',
                'taxonomies'          => array('addition_cats')
            );
    
            register_post_type( 'advertisement', $addition_args );
        }
        add_action( 'init', 'add_custom_post_types', 0);

        
function save_file($file) {
    $target_dir = realpath(".") . "/wp-content/uploads/";
    $target_file_name = "upload_" . uniqid() ."_" . basename($file["name"]);
    $target_file = $target_dir . $target_file_name;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $message = "";
    
    if(isset($_POST["submit"])) {
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            $message = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $message = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($file["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $message = "The file ". $target_file_name . " has been uploaded.";
            return $target_file_name;
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
