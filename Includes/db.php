<?php 
try {
    $db = new PDO('mysql:host=localhost;dbname=id15671511_downshiftersdb', 'id15671511_downshifters', 'pHM2SD!4R5JX');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo 'Connection failed. '. $e->getMessage();
}
?>