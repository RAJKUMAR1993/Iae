<?php $this->load->view("admin/back_common/header"); 
$name_event = $this->input->get("id");
?>

<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">RIPF Registrations Reports</h5>
			</div>
						<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
					<li class="active"><span>RIPF Registrations Reports</span></li>
				</ol>
			</div>
						<!-- /Breadcrumb -->
		</div>  
		
		<div class="row">
		  <form method="get" id="changeYear" action="">
			 <div class="form-group col-md-5">
				<select class="form-control  changeYear" name="id">
				  <option value="">Select Event</option>
				  <? $event_name = $this->db->order_by("id","desc")->group_by("event_name")->get_where("tbl_schedule_dates",["event_type"=>"RIPF"])->result();
				   
					foreach($event_name as $event){ ?>
						<option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>

					<? } ?>
				</select>
			  </div>
			  <div class="col-md-3">
				<a class="btn btn-primary" href="<? echo base_url('admin/ripf/reports') ?>">Clear</a>
			  </div>
		  </form>
		</div>
		
		<?  if($name_event){
			foreach($topics as $tk => $topic){ ?>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div class="row" align="center">
								<h5 style="margin-top: 20px" class="txt-dark"><? echo $topic->topic_name ?></h5>
								(<small>No'of Participants</small>)
							</div>
							<div class="table-responsive" style="padding:20px;">
								<table class="table table-hover myTable<? echo $tk ?> pb-30">
									<thead>
										<tr>
											<th>Type of Registration</th>
											<?php foreach($streams as $ss => $s){  ?>
											<td>
												<? echo $s->category ?>
											</td>
											<?php	
												} ?>
											<th>Total</th>
										</tr>

									</thead>
									<tbody>

										<?php 
									  		
									  		$total = [];
									  		$gtotal = 0; 
									  		foreach($ripf_category as  $ripf_cat){ 
												
												$cname = str_replace(" ","-",$ripf_cat->category_name);	
												
										?>
											<tr>
												<td>
													<?php echo  $ripf_cat->category_name;  ?>
												</td>
												<?php
													$rowtotal = 0;
													foreach($streams as $skk => $s){  
														
													  $scount = $this->db->query('SELECT SUM(participants) as totalparicipants,COUNT(id) as institutes from tbl_ripf_registrations where  topic LIKE "%'.$topic->topic_name.'%" and event_name='.$name_event.' and event_category="'.$cname.'" and contact_person_stream="'.$s->category.'" and registration_status="Active"')->row();
															
													  $rowtotal += $scount->totalparicipants;	
												?>
													<td>
														<a target="_blank" href="<? echo base_url('admin/ripf/ripf_registrations?category=').$cname.'&id='.$name_event.'&topic='.$topic->topic_name.'&stream='.$s->category.'&registration_type=total' ?>"><?php echo ($scount->totalparicipants) ? $scount->totalparicipants : 0;  ?></a>
													</td>
												<? 
													} ?> 
												<td><a target="_blank" href="<? echo base_url('admin/ripf/ripf_registrations?category=').$cname.'&id='.$name_event.'&topic='.$topic->topic_name.'&registration_type=total' ?>"><? echo $rowtotal ?></a></td>	
											</tr>

										<?php 
												$gtotal += $rowtotal;
											} 
										
										?>
										
										
									</tbody>
									
									<tfoot align="right">
										<tr>
											<th>Total</th>
											<?php
												foreach($streams as  $s){  
											?>
												<th></th>
											<? } ?>
											<th><? echo $gtotal ?></th> 
										</tr>
									</tfoot>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		<? } ?>	
			

<!-- Number of Registrations: -->
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="row" align="center">
							<h5 style="margin-top: 20px" class="txt-dark">Total Registrations</h5>
							(<small>No'of Registrations</small>)
						</div>
						<div class="table-responsive" style="padding:20px;">
							<table class="table table-hover pb-30 totalTable" id="">
								<thead>
									<tr>
										<th style="font-size: 13px;">Topic</th>
										<?php foreach($topics as  $t){  ?>
										<td>
											<? echo $t->topic_name ?>
										</td>
										<?php } ?>
										<th valign="top">All</th>
										<th valign="top">Total</th>
									</tr>

								</thead>
								<tbody>

									<?php foreach($ripf_category as  $ripf_cat1){ 
										  	$tcname = str_replace(" ","-",$ripf_cat1->category_name);	 	
									?>
									<tr>
										<td>
											<?php echo  $ripf_cat1->category_name;  ?>
										</td>
										<?php
											$trowtotal = 0;	
											foreach($topics as  $t){
											
											  	$tscount = $this->db->query('SELECT COUNT(id) as institutes from tbl_ripf_registrations where  topic LIKE "%'.$t->topic_name.'%" and event_name='.$name_event.' and event_category="'.$tcname.'" and registration_status="Active"')->row();
															
												$trowtotal += $tscount->institutes;		
										?>
											<td>
												<a target="_blank" href="<? echo base_url('admin/ripf/ripf_registrations?category=').$tcname.'&id='.$name_event.'&topic='.$t->topic_name.'&registration_type=total' ?>"><? echo $tscount->institutes ?></a>
											</td>
										<?php } ?>
											
										<td>
											<?
												$tascount = $this->db->query('SELECT COUNT(id) as institutes from tbl_ripf_registrations where  topic LIKE "%All%" and event_name='.$name_event.' and event_category="'.$tcname.'" and registration_status="Active"')->row();
															
												$trowtotal += $tascount->institutes;
											?>
											<a target="_blank" href="<? echo base_url('admin/ripf/ripf_registrations?category=').$tcname.'&id='.$name_event.'&topic=All&registration_type=total' ?>"><?
												echo $tascount->institutes;
												?></a>
										</td>
										<td><a target="_blank" href="<? echo base_url('admin/ripf/ripf_registrations?category=').$tcname.'&id='.$name_event.'&registration_type=total' ?>"><? echo $trowtotal ?></a></td>		
										
									</tr>

									<?php } ?>
								</tbody>
								<tfoot align="right">
									<tr>
										<th>Total</th>
										<?php
											foreach($topics as  $t){  
										?>
											<th>0</th>
										<? } ?>
										<th><? echo $gtotal ?></th> 
										<th><? echo $gtotal ?></th> 
									</tr>
								</tfoot>

							</table>
						</div>
					</div>
				</div>

			</div>
		</div>

<!--	categorywise registrations	-->
						
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="row" align="center">
							<h5 style="margin-top: 20px" class="txt-dark">Categorywise Registrations</h5>
							(<small>No'of Registrations</small>)
						</div>
						<div class="table-responsive" style="padding:20px;">
							<table class="table table-hover pb-30 totalTable" id="">
								<thead>
									<tr>
										<th align="center">Category</th>
										<th width="160px"></th>
										<th valign="top">Government</th>
										<th valign="top">Government-Aided</th>
										<th valign="top">Private</th>
										<th valign="top">Total</th>
									</tr>

								</thead>
								<tbody>

									<?php foreach($ripf_category as  $ripf_cat1){ 
										  	$tcname = str_replace(" ","-",$ripf_cat1->category_name);	 	
									?>
									<tr>
										<td>
											<?php echo  $ripf_cat1->category_name;  ?>
										</td>
										
										<td colspan="5">
											<table class="table table-bordered">
												
												<? foreach($streams as $cst => $cstream){ ?>
													<tr>
														<td width="150px"><? echo $cstream->category ?></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												<? } ?>
												
											</table>
										</td>
												
										
									</tr>

									<?php } ?>
								</tbody>
								<tfoot align="right">
									<tr>
										<th>Total</th>
										<?php
											foreach($topics as  $t){  
										?>
											<th>0</th>
										<? } ?>
										<th><? echo $gtotal ?></th> 
										<th><? echo $gtotal ?></th> 
									</tr>
								</tfoot>

							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
						
		
	<? } ?>	

<?php $this->load->view("admin/back_common/footer"); ?>

<script>
$(document).ready( function () {
	
<?  foreach($topics as $tp => $topic){ ?>	
	$('.myTable<? echo $tp ?>').DataTable({
		"order" : false,
		"footerCallback": function ( row, data, start, end, display ) {
            var api<? echo $tp ?> = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/(<([^>]+)>)/gi, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
		<?php
			foreach($streams as $st => $s){  
		?>	
            var total<? echo $tp ?><? echo $st+1 ?> = api<? echo $tp ?>
                .column( <? echo $st+1 ?> )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer by showing the total with the reference of the column index 
			
            $( api<? echo $tp ?>.column( <? echo $st+1 ?> ).footer() ).html(<? //echo base_url('admin/ripf/ripf_registrations?stream=').$s->category.'&id='.$name_event.'&topic='.$topic->topic_name.'&registration_type=total' ?>total<? echo $tp ?><? echo $st+1 ?>);
		
		<? } ?>	
			
        },
	});
<? } ?> 
	
	
	$('.totalTable').DataTable({
		"order" : false,
		"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/(<([^>]+)>)/gi, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
		<?php
			foreach($topics as $tt => $stt){  
		?>	
            var total<? echo $tt+1 ?> = api
                .column( <? echo $tt+1 ?> )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer by showing the total with the reference of the column index 
            $( api.column( <? echo $tt+1 ?> ).footer() ).html(total<? echo $tt+1 ?>);
		
		<? } ?>	
			
        },
	});	
	
	
	
} ); 
$(".changeYear").change(function(){    
    $("#changeYear").submit();
})
</script>


