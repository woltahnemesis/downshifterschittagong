<?php ob_start(); ?>

<?php 

function update_members($id){
    
    GLOBAL $db; 
    
    if(!$db){
        echo 'Not connected';
    } 

    if(isset($_POST['submit'])){
        
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        
        $byear = $_POST['byear'];
        $bmonth = $_POST['bmonth'];
        $bday = $_POST['bday'];
        
        $birthday = $byear.'-'.$bmonth.'-'.$bday;
        function getAge($x) {
            $today = date("Y-m-d");
            $diff = date_diff(date_create($x), date_create($today));
            return $diff->format('%y');
        }
        
        $age = getAge($birthday);
        $age = intval($age);
        
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        $carBrand = $_POST['carBrand'];
        $carYear = $_POST['carYear'];
        $carModel = $_POST['carModel'];
        $carName = $_POST['carName'];
        
        if(empty($carBrand)){
            $carBrand = '';
        } else {
            $carBrand = $_POST['carBrand'];
        }
        
        if(empty($carYear)){
            $carYear = '';
        } else {
            $carYear = $_POST['carYear'];
        }
        
        if(empty($carModel)){
            $carModel = '';
        } else {
            $carModel = $_POST['carModel'];
        }
        
        if(empty($carName)){
            $carName = '';
        } else {
            $carName = $_POST['carName'];
        }
        
        //Check existing email and id
        $sql = 'SELECT email, id FROM membership WHERE email = :email';
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR);
        $cmd->execute();
        
        //Fetch them
        $records = $cmd->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $values){
            $fetched_email = $values['email'];
            $fetched_id = $values['id'];
        }
        
        $count = $cmd->rowCount();
        
        $ok = true;
        
        //Checks number of records
        if($count == 1){
            //Checks if matches the id of the record
            if($id == $fetched_id){
                $ok = true;
            } else {
                $ok = false;
            }
        }else if($count == 0){
            $ok = true;
        } else {
            $ok = false;
        }
        if($ok){
            $sql = 'UPDATE membership SET fName = :fName, lName = :lName, birthday = :birthday, ';
            $sql .= 'age = :age, email = :email, address = :address, ';
            $sql .= 'carBrand = :carBrand, carYear = :carYear, carModel = :carModel, carName = :carName ';
            $sql .= 'WHERE id = :id ';
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT, 11);
            $cmd->bindParam(':fName', $fName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':lName', $lName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':birthday', $birthday, PDO::PARAM_STR, 10);
            $cmd->bindParam(':age', $age, PDO::PARAM_INT, 3);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 60);
            $cmd->bindParam(':address', $address, PDO::PARAM_STR, 110);
            $cmd->bindParam(':carBrand', $carBrand, PDO::PARAM_STR, 15);
            $cmd->bindParam(':carYear', $carYear, PDO::PARAM_STR, 4);
            $cmd->bindParam(':carModel', $carModel, PDO::PARAM_STR, 50);
            $cmd->bindParam(':carName', $carName, PDO::PARAM_STR, 70);
            $cmd->execute();
            
            header('Location: admin_members.php');
            
        } else {
            echo "Sorry, making multiple emails is not allowed."."<br />";
        }
    
    }
}

?>