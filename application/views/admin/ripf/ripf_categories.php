<?php $this->load->view("admin/back_common/header");
$getyear = $this->input->get("year");
$event = $this->uri->segment(4); 
//print_r($event);
?>
<style>
	.card {
		display: inline-block;
		position: relative;
		width: 100%;
		margin-bottom: 30px;
		border-radius: 6px;
		color: rgba(0, 0, 0, 0.87);
		background: #fff;
		box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
	}
	
	/* ============ Card Table ============ */

	.table {
		margin-bottom: 0px;
	}

	.card .table {
		padding: 15px 30px;
	}

	.card .table-primary {
		background: linear-gradient(60deg, #ab47bc, #7b1fa2);
	}

	.card .table-info {
		background: linear-gradient(60deg, #23d6ff, #167ac6);
	}

	.card .table-success {
		background: linear-gradient(60deg, #66bb6a, #388e3c);
	}

	.card .table-warning {
		background: linear-gradient(60deg, #ffa726, #f57c00);
	}

	.card .table-danger {
		background: linear-gradient(60deg, #ef5350, #d32f2f);
	}

	.card .table-rose {
		background: linear-gradient(60deg, #ec407a, #c2185b);
	}

	.card [class*="table-"] {
		color: #FFFFFF;
		border-radius: 6px;
	}

	.card [class*="table-"] .card-caption a,
	.card [class*="table-"] .card-caption,
	.card [class*="table-"] .icon i {
		color: #FFFFFF;
		text-align: center;
		font-weight: 600;
		line-height: 1.3;
    	letter-spacing: 1.2px;
	}

	.card [class*="table-"] .icon i {
		border-color: rgba(255, 255, 255, 0.25);
	}

	.card [class*="table-"] .author a,
	.card [class*="table-"] .ftr .stats,
	.card [class*="table-"] .category,
	.card [class*="table-"] .card-description {
		color: rgba(255, 255, 255, 0.8) !important;
	}

	.card-description{
		margin-top: 6px;
	}
	.card [class*="table-"] .author a:hover,
	.card [class*="table-"] .author a:focus,
	.card [class*="table-"] .author a:active {
		color: #FFFFFF;
	}

	.card [class*="table-"] h1 small,
	.card [class*="table-"] h2 small,
	.card [class*="table-"] h3 small {
		color: rgba(255, 255, 255, 0.8);
	}
	
	/*---------------------------------------------------------------------- /
BUTTONS
----------------------------------------------------------------------- */

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn,
.navbar .navbar-nav > li > a.btn {
    border: none;
    border-radius: 3px;
    position: relative;
    padding: 10px 20px;
    margin: 10px 1px;
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 0;
    will-change: box-shadow, transform;
    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn:focus,
.btn:active,
.btn:active:focus {
    outline: 0;
}

.btn.btn-round,
.navbar .navbar-nav > li > a.btn.btn-round {
    border-radius: 30px;
}

.btn.btn-just-icon,
.navbar .navbar-nav > li > a.btn.btn-just-icon {
    font-size: 20px;
    padding: 12px 12px;
    line-height: 1em;
}

.btn.btn-just-icon i,
.navbar .navbar-nav > li > a.btn.btn-just-icon i {
    width: 20px;
}


/* Button Info */

.btn.btn-info {
    background-color: #00bcd4;
    color: #FFFFFF;
}

.btn.btn-info:focus,
.btn.btn-info:active,
.btn.btn-info:hover {
    box-shadow: 0 14px 26px -12px rgba(0, 188, 212, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 188, 212, 0.2);
}


/* Button Danger */

.btn.btn-danger {
    background-color: #f44336;
    color: #FFFFFF;
}

.btn.btn-danger:focus,
.btn.btn-danger:active,
.btn.btn-danger:hover {
    box-shadow: 0 14px 26px -12px rgba(244, 67, 54, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(244, 67, 54, 0.2);
}


/* Button Warning */

.btn.btn-warning.btn-simple:hover,
.btn.btn-warning.btn-simple:focus,
.btn.btn-warning.btn-simple:active {
    background-color: transparent;
    color: #ff9800;
}

.btn.btn-warning.btn-simple,
.navbar .navbar-nav > li > a.btn.btn-warning.btn-simple {
    background-color: transparent;
    color: #ff9800;
    box-shadow: none;
}

.btn.btn-warning,
.navbar .navbar-nav > li > a.btn.btn-warning {
    box-shadow: 0 2px 2px 0 rgba(255, 152, 0, 0.14), 0 3px 1px -2px rgba(255, 152, 0, 0.2), 0 1px 5px 0 rgba(255, 152, 0, 0.12);
}


/* Button Rose */

.btn.btn-rose.btn-simple:hover,
.btn.btn-rose.btn-simple:focus,
.btn.btn-rose.btn-simple:active {
    background-color: transparent;
    color: #e91e63;
}

.btn.btn-rose.btn-simple,
.navbar .navbar-nav > li > a.btn.btn-rose.btn-simple {
    background-color: transparent;
    color: #e91e63;
    box-shadow: none;
}


/* Button White 

.btn.btn-white,
.btn.btn-white:focus,
.btn.btn-white:hover {
    background-color: #FFFFFF;
    color: #888;
}

.btn.btn-white.btn-simple,
.navbar .navbar-nav > li > a.btn.btn-white.btn-simple {
    color: #FFFFFF;
    background: transparent;
    box-shadow: none;
}*/

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		
			<h5 class="txt-dark">RIPF Off line Registrations </h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>

				<li class="active"><span>Ripf Registered Users</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>
		   
			<!-- Row -->
				<div class="container">
			<div class="row">
				<div class="panel-wrapper collapse in">
					<div class="card-view row" style="padding: 20px;">
						<?
							if(count($categories) > 0){
							foreach($categories as $e){

						?>
							<div class="col-md-4">
								<div class="card">
									<div class="table table-info">
										<h4 class="card-caption">
											<? echo $e->category_name ?>
										</h4>
										<div class="ftr text-center"> <a href="<? echo base_url('admin/ripf/off_line_registration/').str_replace(" ","-",$e->category_name) ?>" class="btn btn-default btn-round">Register</a> </div>
									</div>
								</div>
							</div>
						<? }}else{
								echo '<p style="text-align: center;font-size: 22px;">Registrations are closed.</p>';
							} ?>
					</div>
				</div>
			</div>
		</div>

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
	$(".changeYear").change(function(){
		$("#changeYear").submit();
	})
</script>
