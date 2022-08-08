<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8 pt-4 mt-4">
           
           <form action="#" method="POST" enctype="multipart/form-data" class="row g-3">
               <h2 class="text-center text-info">Order Tracking</h2>
               
                <div class="col-md-4">
                    <label for="invoiceid" class="form-label">Invoice ID</label>
                    <input type="text" class="form-control" name="invoiceid" />
                </div>
                <div class="col-md-4">
                    <label for="orderdate" class="form-label">Order Date</label>
                    <input type="date" class="form-control" name="orderdate" />
                </div>
                <div class="col-md-4">
                    <label for="deliverydate" class="form-label">Delivery Date</label>
                    <input type="date" class="form-control" name="deliverydate" />
                </div>
                <div class="col-md-6">
                    <label for="orderstatus" class="form-label">Order Status</label>
                    <input type="text" class="form-control" name="orderstatus" />
                </div>
                <div class="col-md-6">
                    <label for="paymentstatus" class="form-label">Payment Status</label>
                    <input type="text" class="form-control" name="paymentstatus" />
                </div>
               
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
         
            </div>

            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>