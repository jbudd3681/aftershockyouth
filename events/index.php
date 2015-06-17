<?php 
session_start();
$pageTitle = 'Events | AfterShock Youth';

include('../assets/inc/config.php');
include(ROOT_PATH.'assets/db/db_config.php');
include(ROOT_PATH.'assets/inc/header.php');
// if(empty($_GET['pg'])){
// 	$currentPage = 1;
// }else{
// 	$currentPage = $_GET['pg'];
// }
// $currentPage = intval($currentPage);


// $total_events = count_events();
// $total_per_page = 10;
// $total_pages = ceil($total_events / $total_per_page);
// if($currentPage > $total_pages){
// 	header("Location: ./?pg=". $total_pages);
// }
// if($currentPage < 1){
// 	header("Location: ./");
// }

// $start = (($currentPage - 1) * $total_per_page) + 1;
// $end = $currentPage * $total_per_page;
// if ($end > $total_events){
// 	$end = $total_events;
// }


// echo "total events: ".$total_events. "<br>";
// echo "total pages: ".$total_pages . '<br>';
// echo "(". $start . "-". $end . ")";
// exit;
?>
<div class="container margintop10">
	<table class="table table-striped">
		<tr>
			<th>Date / Time </th>
			<th>Description </th>
		</tr>
		<?php publicevents();?>

	</table>
</div>
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php 
include(ROOT_PATH."assets/inc/global_scripts.php");
include(ROOT_PATH."assets/inc/footer.php");
?>
