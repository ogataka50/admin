<?php include APPPATH . '/views/common/header.php'; ?>
<?php include APPPATH . '/views/common/menu.php'; ?>

<div>
	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<form id="mod_date">
			<select name='from_year'>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
			</select>
			<select name='from_month'>
				<?php for($i=1; $i <= 12; $i++ ): ?>
					<option value="<?php echo $i ?>" <?php if($i == $from_month): ?>selected<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			 </select>
			<select name='from_day'>
				<?php for($i=1; $i <= 31; $i++ ): ?>
					<option value="<?php echo $i ?>" <?php if($i == $from_day): ?>selected<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
			<select name='to_year'>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
			 </select>
			<select name='to_month'>
				<?php for($i=1; $i <= 12; $i++ ): ?>
					<option value="<?php echo $i ?>" <?php if($i == $to_month): ?>selected<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
			<select name='to_day'>
				<?php for($i=1; $i <= 31; $i++ ): ?>
					<option value="<?php echo $i ?>" <?php if($i == $to_day): ?>selected<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			 </select>
			<button id='mod'>変更</button>
		</form>
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
			<canvas id="lineChart" width="800" height="400"></canvas>
			<canvas id="barChart" width="800" height="400"></canvas>
			<div class="row">
				<div class="col-xs-4">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">日ごとデータ</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
						<?php if(count($dayly_list)): ?>
							<table id="target" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>日付</th>
									<th>値１</th>
									<th>値２</th>
									<th>値３</th>
								</tr>
								</thead>
								<tbody>
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

<?php include APPPATH . '/views/common/footer.php'; ?>
