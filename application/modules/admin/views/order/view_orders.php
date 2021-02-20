<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart | Admin</title>
<?php $this->load->view('backend/headlink') ?>


<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<?php $this->load->view('backend/nav_head') ?>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<!-- ===== left-Sidebar start======= -->

<?php $this->load->view('backend/left_sidebar') ?>

<!-- ============ left-Sidebar end======= -->
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">

<!-- Default ordering table -->
<section id="ordering">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Order Details</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-12">
<div class="card">

<div class="card-content collpase show">
<div class="card-body">
<!-- ===========  View Purchase Details start ===== -->

<form onsubmit="return sumbit_validation()" action="admin/insert_purchase_product" method="post">
<div class="col-md-12">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box green">
<div class="portlet-body">

<div class="row">
<div class="col-md-8">
<h3 style="margin-top:0px;font-weight:600;" class=""> <i class="fa fa-ship"></i> Shipping To:</h3>
</div>
<div class="col-md-4">
<label><strong><i class="fa fa-newspaper-o" aria-hidden="true"></i> Order-ID : #<?=$order_info['order_number']?></strong></label> &nbsp;
</div>
</div>
<div class="row">
<div class="col-md-8">
<label><strong><i class="fa fa-user"></i> Customer-Name : <?=$order_info['sh_name']?></strong></label> &nbsp;
</div>
<div class="col-md-4">
<label><strong> <i class="fa fa-calendar" aria-hidden="true"></i> Order-Date : <?=$order_info['date']?></strong></label> &nbsp;
</div>
</div>

<div class="row">
<div class="col-md-8">
<label>
    <strong><i class="fa fa-map-marker" aria-hidden="true"></i> Address : <?php echo $order_info['division_name'].','.$order_info['district_name'].',<br>'.$order_info['sh_address']?>.
    </strong>
</label> &nbsp;

</div>
</div>
<div class="row">
<div class="col-md-8">
<label>
    <strong><i class="fa fa-envelope" aria-hidden="true"></i> Email : <?=$order_info['sh_email']?>
    </strong>
</label> &nbsp;

</div>
</div>
<div class="row">
<div class="col-md-8">
<label>
    <strong><i class="fa fa-phone" aria-hidden="true"></i> Phone-Number : <?=$order_info['sh_phone']?>
    </strong>
</label> &nbsp;

</div>
</div>
<br>
<div class="table-scrollable">
<table class="table table-bordered table-striped table-condensed flip-content table-responsive">
<thead class="flip-content">
    <tr>
        <th style="text-align: center;width:5%;">SL</th>
        <th style="text-align: center;width:20%;"> Product Image </th>
        <th style="text-align: center;width:20%;"> Product Name </th>
        <th style="text-align: center;width:10%;"> Qty </th>
        <th style="text-align: center;width:10%;"> Price </th>
        <th style="text-align: center;width:15%;"> Price*Qty </th>


    </tr>
</thead>
<tbody id="dynamic_row">
    <?php foreach ($order_details as $key => $value) { ?>
    <tr>
        
            <td style="text-align: center;"><?= $key + 1 ?></td>
                <td style="text-align: center;">
                <img src="<?=base_url('uploads/product/thumbnail/'. $value['product_img']) ?>" alt="img" height="100px" width="80px"/>
            </td>
            <td style="text-align: center;">
                <?= $value['pro_name'] ?>
            </td>
        
            <td style="text-align: center;"><?= $value['product_qty'] ?></td>

            <td style="text-align: center;">
                <?= number_format($value['price'], 2); ?>&nbsp;৳
            </td>
            <td style="text-align: center;">
                <?= number_format(($value['price'] * $value['product_qty']), 2); ?>&nbsp;৳
            </td>
    </tr>
<?php } ?>

</tbody>
<tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong>Sub Total:</strong></td>
    <td style="width:130px;text-align: center;">
        <?= number_format($order_info['grand_total']-$order_info['shipping_cost'], 2); ?>&nbsp;৳
    </td>

</tr>

<tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong>Shipping Cost:</strong></td>
    <td style="width:130px;text-align: center;">
        <?= number_format(($order_info['shipping_cost']), 2); ?>&nbsp;৳
    </td>

</tr>

<tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong>Grand Total:</strong></td>
    <td style="width:130px;text-align: center;">
        <?= number_format(($order_info['grand_total']), 2); ?>&nbsp;৳
    </td>

</tr>




</table>

</div>


</div>



</div>



<!-- END EXAMPLE TABLE PORTLET-->


</div>
</form>
<!-- ================   View Purchase Details ends========= -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--/ Default ordering table -->
</div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<?php $this->load->view('backend/footer') ?>
<!-- END: Footer-->


<?php $this->load->view('backend/footerlink') ?>


<!-- =================   Purchase Product table script  start============= -->



<!-- Add row and delete in table -->
<script>
$(document).ready(function() {

var i = 1;

$("#row_div").click(function() {

$("#dynamic_row").append('<tr style="text-align:center"><td>' + (i + 1) + '</td><td><select onchange="get_color(' + i + ');get_product_data(' + i + ')" id="product_id_' + i + '" name="p_id[]" class="select2  form-control"  data-placeholder="Select a product"><option value=""></option><?php foreach ($product_list as $row) { ?><option value="<?= $row["pro_id"]; ?>"><?= $row["product_name"]; ?></option><?php } ?></select> </td><td><select id="color_id_' + i + '" name="available_color[]" class="select2 form-control"  data-placeholder="Color"><option value=""></option><?php foreach ($color_list as $row) { ?><option value="<?= $row['color_id']; ?>"><?= $row['color_title']; ?></option><?php } ?><option value="">Color</option></select></td><td><input onchange="qty_update_calculation(' + i + ')" id="product_qty_' + i + '" class="form-control sell_cart_input" name="buy_qty[]" type="number" value="0"></td><td><div class="input-group icon_tag_input"><input name="price[]" id="price_id_' + i + '" name="price[]" readonly value="0" class="form-control align-right" type="number" ><span class="purchase_tk_mark">৳</span></div></td><td><div class="input-group icon_tag_input"><input id="product_price_qty_' + i + '" readonly value="0.00" class="form-control align-right subtotal" type="number" ><span class="purchase_tk_mark">৳</span></div></td><td><button class="rem_row btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td></tr>');

$('.select2').select2({
allow_single_deselect: true
});
i++;
});

$("#dynamic_row").on('click', '.rem_row', function() {
$(this).parent().parent().remove();
i--;
});

//ComponentsSelect2.init();

$('.select2').select2({
allow_single_deselect: true
});

});
</script>




<script>
function get_color(id) {
var p_id = $("#product_id_" + id).val();
//console.log(p_id);
$.ajax({
url: "<?php echo site_url('admin/get_color'); ?>",
type: "post",
data: {
p_id: p_id
},
success: function(msg) {

//alert(msg);
$("#color_id_" + id).html(msg);
}
});
}
</script>

<script>
function qty_update_calculation(id) {
var qty = $("#product_qty_" + id).val();
var price = $("#price_id_" + id).val();
qty = parseFloat(qty);
price = parseFloat(price);

// alert(price);

var subtotal = parseFloat(price * qty);
console.log(price);

$("#product_price_qty_" + id).val(subtotal.toFixed(2));

var sum = 0;
// iterate through each td based on class and add the values
$(".subtotal").each(function() {

var value = $(this).val();
// add only if the value is number
if (!isNaN(value) && value.length != 0) {
sum += parseFloat(value);
}
});
$("#total").val(sum.toFixed(2));
setTimeout(function() {
due_advance_calculation();
}, 900);


}


function get_product_data(id) {
var p_id = $("#product_id_" + id).val();

$.ajax({
type: 'POST',
url: "<?= base_url(); ?>admin/get_product_details_ajax",
data: {
p_id: p_id
},
dataType: 'json',
success: function(data) {
// console.log(data[0]['pro_price']);
//alert(data[0].buy_price);
$("#color_id_" + id).html(data[0]['color']);
// $("#size_id_"+id).html(data[0].size);
var price = parseFloat(data[0]['pro_price']);
price = price.toFixed(2);
$("#price_id_" + id).val(price);
$("#product_qty_" + id).val(1);
var subtotal = parseFloat(price * 1);
//console.log(price);


$("#product_price_qty_" + id).val(subtotal.toFixed(2));

var sum = 0;
// iterate through each td based on class and add the values
$(".subtotal").each(function() {

var value = $(this).val();
// add only if the value is number
if (!isNaN(value) && value.length != 0) {
sum += parseFloat(value);

}
});

// alert(sum);
$("#total").val(sum.toFixed(2));

}
});
setTimeout(function() {
due_advance_calculation();
}, 900);
//setTimeout(due_advance_calculation(), 2000);

}
</script>

<script type="text/javascript">
function due_advance_calculation() {

var bill = $("#total").val();
bill = parseFloat(bill);
var paid = $("#paid").val();
paid = parseFloat(paid);

console.log('bill:' + bill + '--paid:' + paid);
var remain = 0;

remain = bill - paid;
if (remain > 0) //due
{
$("#remain_label").html('<span style="color:red">Due:</span>');
$("#remain_val").val(remain.toFixed(2));
} else if (remain < 0) //advance
{
$("#remain_label").html('<span style="color:green">Advance: </span>');
$("#remain_val").val((remain * (-1)).toFixed(2));

} else {
$("#remain_label").html('<span>Due/Advance: </span>');
$("#remain_val").val(remain.toFixed(2));
}
}
</script>



<!-- <!====================== Purchase Product Table  script  end ============== -->

</body>