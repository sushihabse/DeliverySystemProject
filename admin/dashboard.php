<?php require_once "../header.php";
    require_once '../connection.php';
?>
        <div class="col-md-11 main-content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="deshheader">
                        <h1>Welcome Admin !</h1>
                        <h5 class="ms-3">DESHBOARD</h5>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="card cards card-1">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                            <h3 class="card-title mb-4">132</h3>
                            <h5 class="card-subtitle mb-3">Total Delivery</h5>
                          </div>
                          <div class="col-4">
                            <i class="cards-icons fa-solid fa-truck"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                    <a href="http://enamdev.xyz/admin/customer_info.php">
                        <div class="card cards card-2">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                              <?php
                                $result = $link->query("SELECT count(*) from customer;");
                                $row=$result->fetch_row();
                              ?>
                            <h4 class="card-title mb-4"><?php echo 'Active Customer: ', $row[0]; ?></h4>
                            <h5 class="card-subtitle mb-3">Total Customar</h5>
                          </div>
                          <div class="col-4">
                            <i class="cards-icons fa-solid fa-people-roof"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-4">
                    <a href="#">
                        <div class="card cards card-3">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                              <?php
                            $result = $link->query("SELECT count(*) from marchant_payment;");
                            $row=$result->fetch_row();
                              ?>
                            <h4 class="card-title mb-4"><?php echo 'Active Payment:', $row[0]; ?></h4>
                            <h5 class="card-subtitle mb-3">Payment Status(Today)</h5>
                          </div>
                          <div class="col-4">
                            <i class="cards-icons fa-solid fa-hand-holding-dollar"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>

                  </div>

                  <div class="row mt-5">
                    <div class="col-md-4">
                    <a href="#">
                        <div class="card cards card-3">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                              <?php
                            $result = $link->query("SELECT count(*) from marchant_info;");
                            $row=$result->fetch_row();
                              ?>
                            <h4 class="card-title mb-4"><?php echo 'Active Merchants:', $row[0]; ?></h4>
                            <h5 class="card-subtitle mb-3">Total Merchants</h5>
                          </div>
                          <div class="col-4">
                          <i class="cards-icons fa-solid fa-users-line"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-4">
                    <a href="#">
                      <div class="card cards card-1">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                            <h3 class="card-title mb-4">2,55,000</h3>
                            <h5 class="card-subtitle mb-3">Merchant Total Payment</h5>
                          </div>
                          <div class="col-4">
                            <i class="cards-icons fa-regular fa-money-bill-1"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-4">
                    <a href="#">
                        <div class="card cards card-2">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-8">
                          <?php
                            $result = $link->query("SELECT count(*) from customer_invoice;");
                            $row=$result->fetch_row();
                              ?>
                            <h3 cl
                            <h4 class="card-title mb-4"><?php echo 'Active Order:', $row[0]; ?></h4>
                            <h5 class="card-subtitle mb-3">Total Merchent Orders</h5>
                          </div>
                          <div class="col-4">
                            <i class="cards-icons fa-solid fa-arrow-down-short-wide"></i>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>

                  </div>

                  <div class="row mt-5">
                    <div class="col-md-6">
                    <a href="https://enamdev.xyz/admin/invoice_report.php">
                        <div class="card cards card-2">
                          <div class="card-body">
                            <div class="row">
                            <div class="col-9">
                              <h3 class="card-title mb-4">Reports</h3>
                              <h5 class="card-subtitle mb-3">Order Report Delivery Status</h5>
                            </div>
                            <div class="col-3">
                              <i class="cards-icons fa-solid fa-receipt"></i>
                            </div>
                            </div>
                          </div>
                        </div>
                    </a>
                      </div>

                    <div class="col-md-6">
                    <a href="https://enamdev.xyz/admin/invoice_report.php">
                        <div class="card cards card-3">
                          <div class="card-body">
                            <div class="row">
                            <div class="col-9">
                              <h3 class="card-title mb-4">Reports</h3>
                              <h5 class="card-subtitle mb-3">Total Number Of Enquiry</h5>
                            </div>
                            <div class="col-3">
                              <i class="cards-icons fa-solid fa-clipboard-list"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
          </div>
     
 <?php require_once "../footer.php"; ?>