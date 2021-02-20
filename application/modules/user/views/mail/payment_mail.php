<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body style="background:#eceaea45;border-radius: 15px 15px 0px 0px;
    padding:50px;">
    <!-- ====== MAIN TABLE BODY START=== -->
    <table>
        <tr>
            <td>
              <img class="mx-auto mt-4" src="http://cmart.com.bd/frontassets/images/logo.png" alt="Cmart-image">
            </td>
        </tr>  
        <tr>
            <table >
                <tr>
               <td><h3>Dear Shopper</h3></td>
                </tr>
            </table>
        </tr> 
        
        <tr>
            <td style="width:10vh;"><img class="mx-auto mt-4" src="http://cmart.com.bd/frontassets/images/green_si.png" alt="Payment-Success-image"></td>
           
      <td>
		<div>
					<h2>&#10026; Payment-Success</h2>
					<p style="color:#000;font-weight:500;font-size: 16px;">&#128311; <span >Your Payment of : <span style="color:#ec1c23;"><?php if(!empty($order_info[0]['grand_total'])) echo $order_info[0]['grand_total']; ?></span> ৳ was successfully completed !!</span></p>
						<p style="color:#000;font-weight:500;font-size: 16px;">&#128311; Order-Number:<span style="color:#ec1c23;">#<?php if(!empty($order_info[0]['order_number'])) echo $order_info[0]['order_number']; ?></span> </p>
					<p style="color:#000;font-weight:500;font-size: 16px;">&#128311; Product-Name <?php if(!empty($products)) echo $products; ?> </p>
					<p style="color:#000;font-weight:500;font-size: 16px;"> &#128311; Payment-Method:<?php if(!empty($payment_type)) echo $payment_type; ?></p>
					<p style="color:#000;font-weight:500;font-size: 16px;"><h3>We Will Process Your Order Shortly.</h3></p>
				<span>
				    <a style="background: #0aa572 !important;
                color: #fff;
                text-decoration: none;
                padding: 10px;" href="http://cmart.com.bd" target="_blank">&#128717; Continue-Shopping</a>
                </span>
				
				</div>
				
        </td>

        </tr>

        <br><br>
            <tr>
            <table style="color: #000;
                font-weight: 500;">
                <tr>
                 <td>Thank you for being with cmart limited !!</td>
                </tr>
            </table>
        </tr> 
       
        <tr>
            <table style="color: #000;
    font-weight: 500;">
                <tr>
                <td>Cmart Team</td>
                </tr>
            </table>
        </tr> 
        <tr>
            <table style="color: #000;
    font-weight: 500;">
                <tr>
                <td><p style="text-transform: uppercase;">Any question, query or complain please contact us</p></td>
                </tr>
            </table>
        </tr> 
        <tr>
            <table style="color: #000;
    font-weight: 500;">
                <tr>
                <td>&#10004; Contact us: Cmart limited</td>
                </tr>
            </table>
        </tr> 
        <tr>
            <table style="color: #000;
    font-weight: 500;">
                <tr>
                <td> <p><span style="font-size:17px;">&#9742;</span> Cell-NO: +8809639177929</p></td>
                </tr>
            </table>
        </tr> 
        <tr>
          <table style="color: #000;
    font-weight: 500;">
                <tr>
                <td>&#9993; Mail: care@cmart.com.bd</td>
                </tr>
            </table>
        </tr> 
    </table>
</body>
       <div style="background: #11c1b1;
                padding: 5px;
                overflow: hidden;
                border: 1px solid #ccc;
                margin: 0px auto;
                box-shadow: 10px 10px 10px 10px #d4d2d2;">
                
            <div style="width:100%;float:left">
                <p style="color:#fff;text-align:center;
                margin-left:10px">
                 Copyright © 2020 CMART. All Rights Reserved.
                </p>
            </div>
            </div>
</html>