<?php 

include('asside.php')
// include('query.php')
?>

        <!--End Page Title-->
       
        <?php 
				if(isset($_GET['at_id'])){
					$id = $_GET['at_id'];
					$query=mysqli_query($mysqli,"SELECT * FROM `orderss` WHERE order_id=$id");
					while($pro=mysqli_fetch_array($query)){
                        $total=$pro[17]*$pro[18];
                        $count+=$total;
				
				?>

        <div class="container" style=" margin-top: 5%;">
        	<div class="row">
                    <div class="col-xl col-lg-6 col-md-6 col-sm-12 mb-3">
                        <div class="customer-box returning-customer">
                            <h3><i class="icon anm anm-user-al"></i> Receipt Of The Products And Customer Details <br> <br>‎ ‎ ‎ ‎ ‎ ‎   (YOU FIND THE PRODUCT IN YOUR ORDER ID) = <span style="color: rgb(255, 221, 68);"><?php echo $pro[13]?></span></h3>
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

                
            </div>

            <div class="row billing-fields">
                <div class="col-xl col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form action="checkout.php?checkout=true" method='POST'>
                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-10 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">User Name <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[1]?></h3>
                                    </div>
                                    <div class="form-group col-md-10 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname"><b>statement</b><span class="required-f">*</span></label>
                                        <h3 style='color:rgb(126, 126, 0);'><?php echo $pro[20]?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[2]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[3]?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[4]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[5]?></h3>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-company">whatsapp No</label>
                                        <h3><?php echo $pro[6]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-address-1">Address <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[7]?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-address-2">Apartment <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[8]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-city">City <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[9]?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-postcode">Post Code <span class="required-f">*</span></label>
                                        <h3><?php echo $pro[10]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-country">Country Code <span class="required-f">*</span></label>
                                        <h3>+<?php echo $pro[11]?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-zone">Payment<span class="required-f">*</span></label>
                                      <h3><?php echo $pro[12]?></h3>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-zone">You can cancel the order within 3 days<span class="required-f">*</span></label>
                                      <h3><?php echo $pro[19]?></h3>
                                    </div>
                                </div>
                            </fieldset>

                           
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="your-order-payment">
                                    <div class="your-order">
                                        <h2 class="order-title mb-4">Your Order</h2>
            
                                        <div class="table-responsive-sm order-table"> 
                                            <table class="bg-white table table-bordered table-hover text-center">
                                            <thead>
                                                    <tr>
                                                    <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                            
                                               
                                                <tbody>
                                                    <tr>
                                                    <td class="text-left"><?php echo $pro[15]?></td>
                                                        <td class="text-left"><?php echo $pro[16]?></td>
                                                        <td>$<?php echo $pro[17]?></td>
                                                        <td><?php echo $pro[18]?></td>
                                                        <td>$<?php echo $total?></td>
                                                        
                                                    </tr>
                                                </tbody>
                                                
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
                                    <a href="delete.php?aid=<?php echo $pro[0]; ?>" 
   onclick="return confirm('Are you sure you want to delete this record?');" 
   class="btn btn-sm btn-danger btn-action">Delete <i class="fas fa-trash-alt"></i></a>

 
                      
                    </div>
                </div>

                

                
            </div>
        </div>
        
   
        <?php 
}}else {
    echo "<script>alert('Order Not Found!');location.assign('home7-shoes.php');</script>";
}; ?> 


<div class='pg1' style="height: 100vh; width: 100%; background-color: #fff;" >
    <h1 style="margin-top: 30%; font-size: 10%; color: black; font-weight: bold;">Data Not Found</h1>
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
    
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