<div class="row">
	<div class="col-xl-10 order-xl-1">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col-8">
						<h3 class="mb-0">Form tambah User</h3>
					</div>
					
				</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('Users/adduserpost');?>" method="post">
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-address">Nama</label>
									<input id="input-address" class="form-control" placeholder="masukkan nama" value="" type="text" name="nama" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-address">Password</label>
									<input id="input-address" class="form-control" placeholder="masukkan password" value="" type="password" name="password" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nilai X</label>
									<input type="text" id="input-username" class="form-control" placeholder="X" value="" name="nil_x" required="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nilai Y</label>
									<input type="text" id="input-username" class="form-control" placeholder="Y" value="" name="nil_y" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">Nilai W</label>
									<input type="text" id="input-first-name" class="form-control" placeholder="W" value="" name="nil_w" required="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-last-name">Nilai H</label>
									<input type="text" id="input-last-name" class="form-control" placeholder="H" value="" name="nil_h" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button class="btn btn-primary" type="submit">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>