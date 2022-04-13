<?php
include './backend_data/init.php';
ob_start();
if (empty($_GET['id']) || !isset($_GET['id'])){
  header('Location:./login');
  ob_end_flush();
}
else{
  include './backend_data/init.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM users LEFT JOIN classes ON users.class = classes.title WHERE users.id =  '$id' ";
  $query = mysqli_query($conn,$sql);
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      $name = $row["name"];
      $email = $row["email"];
      $address = $row["address"];
      $country = $row['country'];
      $state = $row['state'];
      $price = $row['price'];
      $duration = $row['span'];
      
    }
  }
  if (isset($_POST['price'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $start = time();
    $finish = $start + (intval($duration) * 30 * 3600);
    if ($duration == 0){
      $sql = "UPDATE `users` SET `payment_time`='$start',`expiry_time`='0',`payment_status`='$status' WHERE id = '$id' ";
      $sql1 = "INSERT INTO `transaction`(`id`, `user_id`, `title`, `price`, `timestamp`) VALUES ('','$id','Registration Fee','$price','')";
      $query = mysqli_query($conn,$sql);
      $query1 = mysqli_query($conn,$sql1);
      if ($query && $query1) {
        header('Location:./dashboard');
        ob_end_flush();
      }
      else{}
    }
    else{
      $sql = "UPDATE `users` SET `payment_time`='$start',`expiry_time`='$finish',`payment_status`='$status' WHERE id = '$id' ";
      $sql1 = "INSERT INTO `transaction`(`id`, `user_id`, `title`, `price`, `timestamp`) VALUES ('','$id','Registration Fee','$price','')";
      $query = mysqli_query($conn,$sql);
      $query1 = mysqli_query($conn,$sql1);
      if ($query && $query1) {
        header('Location:./dashboard');
        ob_end_flush();
      }
      else{}
    }
    
  }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PowerX Academy Checkout Form</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="iphone">
  <header class="header">
    <h1>Checkout</h1>
  </header>
  <form id="paymentForm" class="form" method="POST">
    <div>
      <h2>Address</h2>

      <div class="card">
        <address>
          <?php echo $name ?> <br />
          <?php echo $address ?><br />
          <?php echo $state.', '.$country ?>
        </address>
      </div>
    </div>

    <fieldset>
      <legend>Payment Method</legend>

      <div class="form__radios">
        <div class="form__radio">
          <label for="visa"><svg class="icon">
              <use xlink:href="#icon-visa" />
            </svg>Visa Payment</label>
          <input checked id="visa" name="payment-method" type="radio" value="visa"/>
        </div>
        <!--
        <div class="form__radio">
          <label for="paypal"><svg class="icon">
              <use xlink:href="#icon-paypal" />
            </svg>PayPal</label>
          <input id="paypal" name="payment-method" type="radio" value="paypal"/>
        </div>
-->
      </div>
    </fieldset>

    <div>
      <h2>Payment Details</h2>

      <table>
        <tbody>
          <tr>
            <td>Registration Fee</td>
            <td align="right">NGN <?php echo $price ?></td>
          </tr>
          <br>
        </tbody>
        <tfoot>
          <tr>
            <td>Total</td>
            <td align="right">NGN <?php echo $price ?></td>
          </tr>
        </tfoot>
      </table>
    </div>

    <div>
      <button class="button button--full" type="submit"><svg class="icon">
          <use xlink:href="#icon-shopping-bag" />
        </svg>Pay Now</button>
      
    </div>
  </form>
</div>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
  <symbol id="icon-shopping-bag" viewBox="0 0 24 24">
    <path d="M20 7h-4v-3c0-2.209-1.791-4-4-4s-4 1.791-4 4v3h-4l-2 17h20l-2-17zm-11-3c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6v-3zm-4.751 18l1.529-13h2.222v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h6v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h2.222l1.529 13h-15.502z" />
  </symbol>

  <symbol id="icon-paypal" viewBox="0 0 491.2 491.2">
    <path d="m392.049 36.8c-22.4-25.6-64-36.8-116-36.8h-152.8c-10.4 0-20 8-21.6 18.4l-64 403.2c-1.6 8 4.8 15.2 12.8 15.2h94.4l24-150.4-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-2.4-1.6-2.4-1.6 0 0 5.6-38.4 0-64-20.8-88" fill="#263b80" />
    <path d="m412.849 124.8c-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-29.6 186.4c-.8 7.2 4 13.6 11.2 13.6h79.2c9.6 0 17.6-7.2 19.2-16l.8-4 15.2-94.4.8-5.6c1.6-9.6 9.6-16 19.2-16h12c76.8 0 136.8-31.2 154.4-121.6 7.2-37.6 3.2-69.6-16-91.2-6.4-7.2-13.6-12.8-21.6-17.6" fill="#139ad6" />
    <path d="m391.249 116.8c-3.2-.8-6.4-1.6-9.6-2.4s-6.4-1.6-10.4-1.6c-12-2.4-25.6-3.2-39.2-3.2h-119.2c-3.2 0-5.6.8-8 1.6-5.6 2.4-9.6 8-10.4 14.4l-25.6 160.8-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-4.8-2.4-10.4-4.8-16.8-7.2-1.6 0-3.2-.8-4.8-.8" fill="#232c65" />
    <path d="m275.249 0h-152c-10.4 0-20 8-21.6 18.4l-36.8 230.4 246.4-246.4c-11.2-1.6-23.2-2.4-36-2.4z" fill="#2a4dad" />
    <path d="m441.649 153.6c-2.4-4-4-8-7.2-12-5.6-6.4-13.6-12-21.6-16.8-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-25.6 161.6z" fill="#0d7dbc" />
    <path d="m50.449 436.8h94.4l23.2-145.6c0-2.4.8-4 1.6-5.6l-131.2 131.2-.8 4.8c-.8 8 4.8 15.2 12.8 15.2z" fill="#232c65" />
    <path d="m246.449 0h-123.2c-3.2 0-5.6.8-8 1.6l-12 12c-.8 1.6-1.6 3.2-1.6 4.8l-24 150.4z" fill="#436bc4" />
    <path d="m450.449 232.8c2.4-12 3.2-23.2 3.2-34.4l-156 156c76-.8 135.2-32 152.8-121.6z" fill="#0cb2ed" />
    <path d="m248.849 471.2 12.8-80-100 100h68c9.6 0 17.6-7.2 19.2-16z" fill="#0cb2ed" />
    <g fill="#33e2ff" opacity=".6">
      <path d="m408.049 146.4 45.6 45.6c0-5.6-1.6-11.2-2.4-16.8l-40-40c-1.6 4-2.4 7.2-3.2 11.2z" />
      <path d="m396.849 180c-1.6 3.2-3.2 6.4-4.8 9.6l55.2 55.2c.8-4 1.6-8 2.4-12z" />
      <path d="m431.249 287.2c1.6-3.2 3.2-6.4 4.8-9.6l-60.8-60.8c-2.4 2.4-4 5.6-6.4 8z" />
      <path d="m335.249 250.4 69.6 69.6 7.2-7.2-68-68c-3.2 1.6-5.6 3.2-8.8 5.6z" />
      <path d="m292.849 266.4 76 76c3.2-1.6 6.4-3.2 9.6-4.8l-74.4-74.4c-4 .8-7.2 2.4-11.2 3.2z" />
      <path d="m320.849 353.6c4-.8 8.8-.8 12.8-1.6l-80-80c-4.8 0-8.8.8-13.6.8z" />
      <path d="m196.049 272.8h-6.4c-2.4 0-4.8.8-6.4.8l86.4 87.2c2.4-2.4 5.6-4.8 8.8-5.6z" />
      <path d="m164.049 314.4 94.4 94.4 2.4-12.8-94.4-94.4z" />
      <path d="m156.049 364.8 94.4 94.4 2.4-12-94.4-94.4z" />
      <path d="m150.449 403.2-1.6 12.8 75.2 75.2h5.6c2.4 0 4.8-.8 7.2-1.6z" />
      <path d="m140.049 466.4 24.8 24.8h14.4l-36.8-36.8z" />
    </g>
  </symbol>

  <symbol id="icon-visa" viewBox="0 0 504 504">
    <path d="m184.8 324.4 25.6-144h40l-24.8 144z" fill="#3c58bf" />
    <path d="m184.8 324.4 32.8-144h32.8l-24.8 144z" fill="#293688" />
    <path d="m370.4 182c-8-3.2-20.8-6.4-36.8-6.4-40 0-68.8 20-68.8 48.8 0 21.6 20 32.8 36 40s20.8 12 20.8 18.4c0 9.6-12.8 14.4-24 14.4-16 0-24.8-2.4-38.4-8l-5.6-2.4-5.6 32.8c9.6 4 27.2 8 45.6 8 42.4 0 70.4-20 70.4-50.4 0-16.8-10.4-29.6-34.4-40-14.4-7.2-23.2-11.2-23.2-18.4 0-6.4 7.2-12.8 23.2-12.8 13.6 0 23.2 2.4 30.4 5.6l4 1.6z" fill="#3c58bf" />
    <path d="m370.4 182c-8-3.2-20.8-6.4-36.8-6.4-40 0-61.6 20-61.6 48.8 0 21.6 12.8 32.8 28.8 40s20.8 12 20.8 18.4c0 9.6-12.8 14.4-24 14.4-16 0-24.8-2.4-38.4-8l-5.6-2.4-5.6 32.8c9.6 4 27.2 8 45.6 8 42.4 0 70.4-20 70.4-50.4 0-16.8-10.4-29.6-34.4-40-14.4-7.2-23.2-11.2-23.2-18.4 0-6.4 7.2-12.8 23.2-12.8 13.6 0 23.2 2.4 30.4 5.6l4 1.6z" fill="#293688" />
    <path d="m439.2 180.4c-9.6 0-16.8.8-20.8 10.4l-60 133.6h43.2l8-24h51.2l4.8 24h38.4l-33.6-144zm-18.4 96c2.4-7.2 16-42.4 16-42.4s3.2-8.8 5.6-14.4l2.4 13.6s8 36 9.6 44h-33.6z" fill="#3c58bf" />
    <path d="m448.8 180.4c-9.6 0-16.8.8-20.8 10.4l-69.6 133.6h43.2l8-24h51.2l4.8 24h38.4l-33.6-144zm-28 96c3.2-8 16-42.4 16-42.4s3.2-8.8 5.6-14.4l2.4 13.6s8 36 9.6 44h-33.6z" fill="#293688" />
    <path d="m111.2 281.2-4-20.8c-7.2-24-30.4-50.4-56-63.2l36 128h43.2l64.8-144h-43.2z" fill="#3c58bf" />
    <path d="m111.2 281.2-4-20.8c-7.2-24-30.4-50.4-56-63.2l36 128h43.2l64.8-144h-35.2z" fill="#293688" />
    <path d="m0 180.4 7.2 1.6c51.2 12 86.4 42.4 100 78.4l-14.4-68c-2.4-9.6-9.6-12-18.4-12z" fill="#ffbc00" />
    <path d="m0 180.4c51.2 12 93.6 43.2 107.2 79.2l-13.6-56.8c-2.4-9.6-10.4-15.2-19.2-15.2z" fill="#f7981d" />
    <path d="m0 180.4c51.2 12 93.6 43.2 107.2 79.2l-9.6-31.2c-2.4-9.6-5.6-19.2-16.8-23.2z" fill="#ed7c00" />
    <g fill="#051244">
      <path d="m151.2 276.4-27.2-27.2-12.8 30.4-3.2-20c-7.2-24-30.4-50.4-56-63.2l36 128h43.2z" />
      <path d="m225.6 324.4-34.4-35.2-6.4 35.2z" />
      <path d="m317.6 274.8c3.2 3.2 4.8 5.6 4 8.8 0 9.6-12.8 14.4-24 14.4-16 0-24.8-2.4-38.4-8l-5.6-2.4-5.6 32.8c9.6 4 27.2 8 45.6 8 25.6 0 46.4-7.2 58.4-20z" />
      <path d="m364 324.4h37.6l8-24h51.2l4.8 24h38.4l-13.6-58.4-48-46.4 2.4 12.8s8 36 9.6 44h-33.6c3.2-8 16-42.4 16-42.4s3.2-8.8 5.6-14.4" />
    </g>
  </symbol>
</svg>
<form method="POST" id="checkout" style="display:none;"> 
  <input type="text" name='id'  value='<?php echo $id ?>'>
  <input type="text" name='email' class="email" value='<?php echo $email ?>'>
  <input type="text" name='price' id="price" value='<?php echo $price ?>'>
  <input type="text" name='duration' value='<?php echo $duration ?>'>
  <input type="text" name='status' class="status" value=''>
</form>
<!-- partial -->

  <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script>
        const paymentForm = document.getElementById('paymentForm');
        var x = paymentForm["payment-method"].value;
        if (x == "visa") {
          paymentForm.addEventListener("submit", payWithPaystack, false);
        }
        else if(x == "paypal"){
          paymentForm.addEventListener("submit", payWithPayPal, false);
        }
        else{
          alert('Click a Valid Payment Method');
        }
        
        function payWithPayPal(e){
          alert('Paypal has not been integrated');
        }
        function payWithPaystack(e) {
          e.preventDefault();
          let handler = PaystackPop.setup({
            key:'pk_live_d6cf8602ea358344b10159a142f55329d03c1521',
            email: $('.email').val(),
            amount: parseInt($('#price').val())*100,
            currency: 'NGN',
            channels:['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              $('.status').val('paid');
              $("#checkout").submit();
            }
          });
          handler.openIframe();
        }

    </script>
</body>
</html>
