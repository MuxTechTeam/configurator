<?php

  class DB_Functions {

       private $db_con;
      // constructor
      function __construct() {
         require_once 'DB_Connect.php';
          $db = new DB_Connect;
          $this->db_con = $db->connect();
      }

      // destructor
      function __destruct() {
          
      }

public function getproducts() {
    
       $result = $this->db_con->query("SELECT * FROM `products`");

          if ($result) {
                         return $result;
            }
}

public function getproductbyId($pid) {
    
       $result = $this->db_con->query("SELECT * FROM `products` WHERE Id='$pid'");

          if ($result) {
                         return $result;
            }
}

public function getproductparts($productid) {
    $result = $this->db_con->query("SELECT * FROM `products_parts` WHERE ProductId = '$productid'");

          if ($result) {

            return $result;
            
            }
}
public function getproductpartsbyid($id) {
    $result = $this->db_con->query("SELECT * FROM `products_parts` WHERE PartId = '$id'");

          if ($result) {

            return $result;
            
            }
}



public function InsertProduct($Productname , $Dpic , $Dprice ){
$result = $this->db_con->query("INSERT INTO `products`( `ProductName`, `Dpic`, `Dprice`) VALUES ('$Productname','$Dpic','$Dprice')");

          if ($result) {

            return 1;
            
            }
            else{
                return 0;
            }


}
public function addproductpart($Productid , $partname , $partpic  ){
$result = $this->db_con->query("INSERT INTO `products_parts`( `ProductId`, `PartName` , `partpic` ) VALUES ('$Productid','$partname' , '$partpic')");

          if ($result) {

            return 1;
            
            }
            else
            {
                return 0;
            }


}




public function getvariation($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  PartId = '$Partid'");

         if ($result) {
             
              $row = mysqli_fetch_assoc($result);
            return $row;
            }
}

public function getmetrialvariation($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE VariationName = 'Material' AND PartId = '$Partid'");

         if ($result) {
             
            return $result;
            }
}
public function getcolorvariation($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE VariationName = 'Color' AND PartId = '$Partid'");

         if ($result) {
             
            return $result;
            }
}

public function getvariationbyproduct($Productid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  ProductId = '$Productid'");

         if ($result) {
             
             
            return $result;
            }
}
public function getvariationbypartid($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  PartId = '$Partid'");

         if ($result) {
             
             
            return $result;
            }
}






public function insertvariation($PartId, $Productid, $VariationName, $VariationValue , $VariationPrice , $Variationpic) {
    
       $result = $this->db_con->query("INSERT INTO `varation`( `PartId`, `Productid`,   `VariationName`, `VariationValue`, `VariationPrice` , VariationPic) VALUES ('$PartId', '$Productid' , '$VariationName', '$VariationValue' , '$VariationPrice' , '$Variationpic')");

         if ($result) {
             
             return $result;
            }
}






 
 
 public function getorderlist() {
    
       $result = $this->db_con->query("SELECT * FROM `orders`");

          if ($result) {
             
            
            return $result;
            
            }
}
 
         

         public function deletepart($Partid) {
    
       $result = $this->db_con->query("Delete FROM `products_parts` Where PartId='$Partid'");

          if ($result) {
             
            $result2 = $this->db_con->query("Delete FROM `varation` Where PartId='$Partid'");

            if ($result2) {
            
            return $result2;
             }
            }
}

public function deletevariation($variationid) {
    
       $result = $this->db_con->query("Delete FROM `varation` Where VariationId='$variationid'");

          if ($result) {
             
            
            return $result;
            
            }
}
 
         
    




}



?>
