<!doctype html><html lang="en">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166239490-1"></script>
    <script>window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-166239490-1');</script>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="Fee Bootstrap Admin Theme with Webpack and Laravel-Mix"/>
    <meta name="keywords" content="bootstrap, admin theme, admin dashboard, jquery, webpack, laravel-mix, template, responsive"/>
    <meta name="author" content="siQuang - Simon Nguyen"/>
    <title>eshop | Admin</title>
    <link rel="icon" type="image/png" sizes="96x96" href="backassets/assets/img/favicon.png">
    
    
<?php $this->load->view('backend/headlink')?> 
<?php $this->load->view('backend/left_sidebar')?>
<?php $this->load->view('backend/nav_head')?>

<!-- main body start -->
<div class="main">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="admin"><i class="ti-home"></i> Dashboard</a>
                </li>
            </ol>
        </div>
    </div> 
    <?php
        $this->load->view($content); 
    ?> 
    
    </div>
        
        <!-- main body end -->

<?php $this->load->view('backend/footer')?>
<?php $this->load->view('backend/footerlink')?>


<?php isset($script) ? $this->load->view($script) : ""; ?>
    