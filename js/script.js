$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    
});
// $(document).ready(function() {
//     $('#example').DataTable( {
//         "language": {
//             "lengthMenu": "Display _MENU_ records per page",
//             "zeroRecords": "No Data Found",
//             "info": "Total",
//             "infoEmpty": "No records available",
//             "infoFiltered": "(filtered from _MAX_ total records)"
//         }
//     });
// });
$(document).ready( function (){
    $('#table_id').DataTable();
    });
    
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            
        }
    });
});
    
    $(function(){
        $(".datepicker").datepicker({
        dateFormate:'dd-mm-yy',
        changeMonth:true,
        changeYear:true,
        });
    });
    
    function package_list(){
        var packages=$('#package').val();
        $.ajax({
            url:'pakage_data.php',
            method:'post',
            dataType:'html',
            data:{package:packages},
            success:function(data){
                var dat=$.parseJSON(data);
                var price=dat.res.package_price;
            $('#totaldeliverycharge').val(price);
            var delivary_charge=$('#totaldeliverycharge').val(price);
           // totalPrice(delivary_charge);
        }
    });
}

    function inv_Append(){
        r=1;
        var rowlen=parseInt($('#rowlenth').val());
        r+=rowlen;
          
        var result='<div class="row" id="minus"><div class="col-md-1 mt-5 ps-5"></div>';
        result+='<div class="col-md-1 mt-5 pe-5"><button type="button" class="btn btn-outline-danger btn-sm" id="bc" onclick="inv_Remove()"><i class="fa-solid fa-minus"></i></button></div>';
        result+='<div class="col-md-4 mt-2"><label for="productname" class="form-label">Product Name</label>';
        result+='<input type="text" class="form-control" name="productname[]"/></div>';
        result+='<div class="col-md-2 mt-2"><label for="price" class="form-label">Price</label>';
        result+='<input type="number" class="form-control" name="price[]" id="unit_price'+r+'" onkeyup="totalPrice('+r+')" /></div>';
        result+='<div class="col-md-2 mt-2"><label for="qty" class="form-label">Quantity</label>';
        result+='<input type="number" class="form-control" name="qty[]" id="qty'+r+'" onkeyup="totalPrice('+r+')" /></div>';
        result+='<div class="col-md-2 mt-2"><label for="total" class="form-label">Total</label>';
        result+='<input type="number" class="form-control totCount" name="productotal[]" id="total'+r+'"/></div></div>';
         
        $('#abc').append(result);
        $('#rowlenth').val(r);
        r++;
    }
    function inv_Remove(){
        $('#minus').remove();
    }
    
    function totalPrice(id){
        var unit_pirce=$('#unit_price'+id).val();
        var qty=$('#qty'+id).val();
        var total=(unit_pirce*qty);
            $('#total'+id).val(total);
            
            var allTotal = 0;
            $('.totCount').each(function(){
                var get_value = $(this).val();
                if($.isNumeric(get_value)){
                    allTotal += parseInt(get_value);
                }
            });
            $('#sub_total').val(allTotal);
        var subTotal = $('#sub_total').val();
        var deliverychrg = $('#totaldeliverycharge').val();
        var grandTotal = (parseInt(subTotal)+parseInt(deliverychrg));
        
            $('#grandtotal').val(grandTotal);
        
        var grandVal = $('#grandtotal').val();
        var paidA = $('#paidamount').val();
        
        if(grandVal != paidA){
            var dues = grandVal - paidA;
            $('#duesamount').val(dues);
        } else{
            $('#duesamount').val(0);
        }
    }
    
    // ekhane calcualtion full complete...
    //append er update er jonno database er id ganerate korte hobe product name er hidden feild e..... 
    function uInv_Append(){
        z=1;
        var row_len=parseInt($('#row_lenth').val());
        z += row_len;
        //   alert(z);
        var result='<div class="row" id="uInv_minus">\
                     <div class="col-md-1 mt-5 ps-5"></div>\
                     <div class="col-md-1 mt-5 pe-5">\
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="uInv_Remove()"><i class="fa-solid fa-minus"></i></button>\
                     </div>\
                     <div class="col-md-4 mt-3">\
                        <input type="hidden" class="form-control" name="iid[]" value="" />\
                         <label for="productname" class="form-label">Product Name</label>\
                        <input type="text" class="form-control" name="productname[]" value=""/>\
                     </div>\
                     <div class="col-md-2 mt-3">\
                         <label for="price" class="form-label">Price</label>\
                         <input type="number" class="form-control" name="price[]" id="U_price'+z+'" value="" onkeyup="U_totalPrice('+z+')"/>\
                     </div>\
                     <div class="col-md-2 mt-3">\
                         <label for="qty" class="form-label">Quantity</label>\
                         <input type="number" class="form-control" name="qty[]" id="U_qty'+z+'" value="" onkeyup="U_totalPrice('+z+')"/>\
                     </div>\
                     <div class="col-md-2 mt-3">\
                         <label for="total" class="form-label">Total</label>\
                         <input type="number" class="form-control U_totCount" name="productotal[]" id="U_total'+z+'" value="" onkeyup="U_totalPrice('+z+')"/>\
                     </div>\
                 </div>';
         
        $('#added').append(result);
        $('#row_lenth').val(z);
        z++;
    }
    function uInv_Remove(){
        $('#uInv_minus').remove();
    }
    
    function U_totalPrice(id){
        var unit_pirce=$('#U_price'+id).val();
        var qty=$('#U_qty'+id).val();
        var total=(unit_pirce*qty);
            $('#U_total'+id).val(total);
            
            var U_allTotal = 0;
            $('.U_totCount').each(function(){
                var U_value = $(this).val();
                if($.isNumeric(U_value)){
                    U_allTotal += parseInt(U_value);
                }
            });
            $('#U_sub_total').val(U_allTotal);
        var U_subTotal = $('#U_sub_total').val();
        var U_deliverychrg = $('#U_totaldeliverycharge').val();
        var U_grandTotal = (parseInt(U_subTotal)+parseInt(U_deliverychrg));
            $('#U_grandtotal').val(U_grandTotal);
        
        var grandVal = $('#U_grandtotal').val();
        var paidA = $('#U_paidamount').val();
        
        if(grandVal != paidA){
            var dues = grandVal - paidA;
            $('#U_duesamount').val(dues);
        } else{
            $('#U_duesamount').val(0);
        }
    }
    
    function deliverPerson(id,invid){
        var devid=$('#'+id).val();
        $.ajax({
            url:'../admin/assign_del_person.php',
            method:'POST',
            dataType:'html',
            data:{id:devid,invid:invid},
            success:function(){
                 window.location.assign('');
            }
            
        });
    }
    
    function deliverStatus(id,invID){
        var dstsID=$('#'+id).val();
        // alert(dstsID);
        $.ajax({
            url:'../admin/assign_deliver_status.php',
            method:'POST',
            dataType:'html',
            data:{sts:dstsID,invID:invID},
            success:function(resp){
                window.location.assign('');
            }
        });
    }
    
    function collectionStatus(id,invid){
        var colsts=$('#'+id).val();
        // alert(colsts);
        $.ajax({
            url:'../admin/assign_collection_status.php',
            method:'POST',
            dataType:'html',
            data:{csts:colsts,invid:invid},
            success:function(){
                window.location.assign('');
            }
        });
    }
    
    function marchantpaymentstatus(id,inbid){
        var mpsts=$('#'+id).val();
        // alert(mpsts);
        $.ajax({
            url:'../admin/assign_mp_status.php',
            method:'POST',
            dataType:'html',
            data:{mpsts:mpsts,inbid:inbid},
            success:function(){
                window.location.assign('');
            }
        });
    }
    
    function max_id_increment(){
        $.ajax({
            url:'max_id.php',
            method:'POST',
            dataType:'html',
            data:{},
            success:function(data){
                var dat=$.parseJSON(data);
                var invoice_id=dat.res;
                $('#invoice_id').val(invoice_id);
            }
        });
    }
    
    function delid(id){
            $('#delete_id').val(id) 
        }
        function deletdata(id){
            var id = $('#delete_id').val()
            $.ajax({
                url:'delete_data.php',
                method:'POST',
                dataType:'html',
                data:{idpass:id},
                success:function(){
                    $('#deleteid').modal('hide')
                    window.location.assign('')
                }
            })
        }