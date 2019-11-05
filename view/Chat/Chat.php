

<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "Chat";
?>

<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
	#card-detail{
		color:white;
    	background-color:#F44336;
	}
	#calendar{

	}
	/* input[type="checkbox"]{
		position: absolute;
		right: 9000px;
	} */
	input[type=checkbox]{
		background-color:#F44336;
		color:#F44336;
	}
</style>


<div class="container">
    <div class="row">
    	
    </div>
</div>


<?php include_once("../layout/LayoutFooter.php"); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create" async defer></script>
<script src="Chat.js"></script>

<script>


</script>