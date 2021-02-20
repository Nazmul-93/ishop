<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body style="background-color:#f5f5f5;padding:30px;border-radius: 15px 15px 0px 0px;">
    <!-- ====== MAIN TABLE BODY START=== -->
    <table>
        <tr>
             <td colspan="8">
                 <img src="http://cmart.com.bd/frontassets/images/logo.png" alt="cmart-logo">
            </td>
    
           <td colspan="10" style="padding-right:0px;">
            <span style="color:#000;
                font-weight: 600;
                font-size: 12px;">&#10022; Date: <?php if(!empty($order_info[0]['date'])) echo $order_info[0]['date'];?></span><br><br>
             <span style="color:#000;
                font-weight: 600;
                font-size: 12px;">&#10022; Your Order NO : # <?php if(!empty($order_info[0]['order_number'])) echo $order_info[0]['order_number']  ?></span><br><br>
            <span style="color:#000;
                font-weight: 600;
                font-size: 12px;">&#10022; Payment-Method: <?php if(!empty($order_info[0]['payment_type'])) if($order_info[0]['payment_type']==1) { echo 'Cash on Delivery';} else{ echo 'Credit/Debit Card/Bkash/M-Kash/Mobile-Banking/Emi';}  ?></span>
        </td>
        </tr>  
        <tr>
            <table style="
                width:130%;border-bottom:1px solid #000;">
                <tr>
               <td> <h2>Products-Details</h2></td>
                </tr>
            </table>
        </tr> 
        <br>
        <tr>
        <td style="width:77%;">
            <table style="width:125%;">
                <tr>
                    <th style="">Product Image</th>
                    <th style="">Product Name</th>
                    <th style="">Product Details</th>
                    <th style="">Quantity</th>
                    <th style="">Price</th>
                </tr>
                <?php foreach($order_details as $order_detail): ?>
                <tr>
                    <td style="padding:20px!important;">
                    <img src="<?=base_url('uploads/product/thumbnail/'.$order_detail['product_img'])?>" alt="images" style="height: 100px;">
                    </td>
                    <td style="padding:20px!important;"><?=$order_detail['product_name']?></td>
                    <td style="padding:20px!important;"><?=$order_detail['pro_short_descrp']?></td>
                    <td style=""><?=$order_detail['product_qty']?></td>
                    <td style="#ffc107"><?=$order_detail['price']?> ৳ </td>
                </tr>
                 <?php endforeach?>
            </table>
        </td>
        </tr>
        <tr style="float: right;
        width: 1%;">
            <table style="
                width: 100%;
                 margin: 30px 30px;">
                <tbody>
                    <tr >
                        <th style="color: #077b71;
                         font-weight: 600;">Subtotal</th>
                        <td><span style="color: #000;
                        font-weight: 600;"><?php if(!empty($order_info[0]['grand_total'])) echo $order_info[0]['grand_total']-$order_info[0]['shipping_cost'];  ?> ৳</span></td>
                    </tr>
                    <tr>
                        <th style="color: #077b71;
                         font-weight: 600;">Shipping-Cost</th>
                        <td><span style="color: #000;
                        font-weight: 600;"><?php if(!empty($order_info[0]['shipping_cost'])) echo $order_info[0]['shipping_cost']  ?> ৳</span></td>
                    </tr>
                    <tr>
                        <th style="color: #077b71;
                         font-weight: 600;">Grand-Total</th>
                        <td><span style="color: #000;
                            font-weight: 600;"><?php if(!empty($order_info[0]['grand_total'])) echo $order_info[0]['grand_total'];  ?> ৳</span></td>
                    </tr>
                </tbody>
            </table>
        </tr>
        <tr>
            <table style="margin: 0px 31px;color: #000;
                font-weight: 500;">
                <tr>
                 <td>Thank you for being with cmart limited !!</td>
                </tr>
            </table>
        </tr> 
       
        <tr>
            <table style="margin: 0px 31px;color: #000;
    font-weight: 500;">
                <tr>
                <td>Cmart Team</td>
                </tr>
            </table>
        </tr> 
       
        <tr>
            <table style="margin: 0px 31px;color: #000;
    font-weight: 500;">
                <tr>
                <td><p style="text-transform: uppercase;">Any question, query or complain please contact us</p></td>
                </tr>
            </table>
        </tr> 
        
        <tr>
            <table style="margin: 0px 31px;color: #000;
    font-weight: 500;">
                <tr>
                <td>&#10004; Contact us: Cmart limited</td>
                </tr>
            </table>
        </tr> 
        <tr>
            <table style="margin: 0px 31px;color: #000;
    font-weight: 500;">
                <tr>
                <td> <p><span style="font-size:17px;">&#9742;</span> Cell-NO: +8809639177929</p></td>
                </tr>
            </table>
        </tr> 
        <tr>
          <table style="margin: 0px 31px;color: #000;
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
               width: 100%!important;
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