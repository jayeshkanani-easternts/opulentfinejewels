<?php
include "inc/mainapp.php";
include "inc/content_function.php";
/*   echo $module;
echo $module_id;die;*/
switch ($module) {





    case 'contact-us':
        $pageTitle = "Contact Us";
        $title = "Contact Us" . SITENAME;
        $keyword = $title;
        $description = "Contact Us" . SITENAME;
        $banner = get_banner_image('20');
        if (!empty($banner['image'])) {
            $header_img = DIR_WS_BANNER_PATH . $banner['image'];
        } else {
            $header_img = 'images/default_header_image.jpg';
        }
        if (!empty($banner['mobile_image'])) {
            $mobile_img = DIR_WS_BANNER_PATH . $banner['mobile_image'];
        } else {
            $mobile_img = 'images/default_mobile_header.jpg';
        }
        $breadcrumb_title = "Contact Us";
        $content_include = "content/contact_us.php";
        include DIR_WS_TEMPLATE . "contact_page.tpl.php";
        break;

    case 'works':
        $pageTitle = "Works";
        $title = "Works" . SITENAME;
        $keyword = $title;
        $description = "Works" . SITENAME;
        $banner = get_banner_image('19');
        if (!empty($banner['image'])) {
            $header_img = DIR_WS_BANNER_PATH . $banner['image'];
        } else {
            $header_img = 'images/default_header_image.jpg';
        }
        if (!empty($banner['mobile_image'])) {
            $mobile_img = DIR_WS_BANNER_PATH . $banner['mobile_image'];
        } else {
            $mobile_img = 'images/default_mobile_header.jpg';
        }
        $breadcrumb_title = "Works";
        $content_include = "content/works.php";
        include DIR_WS_TEMPLATE . "work_page.tpl.php";
        break;


    case 'philosophy':
        $pageTitle = "Our Philosophy";
        $title = "Our Philosophy" . SITENAME;
        $keyword = $title;
        $description = "Our Philosophy" . SITENAME;
        $banner = get_banner_image('19');
        if (!empty($banner['image'])) {
            $header_img = DIR_WS_BANNER_PATH . $banner['image'];
        } else {
            $header_img = 'images/default_header_image.jpg';
        }
        if (!empty($banner['mobile_image'])) {
            $mobile_img = DIR_WS_BANNER_PATH . $banner['mobile_image'];
        } else {
            $mobile_img = 'images/default_mobile_header.jpg';
        }
        $breadcrumb_title = "Our Philosophy";
        $content_include = "content/philosophy.php";
        include DIR_WS_TEMPLATE . "philosophy_page.tpl .php";
        break;



    case 'subscribe':
        $pageTitle = "What's happening";
        $title = "What's happening" . SITENAME;
        $keyword = $title;
        $description = "What's happening" . SITENAME;
        $banner = get_banner_image('9');
        if (!empty($banner['image'])) {
            $header_img = DIR_WS_BANNER_PATH . $banner['image'];
        } else {
            $header_img = 'images/default_header_image.jpg';
        }
        if (!empty($banner['mobile_image'])) {
            $mobile_img = DIR_WS_BANNER_PATH . $banner['mobile_image'];
        } else {
            $mobile_img = 'images/default_mobile_header.jpg';
        }
        $breadcrumb_title = "What's happening";
        $content_include = "content/subscribe.php";
        include DIR_WS_TEMPLATE . "common_page.tpl.php";
        break;




        $keyword = $title;
        $description = $title;
        include DIR_WS_TEMPLATE . $template;
        break;
    case 'home':
    default:

        $page = "OFJ";
        $keyword = "OFJ";
        $description = "OFJ";
        $content_include = "content/index.php";
        $pageTitle = "OFJ";
        $title = "OFJ" . SITENAME;;
        include DIR_WS_TEMPLATE . "main_page.tpl.php";
        break;
}

?>