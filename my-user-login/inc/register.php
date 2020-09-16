<?php

class My_Custom_Register
{
    public function add_shortcode()
    {
        add_shortcode('my-register', [$this, 'display_shortcode']);
    }
    public function display_shortcode($atts = [], $content = '', $tag = '')
    {
        ob_start();
        include __DIR__ . '/../templates/register-form.php';
        $output = ob_get_clean();

        return $output;
    }

    public function register() {
        if(!wp_verify_nonce( $_POST['nonce'], 'my-custom-register' )) {
            $_SESSION['register-errors']['nonce'] = 'Nonce Error';
            $errors = true;
        }
        //$result = wp_create_user($_POST['email'], $_POST['psw']);
        $errors = false;
        if (username_exists($_POST['username'])) {
            $_SESSION['register-errors']['username'] = 'Username exists';
            $errors = true;
        }
        if (email_exists($_POST['email'])) {
            $_SESSION['register-errors']['email'] = 'Email exists';
            $errors = true;
        }

        if($errors) {
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        $user_id = wp_insert_user([
            'user_login' => $_POST['username'],
            'user_email' => $_POST['email']
        ]);
        if($user_id instanceof WP_Error) {
            $_SESSION['register-errors'] = $user_id->get_error_messages();
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
        add_user_meta( $user_id, 'birthday',  $_POST['birthday'] );
        add_user_meta( $user_id, 'phone',  $_POST['phone'] );
        wp_redirect(home_url());


      
    }
}