<?php $d  = &get_instance(); ?>
    		
    		 </div>
    			<!-- Footer -->
	        <footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p><? echo date("Y", time()); ?> &copy; IAE - ALL RIGHTS RESERVED</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
<!-- jQuery -->
	
   	
   
    <script src="<?php echo base_url("assets");?>/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets");?>/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/pnotify/pnotify.custom.min.js"></script>   
    
    <script src="<?php echo base_url() ?>assets/js/switch/bootstrap-switch.min.js"></script>
  
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<script src="<?php echo base_url("assets");?>/vendors/bower_components/jquery.steps/build/jquery.steps.js"></script>
<!--	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->
<!--    <script src="<?php //echo base_url("assets");?>/dist/js/form-wizard-data.js"></script>-->
    
    <script src="<?php echo base_url("assets");?>/vendors/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url("assets/");?>dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="<?php echo base_url("assets/");?>dist/js/simpleweather-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url("assets/");?>dist/js/dropdown-bootstrap-extended.js"></script>
	
	<script src="<?php echo base_url("assets/");?>vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
	
	<script src="<?php echo base_url("assets/");?>vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>
<!--	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->

	<!-- Sparkline JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Toast JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="<?php echo base_url("assets");?>/vendors/echarts-liquidfill.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
		
	<script src="<?php echo base_url("assets");?>/dist/js/print.js"></script>
	

	<script src="<?php echo base_url("assets");?>/vendors/bower_components/summernote/dist/summernote.min.js"></script>	
	<!-- Init JavaScript -->
	<script src="<?php echo base_url("assets/");?>dist/js/init.js"></script>
	<script src="<?php echo base_url("assets");?>/dist/js/dashboard-data.js"></script>
    <script src="<?php echo base_url("assets");?>/dist/scripts/components.js"></script>
    <script src="<?php echo base_url("assets");?>/js/datepicker/bootstrap-datepicker.min.js"></script>
    
    <!-- Jasny bootstrap -->
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets");?>/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="<? echo base_url('assets/js/bootstrap-switch.min.js') ?>"></script>

	<!-- <script src="<?php echo base_url("assets/");?>dist/js/dataTables-data.js"></script> -->
	
    
</body>

</html>


<script type="text/javascript">
<?php    
if($d->session->flashdata("msg")){
        ?>
    
$(function(){

new PNotify({
    title: '<?php echo $d->session->flashdata("title");?>',
    text: '<?php echo $d->session->flashdata("msg");?>',
    type:'<?php echo $d->session->flashdata("type");?>',
    animate: {
        animate: true,
        in_class: 'bounceInDown',
        out_class: 'fadeOut'
    }
});     
});

<?php
    }
    ?>
</script>




