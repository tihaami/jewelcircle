<?php
require 'templates/top.inc.php';
if(isset($_POST['email'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['city'])&&isset($_POST['contact'])){
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['firstname'] = $_POST['firstname'];
  $_SESSION['lastname'] = $_POST['lastname'];
  $_SESSION['city'] = $_POST['city'];
  $_SESSION['zipcode'] = $_POST['zipcode'];
  $_SESSION['address'] = $_POST['address'];
  $_SESSION['contact'] = $_POST['contact'];
  $_SESSION['state'] = $_POST['state'];
}
?>

<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet"  href="css/payment.css">

<div class="container" style="padding-bottom:80px; padding-top:50px;">
  <div class="row">
    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
      <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-25 m-r--38 m-lr-0-xl">
        <h4 class="mtext-109 cl2 p-b-30">Pay Online</h4>
        <form action="charge.php" method="post" id="payment-form">
          <div class="form-row">
                      
            <label for="card-element">
              Credit or debit card
            </label>
            <div id="card-element"  class="form-control">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          </div>
          
          <div style="padding-top: 20px">
            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Submit
            </button>
          </div>

        </form>
      </div>
    </div>
    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
      <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
        <form action="payment-success.php">
          <h4 class="mtext-109 cl2 p-b-30">
            Cash on Delivery
          </h4>
          <p>Your package will be delivered to you within 10-15 days</p>
          <div style="padding-top: 20px">
            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/charge.js"></script>

<?php
  require 'templates/bottom.inc.php';
?>