<?php require_once "mrcn_header.php";
    require_once '../connection.php';
?>

<div class="col-md-11 main-content">
    <div class="row">
      <div class="col-md-12">
    		    <div class="row">
    				<div class="col-md-6 top-left">
    					<img src="../admin/companyLogo/fastdeli.png?>" alt="" width="70">
    				</div>
    				<div class="col-md-6 invID">
    						<h3 class="ms-auto">INVOICE-1234578</h3>
    						<span class="ms-auto">14 April 2014</span>
    			    </div>
    			</div>
    			<hr>
    			<div class="row">
    
    				<div class="col-md-4 ps-4">
    					<p>From : Dynofy</p>
    					<p>350 Rhode Island Street</p>
    					<p>Suite 240, San Francisco</p>
    					<p>California, 94103</p>
    					<p>Phone: 415-767-3600</p>
    					<p>Email: contact@dynofy.com</p>
    				</div>
    
    				<div class="col-md-4 to">
    					<p>To : John Doe</p>
    					<p>425 Market Street</p>
    					<p>Suite 2200, San Francisco</p>
    					<p>California, 94105</p>
    					<p>Phone: 415-676-3600</p>
    					<p>Email: john@doe.com</p>
    
    			    </div>
    
    			    <div class="col-md-4 ps-5">
    					<p>Payment details</p>
    					<p>Date: 14 April 2014</p>
    					<p>VAT: DK888-777 </p>
    					<p>Total Amount: $1019</p>
    					<p>Account Name: Flatter</p>
    			    </div>
    
    			</div>
    
    			<div class="row table-row">
    				<table class="table table-striped">
    			      <thead>
    			        <tr>
    			          <th class="text-center" style="width:5%">#</th>
    			          <th style="width:50%">Item</th>
    			          <th class="text-right" style="width:15%">Quantity</th>
    			          <th class="text-right" style="width:15%">Unit Price</th>
    			          <th class="text-right" style="width:15%">Total Price</th>
    			        </tr>
    			      </thead>
    			      <tbody>
    			        <tr>
    			          <td class="text-center">1</td>
    			          <td>Flatter Theme</td>
    			          <td class="text-right">10</td>
    			          <td class="text-right">$18</td>
    			          <td class="text-right">$180</td>
    			        </tr>
    			        <tr>
    			          <td class="text-center">2</td>
    			          <td>Flat Icons</td>
    			          <td class="text-right">6</td>
    			          <td class="text-right">$59</td>
    			          <td class="text-right">$254</td>
    			        </tr>
    			        <tr>
    			          <td class="text-center">3</td>
    			          <td>Wordpress version</td>
    			          <td class="text-right">4</td>
    			          <td class="text-right">$95</td>
    			          <td class="text-right">$285</td>
    			        </tr>
    			         <tr class="last-row">
    			          <td class="text-center">4</td>
    			          <td>Server Deployment</td>
    			          <td class="text-right">1</td>
    			          <td class="text-right">$300</td>
    			          <td class="text-right">$300</td>
    			        </tr>
    			       </tbody>
    			    </table>
    
    			</div>
    
    			<div class="row">
    			<div class="col-md-6">
    				<p>THANK YOU!</p>
    				<button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
    				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
    			</div>
    			<div class="col-md-6 inv-total">
    				<p>Subtotal : $1019</p>
    			    <p>Discount (10%) : $101 </p>
    			    <p>VAT (8%) : $73 </p>
    			    <p>Total : $991 </p>
    			</div>
    			</div>
    	</div>
    </div>
</div>
 <?php require_once "../footer.php"; ?>
 