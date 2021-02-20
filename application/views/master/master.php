
<!DOCTYPE html>
<html lang="zxx">
<head> 
    <base href="<?=base_url();?>">
   
    <meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>eshop</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
    <link rel="icon" href="frontassets/images/favicon.png">
    
    
    
    <!---------------- section header----------------------->
    <?php $this->load->view('front/header_link')?> 
    <?php $this->load->view('front/header')?> 

    <?php
        $this->load->view($content)
    ?>
    
    <!---------------- section footer----------------------->
    <?php $this->load->view('front/footer')?> 
    <?php $this->load->view('front/footerlink')?> 