<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<title> Cmart || Admin</title>
<?php $this->load->view('backend/headlink') ?>
<style>
.pagination{
  display:none!important;
}
#DataTables_Table_0_info{
  display:none!important;
}

</style>

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
<div class="content-body" style="width:1070px;float: right;">

<!-- Default ordering table -->
<section id="ordering">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header bg_color">
<h4 class="card-title">Add Purchase Form</h4>
<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
</div>
<div class="row justify-content-md-center">
<div class="col-md-12">
<div class="card">

<div class="card-content collpase show">
<div class="card-body">
<form action="admin/insert_purchase_product" enctype="multipart/form-data" method="post" class="form form-horizontal striped-rows">
<div class="form-body">
<div class="form-group-row">
<div class="row">
  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
    <label for="basicInput">Supplier-Name</label>
    <select class="select2 form-control" id="id_h5_single" name="supplier_name">
      <option>Select Supplier Name</option>
      <?php foreach ($supp_list as $value) { ?>
        <option value="<?= $value['sup_id']; ?>">
          <?= $value['sup_name']; ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
    <fieldset class="form-group">
      <label for="basicInput">Product-Date</label>
      <input type="date" value="0.00" class="form-control" id="basicInput" name="date">
    </fieldset>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
    <fieldset class="form-group">
      <label for="basicInput">Bill-No</label>
      <input type="number" class="form-control" id="basicInput" name="bill_no">
      <span class="col-xs-3 billno_css">
        <i class="fa fa-list-alt"></i>
      </span>
    </fieldset>
  </div>
</div>
</div>
<div class="form-group-row">
<div class="row">
  <div class="col-xl-7 col-lg-6 col-md-12 mb-1">
    <label class="col-md-4 label-control" for="eventRegInput2">Notation-Product </label>
    <span class="">
      <textarea class="form-control" id="placeTextarea" rows="5" placeholder="Textarea with placeholder" name="notation">
</textarea>
    </span>
  </div>
  <div class="col-xl-5 col-lg-6 col-md-12 mb-1">
    <fieldset class="form-group">
      <label for="basicInput">Upload-File</label>
      <input type="file" class="form-control" id="basicInput" name="files">
      <span class="col-xs-3 billno_css">
        <i class="fa fa-file"></i>
      </span>
    </fieldset>
  </div>
</div>
</div>
<!-- ================= table start ================ -->
<div class="form-group-row col-sm-12">
<table class="table  table-bordered default-ordering table-responsive">
  <thead class="flip-content">
    <tr>
      <th style="text-align: center;width:5%;">SL</th>
      <th style="text-align: center;width:20%;"> Product Name</th>
      <th style="text-align: center;width:10%;"> Price </th>
      <th style="text-align: center;width:15%;"> Qty </th>
      
      <th style="text-align: center;width:10%;"> Price*Qty</th>
      <th style="text-align: center;width:10%;"> Action</th>
    </tr>
  </thead>
  <tbody id="dynamic_row">
    <tr style="text-align:center;">
      <td>1</td>
      <td>
        <select onchange="get_product_data(0)" id="product_id_0" name="p_id[]" class="select2 form-control abcd" data-placeholder="Select a product">
          <option value="">Select Product</option>
          <?php foreach ($product_list as $row) { ?>
            <option value="<?=$row['pro_id']; ?>"><?=$row['product_name']; ?></option>
          <?php } ?>
        </select>
      </td>
         <td>
        <div class="input-group icon_tag_input abc">
          <input id="price_id_0" name="price[]"  value="0.00" class="form-control align-right " type="number">
        
        </div>
      </td>
      <td><input onchange="qty_update_calculation(0)" name="buy_qty[]" id="product_qty_0" class="form-control qty_css" type="number" value="0"></td>
   
      <td>
        <div class="input-group icon_tag_input abc">
          <input id="product_price_qty_0"  value="0.00" class="form-control align-right subtotal" type="number">
        
        </div>
      </td>
      <td>
        <a class=" btn btn-success btn-xs" id="row_div" style="padding: 3px 10px;">
          <i class="fa fa-plus"></i>
        </a>
      </td>
    </tr>
  </tbody>
  <tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong>Total:</strong></td>
    <td>
      <div class="input-group icon_tag_input total_div">
        <input name="credit" id="total" readonly value="<?= number_format(0, 2); ?>" class="form-control align-right" type="number">
      
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong>Paid:</strong></td>
    <td>
      <div class="input-group icon_tag_input">
        <input name="debit" value="0.00" onkeyup="due_advance_calculation()" id="paid" class="form-control align-right" type="number">
      
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="5" class="align-right" style="text-align: right !important;"><strong id="remain_label"> Due/Advance:</strong></td>
    <td>
      <div class="input-group icon_tag_input">
        <input id="remain_val" readonly class="form-control align-right" type="number">
      
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="5" class="align-right" style="text-align: right !important;">
      <strong id="remain_label"> Unload Cost:</strong></td>
    <td>
      <div class="input-group icon_tag_input">
        <input value="0.00" name="unload_cost" class="form-control align-right" type="number">
      
      </div>
    </td>
  </tr>
</table>
</div>
<!-- ======================= table end ================= -->

</div>
<div class="form-actions center ">
<button id="type-success" type="submit" class="btn btn-primary col-sm-4">
<i class="fa fa-check-square-o"></i> Submit
</button>
</div>
</form>
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

$("#dynamic_row").append('<tr style="text-align:center"><td>' + (i + 1) + '</td><td><select onchange=" get_product_data(' + i + ')" id="product_id_' + i + '" name="p_id[]" class="select2  form-control"><option value="">Select Product</option><?php foreach ($product_list as $row) { ?><option value="<?=$row["pro_id"]; ?>"><?=$row["product_name"]; ?></option><?php } ?></select></td><td><div class="input-group icon_tag_input"><input name="price[]" id="price_id_' + i + '" name="price[]"  value="0" class="form-control align-right" type="number" ></div></td><td><input onchange="qty_update_calculation(' + i + ')" id="product_qty_' + i + '" class="form-control sell_cart_input" name="buy_qty[]" type="number" value="0"></td><td><div class="input-group icon_tag_input"><input id="product_price_qty_' + i + '" readonly value="0.00" class="form-control align-right subtotal" type="number" ></div></td><td><button class="rem_row btn btn-danger btn-xs" style="padding: 3px 10px;"><i class="fa fa-trash"></i></button></td></tr>');

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


function get_price(id) 
        {
        var p_id=$("#product_id_"+id).val();
                //console.log(p_id);
                $.ajax({
                    url: "<?php echo site_url('admin/get_price');?>",
                    type: "post",
                    data: {p_id:p_id},
                    success: function(msg)
                    {
                        //alert(msg); 
                        $("#price_id_"+id).html(msg);
                    } 
                });  
        }

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

var price = parseFloat(data[0]['pro_price']);
price = price.toFixed(2);
//$("#price_id_" + id).val(price);
$("#product_qty_" + id).val(1);
var subtotal = parseFloat(price * 1);
//console.log(price);


// $("#product_price_qty_" + id).val(subtotal.toFixed(2));

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
// $("#total").val(sum.toFixed(2));

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