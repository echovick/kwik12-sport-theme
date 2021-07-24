<?php
    session_start();
    if(isset($_POST['submit_contact'])){
        $post_id = '';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $post_id = wp_insert_post(array (
            'ID' => $post_id,
            'post_type' => 'contact-entry',
            'post_title' => 'Message From - '.$email,
            'post_content' => "",
            'post_status' => 'publish',
        ));
    
        update_post_meta($post_id,'person_name',$name);
        update_post_meta($post_id,'person_email',$email);
        update_post_meta($post_id,'message',$message);

        $_SESSION["msg"] = "Thank you for reaching out, You'll be contacted soon";
        $url = site_url('/contact');
        wp_redirect($url);
        exit;
    }
?>