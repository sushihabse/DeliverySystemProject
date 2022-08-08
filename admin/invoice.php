<?php require_once "../header.php";
    require_once '../connection.php';
?>
    <div class="col-md-11 main-content">
        <div class="row">
          <div class="col-md-12">
              <?php
            	if(isset($_GET['print'])){
            	    $printid=$_GET['print'];
            		$x=1;
                    $sql="SELECT customer_invoice.invoice_id,customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.total_delivery_charge,customer_invoice.total,
                        customer_invoice.grand_total,customer_invoice.product_name,customer_invoice.qty,
                        customer_invoice.price,customer_invoice.subtotal,customer_invoice.paid_amount,customer_invoice.dues_amount,marchant_info.marchant_name,
                        marchant_info.email,marchant_info.phone,customer.customer_name,customer.email,customer.phone,customer.address,
                        delivery_person.name,delivery_person.email,delivery_person.mobile
                        FROM `customer_invoice` LEFT JOIN `customer` ON customer_invoice.customer_ID = customer.customer_id
                        LEFT JOIN `marchant_info` ON customer_invoice.marchant_ID = marchant_info.marchant_id 
                        LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id where invoice_id='$printid'";
                        
                        // echo $sql;
                        // exit();
            				     $query=mysqli_query($link, $sql);
            				     if($row=mysqli_fetch_array($query)){
            				        // echo "<pre>";
            				        // print_r($row);
            				        // exit();
            				    
              ?>
        		    <div class="row">
        				<div class="col-md-12">
        				    <table class="table">
                              <thead>
                                <tr>
                                  <th colspan="2"><img src="../admin/companyLogo/fastdeli.png?>" alt="" width="70"></th>
                                  <th scope="col" class="padding"><h3 class="ms-auto">INVOICE-1234578</h3></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td colspan="2">FAST DELIVERY</td>
                                  <td class="padding">14 April 2014</td>
                                </tr>
                              </tbody>
                        </table>
        			</div>
        			<hr>
        			<div class="row">
        			    <div class="col-md-12">
        			       <table class="table">
                              <thead>
                                <tr>
                                  <th >Seler Information</th>
                                  <th >Customer Information</th>
                                  <th >Delivery Person Information</th>
                                  <th >Payment Details</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>From: <?php echo $row[12] ?></td>
                                  <td>To: <?php echo $row[15] ?></td>
                                  <td>Name : <?php echo $row[19] ?></td>
                                  <td>Delivery <?php echo $row['delivery_date'] ?></td>
                                </tr>
                                <tr>
                                  <td>Email: <?php echo $row[13] ?></td>
                                  <td>Email: <?php echo $row[16] ?></td>
                                  <td>Email: <?php echo $row[20] ?></td>
                                  <td>Delivery Location: <?php echo $row['delivery_location'] ?></td>
                                </tr>
                                <tr>
                                  <td>Mobile: <?php echo $row[14] ?></td>
                                  <td>Mobile: <?php echo $row[17] ?></td>
                                  <td>Mobile: <?php echo $row[21] ?></td>
                                  <td>Delivery Charge: <?php echo $row['total_delivery_charge'] ?></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Address : <?php echo $row[18] ?></td>
                                  <td></td>
                                  <td>Grand Total Price: <?php echo $row['grand_total'] ?></td>
                                </tr>
                              </tbody>
                            </table>
        			    </div>
        			</div>
        
        			<div class="row">
        				<div class="col-md-12">
        				    <table class="table table-striped">
            			      <thead>
            			        <tr>
            			          <th style="width:50%">Product Name</th>
            			          <th class="text-right" >Quantity</th>
            			          <th class="text-right" >Unit Price</th>
            			          <th class="text-right" >Total Price</th>
            			        </tr>
            			      </thead>
            			      <tbody>
            			          <?php
            			               $query=mysqli_query($link,$sql);
            			               while($prod_row=mysqli_fetch_array($query)){
            			            ?>
            			        <tr>
            			          <td><?php echo $prod_row['product_name']; ?></td>
            			          <td class="text-right"><?php echo $prod_row['qty'] ?></td>
            			          <td class="text-right"><?php echo $prod_row['price'] ?></td>
            			          <td class="text-right"><?php echo $prod_row['total'] ?></td>
            			        </tr>
            			        <?php } ?>
            			       </tbody>
            			    </table>
        			    </div>
        			</div>
        
        			<div class="row">
        			    <div class="col-md-12">
        			     <table class="table">
                              <thead>
                                <tr>
                                  <th ></th>
                                  <th></th>
                                  <th ></th>
                                  <th >Payment Details</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Thank You</td>
                                  <td>
                                    <button class="btn btn-success d-print-none" onclick="window.print()" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
        				            <button class="btn btn-danger d-print-none"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                                  </td>
                                  <td></td>
                                  <td>Sub Total : <?php echo $row['subtotal'] ?></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Grand Total Price: <?php echo $row['grand_total'] ?></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Paid Amount : <?php echo $row['paid_amount'] ?></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Dues Amount : <?php echo $row['dues_amount'] ?></td>
                                </tr>
                              </tbody>
                            </table>
        			    </div>
        		</div>
        	</div>
        	
        </div>
        <?php } } ?>
    </div>

 <?php require_once "../footer.php"; ?>
 