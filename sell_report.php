<?php include 'db_connect.php' ?>
<?php 

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

?>
<style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<form id="filter-report">
						<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right">Month of: </label>
							<input type="month" name="month_of" class='from-control col-md-4' value="<?php echo ($month_of) ?>">
							<button class="btn btn-sm btn-block btn-primary col-md-2 ml-1">Filter</button>
						</div>
					</form>
					<hr>
						<div class="row">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div>
					<div id="report">
						<div class="on-print">
							 <p><center>Sell Report</center></p>
							 <p><center>for the Month of <b><?php echo date('F ,Y',strtotime($month_of.'-1')) ?></b></center></p>
						</div>
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Owner</th>
										<th>House #</th>
										<th>Seller</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									$tamount = 0;
									$purches  = $conn->query("SELECT p.*, u.name as name, o.name as seller, h.house_no as house  from purches p inner join houses h on h.id = p.house_id inner join users o on o.id = p.seller_id  inner join users u on u.id = p.user_id where date_format(p.created_at,'%Y-%m') = '$month_of' order by unix_timestamp(created_at)  desc");
									if($purches->num_rows > 0 ):
									while($row=$purches->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td><?php echo date('d M, Y',strtotime($row['created_at'])) ?></td>
										<td><?php echo ucwords($row['name']) ?></td>
										<td><?php echo $row['house'] ?></td>
										<td><?php echo $row['seller'] ?></td>
										<td class="text-right"><?php echo number_format($row['price'],2) ?></td>
									</tr>
								<?php endwhile; ?>
								<?php endif ?>

								</tbody>
		
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#print').click(function(){
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("","_blank","width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
		nw.close()
		},500)
	})
	$('#filter-report').submit(function(e){
		e.preventDefault()
		location.href = 'index.php?page=payment_report&'+$(this).serialize()
	})
</script>