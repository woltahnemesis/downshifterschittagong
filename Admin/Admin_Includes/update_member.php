<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<div class="sub-membership-div">
    <h2>Membership Form</h2>
    <form method="post" action="">
        <?php 
        $sql = 'SELECT * FROM membership WHERE id = :id';
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();

        while($row = $cmd->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $fName = $row['fName'];
            $lName = $row['lName'];
            $birthday = $row['birthday'];
            $age = $row['age'];
            $email = $row['email'];
            $address = $row['address'];
            $carBrand = $row['carBrand'];
            $carYear = $row['carYear'];
            $carModel = $row['carModel'];
            $carName = $row['carName'];
            
            $birthday = explode('-', $birthday);
        
        ?>
        <div class="form-group">
            <label for="fName">First Name</label>
            <input type="text" name="fName" id="fName" maxlength="50" value="<?php echo $fName;?>" required />
        </div>

        <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" name="lName" id="lName" maxlength="50" value="<?php echo $lName;?>"  required />
        </div>

        <div class="form-group"> 
            <label>Date of Birth</label>
            <input type="number" name="byear" id="year" placeholder="YYYY" value="<?php echo $birthday[0];?>" required />
            <input type="number" name="bmonth" id="month" placeholder="MM" value="<?php echo $birthday[1];?>" required />
            <input type="number" name="bday" id="day" placeholder="DD" value="<?php echo $birthday[2];?>" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@yahoo.com" maxlength="50" value="<?php echo $email;?>" required />
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Street, City, Province, Country, Postal Code" value="<?php echo $address;?>" required />
            
            
        </div>

        <div class="form-group" id="car-info-group">
            <label>Car Information</label>
            <div class="car-fill-div">
                <input type="text" name="carBrand" id="carBrand" placeholder="Car Brand/Make" maxlength="15" value="<?php echo $carBrand;?>" />
                <input type="text" name="carYear" id="carYear" placeholder="Car Year" 
                       maxlength="4" value="<?php echo $carYear;?>" />
                <input type="text" name="carModel" id="carModel" placeholder="Car Model" maxlength="50" value="<?php echo $carModel;?>" />
                <input type="text" name="carName" id="carName" placeholder="Car Name" 
                maxlength="70"value="<?php echo $carName;?>" />                            
            </div>
        </div>
        
        <?php } ?>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit"/>
        </div>
    </form>  
    
    <?php update_members($id) ?>
</div>

<p class="go-back"><a href="admin_members.php">Go back</a></p>