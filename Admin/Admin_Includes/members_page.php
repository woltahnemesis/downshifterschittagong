<div class="members-table">
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Age</th>
                <th>Email</th>
                <th>Address</th>
                <th>Car Brand</th>
                <th>Car Year</th>
                <th>Car Model</th>
                <th>Car Name</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = 'SELECT * FROM membership';
            $cmd = $db->prepare($sql);
            $cmd->execute();

            $members = $cmd->fetchAll();

            foreach($members as $value){
                $id = $value['id'];
                $fName = $value['fName'];
                $lName = $value['lName'];
                $birthday = $value['birthday'];
                $age = $value['age'];
                $email = $value['email'];
                $address = $value['address'];
                $carBrand = $value['carBrand'];
                $carYear = $value['carYear'];
                $carModel = $value['carModel'];
                $carName = $value['carName'];

                echo "<tr>";
                echo "<td>$fName</td>";
                echo "<td>$lName</td>";
                echo "<td>$birthday</td>";
                echo "<td>$age</td>";
                echo "<td>$email</td>";
                echo "<td>$address</td>";
                echo "<td>$carBrand</td>";
                echo "<td>$carYear</td>";
                echo "<td>$carModel</td>";
                echo "<td>$carName</td>";
                echo "<td><a href='admin_members.php?page=update&id=$id' class='update-a'>Update</a></td>";
                echo "<td><a href='Admin_Includes/delete_member.php?id=$id' class='delete-a' id='delete-a' onclick='return confirmation();'>Delete</a></td>";

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>