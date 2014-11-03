<?php
    // Get a reference to our CodeIgniter super object
    $CI =& get_instance();

    /**
    * Loads the database and then the model
    */
    function loadModel($model) {
        global $CI;

        $CI->load->database('mysql');
        $CI->load->model($model);
    }

    // /**
    // * Loads the database and model
    // */
    // function loadModel($model) {
    //     global $CI;
    //     loadModel($model);
    //     $CI->load->library('session');
    // }
?>
