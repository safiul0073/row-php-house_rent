<?php include('db_connect.php');?>
<?php
if (isset($_GET["house_id"])){
	$house_id = $_GET['house_id'];
	$save = $conn->query("UPDATE houses set is_selled = 0 where id = '$house_id'");
	if ($save) {
		$_SESSION['success'] = "Succefully Accepted";
	}
}
?>
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success">
			<h3>
				<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>
<div class="container-fluid">
	
	<div class="col-lg-12">

	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p {
		margin: unset;
		padding: unset;
		line-height: 1em;
	}
</style>
<script>

</script>