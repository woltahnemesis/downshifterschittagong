<?php 

function membershipInsert(){
    GLOBAL $db;
    
    if(isset($_POST['submit'])){
        
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];

        $dobYear = $_POST['dobYear'];
        $dobMonth = $_POST['dobMonth'];
        $dobDay = $_POST['dobDay'];
        
        $check_term = $_POST['checkTerm'];
        $check_privacy = $_POST['checkPrivacy'];
        
        $dob = $dobYear.'-'.$dobMonth.'-'.$dobDay;

        function getAge($x) {
            $today = date("Y-m-d");
            $diff = date_diff(date_create($x), date_create($today));
            return $diff->format('%y');
        }

        $age = getAge($dob);
        $age = intval($age);

        $email = $_POST['email'];

        $street = $_POST['street'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        $postalId = null;
        $province = null;

        if(!empty($_POST['postalId'])){
            $postalId = $_POST['postalId']; 
        }

        if(!empty($_POST['province'])){
            $province = $_POST['province'];
        }

        if(!empty($_POST['postalId']) && !empty($_POST['province'])){
            $address = $street.', '.$city.', '.$province.', '.$country.', '.$postalId;
        } else if (!empty($_POST['province'])){
            $address = $street.', '.$city.', '.$province.', '.$country;
        } else if (!empty($_POST['postalId'])){
            $address = $street.', '.$city.', '.$country.', '.$postalId;
        } else {
            $address = $street.', '.$city.', '.$country;
        }

        if(!empty($_POST['carBrand'])){
            $carBrand = $_POST['carBrand'];
        } else {
            $carBrand = null;
        }
        if(!empty($_POST['carYear'])){
            $carYear = $_POST['carYear'] ;
        } else {
            $carYear = null;
        }
        if(!empty($_POST['carModel'])){
            $carModel = $_POST['carModel'];
        } else {
            $carModel = null;
        }
        if(!empty($_POST['carName'])){
            $carName = $_POST['carName'];
        } else {
            $carName = null;
        }
        
        $sql = 'SELECT * FROM membership WHERE email = :email';
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR);
        $cmd->execute();
        
        $count = $cmd->rowCount();
        
        if($count >= 1){
            echo "Email has been used already. ";
        } else {
            $sql .= 'carBrand, carYear, carModel, carName) ';

            $sql = 'INSERT INTO membership (fName, lName, birthday, age, email, address, ';
            $sql .= 'carBrand, carYear, carModel, carName) ';
            $sql .= 'VALUES (:fName, :lName, :birthday, :age, :email, :address, ';
            $sql .= ':carBrand, :carYear, :carModel, :carName) ';

            $cmd = $db->prepare($sql);
            $cmd->bindParam(':fName', $fName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':lName', $lName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':birthday', $dob, PDO::PARAM_STR, 10);
            $cmd->bindParam(':age', $age, PDO::PARAM_INT, 3);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 60);
            $cmd->bindParam(':address', $address, PDO::PARAM_STR, 110);
            $cmd->bindParam(':carBrand', $carBrand, PDO::PARAM_STR, 10);
            $cmd->bindParam(':carYear', $carYear, PDO::PARAM_STR, 4);
            $cmd->bindParam(':carModel', $carModel, PDO::PARAM_STR, 30);
            $cmd->bindParam(':carName', $carName, PDO::PARAM_STR, 50);

            $cmd->execute();
            
            echo "<script>alert('You are all set!')</script>";
        }
    }
}

?>