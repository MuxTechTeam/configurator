<?php 
session_start();


require_once 'Functions/DB_Functions.php';
$db = new DB_Functions();


$allproducts = $db->getproducts();
$allproductss = $db->getproducts();

if (isset($_POST['partidd'])) {
	$id = $_POST['partidd'];


$result =$db->getmetrialvariation($id);
$PartIds = array();
while ($row = mysqli_fetch_array($result)) {

	 $ProductId = $row['ProductId'];
	$Parts = $db->getproductparts($ProductId);
	$partcount = mysqli_num_rows($Parts);
  $prow = mysqli_fetch_array($Parts);
 $part = $db->getproductpartsbyid($id);
$pprow = mysqli_fetch_array($part);
$partname = $pprow['PartName'];
$PartId = $pprow['PartId'];

$isSubPart = $row['isSubVariation'];
$VariationId  = $row['VariationId'];

$html = '<ul>';
if($isSubPart){
$suvariations =$db->getmetrialvariation($VariationId);

while($subVArrow = mysqli_fetch_array($suvariations)){

	 $ProductId1 = $row['ProductId'];
	 $Parts1 = $db->getproductparts($ProductId);
	 $partcount1 = mysqli_num_rows($Parts);
	 $prow1 = mysqli_fetch_array($Parts);
	 $part1 = $db->getproductpartsbyid($id);
	 $pprow1 = mysqli_fetch_array($part);
	 $partname1 = $pprow['PartName'];
	 $PartId1 = $pprow['PartId']; 
	 if ($partcount >= 2) {
	 	$varname1 = "varname".$partname1;
		$varprice1 = "varprice".$partname1;

		$click = "document.getElementById('".$partname1."').src='AdminDashboard/uploads/".$subVArrow['VariationPic']."' , document.getElementById('".$varname1."').innerHTML='".$subVArrow['VariationValue']."',document.getElementById('".$varname1."').setAttribute('partid', ".$PartId1.") , document.getElementById('".$varprice1."').innerHTML='".$subVArrow['VariationPrice']."' ";

		$html .='<li onclick="'.$click.'" class="text list-group-item col-xs-12 activex select-1" id="price5-1" data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/'.$subVArrow['VariationPic'].'"></span>'.$subVArrow['VariationValue'].'
									<span class="tab-space"></span>
									 
								</li>
								';
	 }else{
	 	$html .= '<li onclick="document.getElementById("'.$ProductId1.'").src='."'".'AdminDashboard/uploads/'.$subVArrow['VariationPic']."'".'" class="text list-group-item col-xs-12 activex select-1" id="price5-1" data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/'.$subVArrow['VariationPic'].'"></span>'.$subVArrow['VariationValue'].'
									<span class="tab-space"></span> 
								</li>
								';
	 }

}

}
$html .= '</ul>';
//print_r($html);exit;
	if ($partcount >= 2) {
		$varname = "varname".$partname;
		$varprice = "varprice".$partname;
		 
		         	 ?>

	

<li onclick="document.getElementById('<?php echo $partname; ?>').src='AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>' , document.getElementById('<?php echo $varname; ?>').innerHTML='<?php echo $row['VariationValue']; ?>',document.getElementById('<?php echo $varname; ?>').setAttribute('partid', '<?php echo $PartId; ?>') , document.getElementById('<?php echo $varprice; ?>').innerHTML='<?php echo $row['VariationPrice']; ?>'" class="text list-group-item col-xs-12 activex select-1" id='price5-1' data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>"></span><?php echo $row['VariationValue']; ?>
									<span class="tab-space"></span>
									 <?php echo $html; ?>
								</li>
								<script> 
									
								</script>
<?php 
}
else{
	?>

<li onclick="document.getElementById('<?php echo $ProductId; ?>').src='AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>'" class="text list-group-item col-xs-12 activex select-1" id='price5-1' data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>"></span><?php echo $row['VariationValue']; ?>
									<span class="tab-space"></span>
									 <?php echo $html; ?>
								</li>
								<script></script>

<?php 

}
}
}

	if (isset($_POST['partidc'])) {
	$id = $_POST['partidc'];


$result =$db->getcolorvariation($id);
$PartIds = array();
while ($row = mysqli_fetch_array($result)) {

	 $ProductId = $row['ProductId'];
	$Parts = $db->getproductparts($ProductId);
	$partcount = mysqli_num_rows($Parts);
  $prow = mysqli_fetch_array($Parts);
 $part = $db->getproductpartsbyid($id);
$pprow = mysqli_fetch_array($part);
$partname = $pprow['PartName'];
 
	if ($partcount >= 2) {
		         	 ?>
	

<li onclick="document.getElementById('<?php echo $partname; ?>').src='AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>'" class="text list-group-item col-xs-12 activex select-1" id='price5-1' data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>"></span><?php echo $row['VariationValue']; ?>
									<span class="tab-space"></span>
									 
								</li>
<?php 
}
else{
	?>

<li onclick="document.getElementById('<?php echo $ProductId; ?>').src='AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>'" class="text list-group-item col-xs-12 activex select-1" id='price5-1' data-price="400" data-code="plastic">
								<span class="chat-img pull-left">
									<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $row['VariationPic']; ?>"></span><?php echo $row['VariationValue']; ?>
									<span class="tab-space"></span>
									  
								</li>

<?php 

}
}

	}
?>








