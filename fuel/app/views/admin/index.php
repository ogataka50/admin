<?php include APPPATH . '/views/common/header.php'; ?>
<?php include APPPATH . '/views/common/menu.php'; ?>

<div>

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
        <canvas id="line" width="800" height="400"></canvas>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-4">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">日ごとデータ</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
						<?php if(count($dayly_list)): ?>
							<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>日付</th>
									<th>値１</th>
									<th>値２</th>
									<th>値３</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($dayly_list as $key => $val): ?>
									<tr>
										<td><?php echo $val['date'] ?></td>
										<td><?php echo $val['value_1'] ?></td>
										<td><?php echo $val['value_2'] ?></td>
										<td><?php echo $val['value_3'] ?></td>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						<?php else: ?>
							データがありません。
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<script>
jQuery(function(){
var data = {
    labels: new Array(),
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: new Array()
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: new Array()
        }
    ]
};
console.log(data);

<?php foreach ($dayly_list as $key => $val): ?>
data["datasets"][0]["data"].push(<?php echo $val["value_1"]?>);
data["datasets"][1]["data"].push(<?php echo $val["value_2"]?>);
data["labels"].push(<?php echo $val['day'] ?> + '日');
<?php endforeach ?>
console.log(data);
	var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(data);
});
</script>
<?php include APPPATH . '/views/common/footer.php'; ?>