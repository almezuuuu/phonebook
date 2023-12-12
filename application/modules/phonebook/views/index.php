<?php
main_header(['user']);
?>
<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-a teal-A700 It box-shadow">
		<div class="row">
			<div class="col-sm-12">
				<p class="m-b-0 _400"><i class="fa fa-book"></i> PHONEBOOK </p>
			</div>
		</div>
	</div>
	<div id="pageMessages"></div>
	<div class='box p-a'>
		<div class="box box-body">
			<div class="b-b nav-active-bg">
				<div class="row">
					<div class="col-sm-2">
						<h4 class="font-weight-bold">Add Contact</h4>
						<span id="success_message"></span>
						<form id="sample_form">
							<div class="form-group">
								<div class="row">
									<label>First Name</label>
									<input type="text" class="form-control" id="Fname" placeholder="Enter First Name">
									
									<label>Last Name</label>
									<input type="text" class="form-control" id="Lname" placeholder="Enter Last Name">
									
									<label>Contact Number</label>
									<input type="number" class="form-control" id="Cnum" placeholder="Enter Contact number">
								</div>
							</div>
						</form>
						<div class="form-group" id="process" style="display:none;">
							<div class="progress">
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
					</div>

					<div class="col-sm-10">
						<table class="table border-in-table table-hover table-sm">   
							<thead>                            
								<tr >			
									<th style="width: 5%;">#</th> 
									<th style="width: 25%;">FULL NAME</th>
									<th style="width: 25%;">CONTACT NUMBER</th>
									<th style="width: 25%;">DATE CREATED</th>
									<th>OPTIONS</th>
								</tr>
							</thead>
							<h5>List of Users</h5>
							<div class="input-group" style="width:250px; position: absolute; right:0px; top:0px; margin-right:12px;">
								<input type="text" class="form-control form-control-sm" id="search_text" data-field="Search" placeholder="Search Account name">
								<span class="input-group-btn">
									<button class="btn btn-sm btn-success" id="search" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<tbody id="load_contacts"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/phonebook/index.js"></script>