<?php
    require_once('route.php');

    function home(){
        require_once("./home.php");
    }
    function login(){
        require_once("./login.php");
    }
    function about_us(){
        echo 'This is about us page. About Us template in HTML.';
    }
    function contact_us(){
        echo 'This is contact us page. Contact Us template in HTML.';
    }
    function product(){
        require_once("./product.php");
    }
    function page404(){
        die('Page not found. Please try some different url.');
    }
    if($request == 'home' or $request == '')
        home();
    else if($request == 'about-us')
        about_us();
    else if($request == 'contact-us')
        contact_us();
    else if($request == "login")
        login();
    else
        page404();
?>