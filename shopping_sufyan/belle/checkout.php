<?php 

include('asside.php')
// include('query.php')
?>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Checkout</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <?php

if (isset($_GET['checkout'])) {
    // Fetch session variables
    $uid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
    $uname = isset($_SESSION['username']) ? $_SESSION['username'] : null;

    // Sanitize and validate POST inputs
    $fnam = isset($_POST['firstname']) ? mysqli_real_escape_string($mysqli, $_POST['firstname']) : '';
    $lnam = isset($_POST['lastname']) ? mysqli_real_escape_string($mysqli, $_POST['lastname']) : '';
    $tel = isset($_POST['telephone']) ? mysqli_real_escape_string($mysqli, $_POST['telephone']) : '';
    $comp = isset($_POST['company']) ? mysqli_real_escape_string($mysqli, $_POST['company']) : '';
    $address = isset($_POST['address_1']) ? mysqli_real_escape_string($mysqli, $_POST['address_1']) : '';
    $apart = isset($_POST['address_2']) ? mysqli_real_escape_string($mysqli, $_POST['address_2']) : '';
    $city = isset($_POST['city']) ? mysqli_real_escape_string($mysqli, $_POST['city']) : '';
    $postal = isset($_POST['postcode']) ? mysqli_real_escape_string($mysqli, $_POST['postcode']) : '';
    $country = isset($_POST['country_id']) ? mysqli_real_escape_string($mysqli, $_POST['country_id']) : '';
    $zone = isset($_POST['zone_id']) ? mysqli_real_escape_string($mysqli, $_POST['zone_id']) : '';
    $uemaill = isset($_POST['email']) ? mysqli_real_escape_string($mysqli, $_POST['email']) : '';

    // Generate a unique 6-digit order_id
    do {
        $order_id = mt_rand(100000, 999999);  // Generate a random 6-digit number
        // Check if the generated order_id already exists in the database
        $check_order_id = "SELECT order_id FROM `orderss` WHERE order_id = '$order_id' LIMIT 1";
        $result = mysqli_query($mysqli, $check_order_id);
    } while (mysqli_num_rows($result) > 0);  // Keep generating until a unique ID is found

    // Validate required fields
    $required_fields = [$fnam, $lnam, $tel, $address, $city, $postal, $country, $zone, $uemaill];
    foreach ($required_fields as $field) {
        if (empty($field)) {
            echo "Error: All fields are required.";
            exit; // Stop execution if a required field is empty
        }
    }

    // Check for a valid email format
    if (!filter_var($uemaill, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format.";
        exit;
    }

    // Check if the cart is not empty
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            if (is_array($item)) {
                $pid = isset($item['pid']) ? $item['pid'] : '';
                $pname = isset($item['pname']) ? $item['pname'] : '';
                $pprice = isset($item['pprice']) ? $item['pprice'] : 0;
                $pqty = isset($item['pqty']) ? $item['pqty'] : 1;

                // Generate unique product ID for each item in the order
                $product_id = $pid;  // Assuming $pid is already unique for each product

                // Insert each order into the database using prepared statements
                $stmt = $mysqli->prepare("INSERT INTO `orderss` (`u_name`, `fnam`, `lnam`, `uemaill`, `tel`, `comp`, `address`, `apart`, `city`, `postal`, `country`, `payment`, `uid`, `prrid`, `pnam`, `ppric`, `pqt`, `order_id`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if ($stmt) {
                    // Bind parameters: Note that order_id is now a 6-digit number
                    $stmt->bind_param("ssssssssssssssssss", $uname, $fnam, $lnam, $uemaill, $tel, $comp, $address, $apart, $city, $postal, $country, $zone, $uid, $product_id, $pname, $pprice, $pqty, $order_id);
                    
                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "Order for Product ID: $pid, Name: $pname, Price: $pprice, Quantity: $pqty has been placed successfully.";
                    } else {
                        echo "Error inserting order: " . $stmt->error; // Output any errors
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $mysqli->error; // Output prepare statement error
                }
            } else {
                echo "Error: Cart item is not valid.";
            }
        }

        // Clear the cart after processing
        unset($_SESSION['cart']); 
        echo "<script>alert('Order placed successfully!'); location.assign('receipt.php?at_id=" . $order_id . "');</script>";
    } else {
        echo "Your cart is empty.";
    }
}


?>


        <div class="container">
        	<div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box returning-customer">
                        <h3><i class="icon anm anm-user-al"></i> Returning customer? <a href="#customer-login" id="customer" class="text-white text-decoration-underline" data-toggle="collapse">Click here to login</a></h3>
                        <div id="customer-login" class="collapse customer-content">
                            <div class="customer-info">
                                <p class="coupon-text">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <div class="row">
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Email address <span class="required-f">*</span></label>
                                            <input type="email" class="no-margin" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputPassword1">Password <span class="required-f">*</span></label>
                                            <input type="password" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check width-100 margin-20px-bottom">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value=""> Remember me!
                                                </label>
                                                <a href="#" class="float-right">Forgot your password?</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class="text-white text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                    <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                    <input id="coupon-code" required="" type="text" class="mb-3">
                                    <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form action="checkout.php?checkout=true" method='POST'>
                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                        <input name="firstname" value="" required id="input-firstname" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                        <input name="lastname" value="" id="input-lastname" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                        <input name="email" value="" id="input-email" type="email" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                        <input name="telephone" value="" id="input-telephone" type="tel" required>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-company">whatsapp No</label>
                                        <input name="company" value="" id="input-company" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-address-1">Address <span class="required-f">*</span></label>
                                        <input name="address_1" value="" id="input-address-1" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-address-2">Apartment <span class="required-f">*</span></label>
                                        <input name="address_2" value="" id="input-address-2" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-city">City <span class="required-f">*</span></label>
                                        <input name="city" value="" id="input-city" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-postcode">Post Code <span class="required-f">*</span></label>
                                        <input name="postcode" value="" id="input-postcode" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-country">Country <span class="required-f">*</span></label>
                                        <select name="country_id" id="input-country" required>
                                            <option value=""> --- Please Select --- </option>
                                            <option value="244">Aaland Islands</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-zone">Payment<span class="required-f">*</span></label>
                                        <select name="zone_id" id="input-zone" required>
                                            <option value="cash">Cash on Delivery</option>
                                            <option value="Online">Online</option>
                                            <option value="Card">Card</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group form-check col-md-12 col-lg-12 col-xl-12">
                                        <label class="form-check-label padding-15px-left">
                                            <input type="checkbox" class="form-check-input" value=""><strong>Create an account ?</strong>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                        <label for="input-company">Order Notes <span class="required-f">*</span></label>
                                        <textarea class="form-control resize-both" rows="3"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            
                      
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table"> 
                                <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                        <tr>
                                        <th>id</th>
                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                <?php 
$count=0;
if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $key => $val){
		$total=$val['pqty']*$val['pprice'];
		$count+=$total;
	

?>
                                   
                                    <tbody>
                                        <tr>
                                        <td class="text-left"><?php echo $val['pid']?></td>
                                            <td class="text-left"><?php echo $val['pname']?></td>
                                            <td>$<?php echo $val['pprice']?></td>
                                            <td><?php echo $val['pqty']?></td>
                                            <td>$<?php echo $total?></td>
                                        </tr>
                                    </tbody>
                                    <?php }}?>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>$0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>$<?php echo $count?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                           
                        <button type="submit">Checkout</button>
                            <!-- <a href="?checkout" type='submit'  class="btn btn--small-wide checkout" name='checkout'  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Proceed to Checkout</a> -->
						
                        </form>
                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">payment method</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">Direct Bank Transfer </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">Cheque Payment</a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card margin-15px-bottom border-radius-none">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> PayPal </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour"> Payment Information </a>
                                            </div>
                                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardname">Name on Card <span class="required-f">*</span></label>
                                                                <input name="cardname" value="" placeholder="Card Name" id="input-cardname" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-country">Credit Card Type <span class="required-f">*</span></label>
                                                                <select name="country_id" class="form-control">
                                                                    <option value=""> --- Please Select --- </option>
                                                                    <option value="1">American Express</option>
                                                                    <option value="2">Visa Card</option>
                                                                    <option value="3">Master Card</option>
                                                                    <option value="4">Discover Card</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardno">Credit Card Number  <span class="required-f">*</span></label>
                                                                <input name="cardno" value="" placeholder="Credit Card Number" id="input-cardno" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cvv">CVV Code <span class="required-f">*</span></label>
                                                                <input name="cvv" value="" placeholder="Card Verification Number" id="input-cvv" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label>Expiration Date <span class="required-f">*</span></label>
                                                                <input type="date" name="exdate" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <img class="padding-25px-top xs-padding-5px-top" src="assets/images/payment-img.jpg" alt="card" title="card" />
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
    <footer id="footer">
        <div class="newsletter-section">
            <div class="container">
                <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                            <div class="display-table">
                                <div class="display-table-cell footer-newsletter">
                                    <div class="section-header text-center">
                                        <label class="h2"><span>sign up for </span>newsletter</label>
                                    </div>
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required="">
                                            <span class="input-group__btn">
                                                <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe"><span class="newsletter__submit-text--large">Subscribe</span></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                            <div class="footer-social">
                                <ul class="list--inline site-footer__social-icons social-icons">
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>    
        </div>
        <div class="site-footer">
        	<div class="container">
     			<!--Footer Links-->
            	<div class="footer-top">
                	<div class="row">
                    	<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Quick Shop</h4>
                            <ul>
                            	<li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Sportswear</a></li>
                                <li><a href="#">Sale</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Informations</h4>
                            <ul>
                            	<li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Terms &amp; condition</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Customer Services</h4>
                            <ul>
                            	<li><a href="#">Request Personal Data</a></li>
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        	<h4 class="h4">Contact Us</h4>
                            <ul class="addressFooter">
                            	<li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque,<br>2568 steet, 23568 NY</p></li>
                                <li class="phone"><i class="icon anm anm-phone-s"></i><p>(440) 000 000 0000</p></li>
                                <li class="email"><i class="icon anm anm-envelope-l"></i><p>sales@yousite.com</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Footer Links-->
                <hr>
                <div class="footer-bottom">
                	<div class="row">
                    	<!--Footer Copyright-->
	                	<div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span> <a href="templateshub.net">Templates Hub</a></div>
                        <!--End Footer Copyright-->
                        <!--Footer Payment Icon-->
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                        	<ul class="payment-icons list--inline">
                        		<li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                                <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <!--End Footer Payment Icon-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
</div>
</body>

<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->
</html>