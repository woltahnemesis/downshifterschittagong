<?php include 'Includes/db.php'; ?>
<?php include 'Functions/functions.php';?>
<?php $title = 'Membership'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/banner.css">
        <link rel="stylesheet" href="CSS/intro.css">
        <link rel="stylesheet" href="CSS/member.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/anniversary.css">
        <link rel="stylesheet" href="CSS/membership.css">
        <script src="JavaScript/membership.js" async defer></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div class="container">
<!-- Above is custom header -->

            <div class="membership-div">
                <div class="sub-membership-div">
                    <h2>Membership Form</h2>
                    <form method="post" action="index.php?page=membership">
                        <div class="form-group">
                            <label for="fName">First Name</label>
                            <input type="text" name="fName" id="fName" maxlength="50" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="lName">Last Name</label>
                            <input type="text" name="lName" id="lName" maxlength="50" required />
                        </div>
                        
                        <div class="form-group"> 
                            <?php  
                            $date = Date('y.m.d');
                            $date = explode('.',$date);
                            $year = 2001+$date[0];
                            ?>
                            <label>Date of Birth</label>
                            <select name="dobYear" id="dobYear" required >
                                <?php 
                                    for($i = 1900; $i<$year;$i++){

                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                            <select name="dobMonth" id="dobMonth" required >
                                <?php 
                                    for($x = 1; $x<13;$x++){

                                ?>
                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php 
                                    }
                                ?>
                                
                            </select>
                            <select name="dobDay" id="dobDay" required >
                                <?php 
                                    for($y = 1; $y<33;$y++){

                                ?>
                                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="example@yahoo.com" maxlength="50" required />
                        </div>
                        
                        <div class="form-group">
                            <label>Address</label>
                            
                            <div class="required-address-div">
                                <input type="text" name="street" id="street" placeholder="Street" required />
                                <input type="text" name="city" id="city" placeholder="City" required />
                                <input type="text" name="country" id="country" placeholder="Country" required />
                            </div>
                            <div class="option-address-desc">
                                <p><small>If your country doesn't have postal code and province, you can leave those blank.</small></p>
                            </div>
                            
                            <div class="optional-address-div">
                                <input type="text" name="postalId" id="postalId" placeholder="Postal/Zip Code" />
                                <input type="text" name="province" id="province" placeholder="Province" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Car Information</label>
                            <div class="car-fill-div">
                                <input type="text" name="carBrand" id="carBrand" placeholder="Car Brand/Make" maxlength="15" />
                                <input type="text" name="carYear" id="carYear" placeholder="Car Year" 
                                       maxlength="4" />
                                <input type="text" name="carModel" id="carModel" placeholder="Car Model" maxlength="50" />
                                <input type="text" name="carName" id="carName" placeholder="Car Name" 
                                maxlength="70"/>                            
                            </div>
                        </div>
                        
                        <div class="option-address-desc">
                            <p><small>This is for car event purpose only and it's optional.</small></p>
                            <p><small>Don't have a car? You can leave the car section blank.   </small></p>
                        </div>
                        
                        <div class="form-group" id="bottom-group">
                            <!--<div class="flex-termscond-div">-->
                            <!--    <input type="checkbox" name="checkTerm" required />-->
                            <!--    <p><small>You agree to our <a href="#" id="termscond_p">terms and conditions.</a></small></p> -->
                            <!--</div>-->
                            <div class="flex-termscond-div">
                                <input type="checkbox" name="checkPrivacy" required  />
                                <p><small>You agree to our <a href="#" id="privacy_p">privacy policy.</a></small></p>                            
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit"/>
                        </div>
                    </form>  
                    
                    <?php membershipInsert(); ?>
                </div>
                
                <p id="go-back-p">&#x2190; Go back to <a href="index.php">home page.</a></p>
                
                <div class="modal-div" id="modal-div">
                    <div class="modal-box">
                        <div class="modal-banner" id="modal-banner">
                            <p><strong>Privacy Policy</strong></p>
                            <p class="close-btn" id="close-btn">&#10006;</p>
                        </div>
                        <div class="modal-desc">
                            <?php include 'privacy-policy.php' ?>
                        </div>
                    </div>
                </div>
            </div>
