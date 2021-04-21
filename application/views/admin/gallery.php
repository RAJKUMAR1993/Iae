<?php $this->load->view("admin/back_common/header"); ?>
	
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/lightgallery.css">	
	
	
<style>
	.close {
    position: absolute;
    top: 10px;
    right: 22px;
    font-size: 12px;
	color:red;
	opacity:1.1;
}
	
.project-gallery > ul > li a .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.1);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background-color 0.15s ease 0s;
    -o-transition: background-color 0.15s ease 0s;
    transition: background-color 0.15s ease 0s;
}	
	
	</style>
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Gallery</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Gallery </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-xs-12">
<!--								<h5 style="color: black" align="center">Add Gallery</h5><br>-->
								<div class="form-wrap">


									<form method="post" action="<?php echo base_url() ?>admin/users/insertGallery" enctype="multipart/form-data">

									<div class="row">

									  <div class="col-md-3">	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Gallery Title</label>
												<select class="form-control" name="gallery_title" id="cgallery" required>
													<option value="">Select Gallery Title</option>

													<?php 
														$gallery = $this->db->group_by("gallery_title")->where("deleted",0)->get("tbl_gallery")->result(); 

														foreach($gallery as $pl){


													?>

														<option value="<?php echo $pl->gallery_title ?>"><?php echo $pl->gallery_title ?></option>

													<?php } ?>
														
														<option value="cgallery">Create Title</option>	
												</select> 
										</div>
									  </div>

									  <div class="col-md-3" id="ctitle" style="display: none"> 	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Title</label>
											<input type="text" class="form-control" name="gallery_title_new" placeholder="Create Title"> 
										</div>
									  </div>
									  
									  <div class="col-md-3">	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Type</label>
											<select class="form-control" name="gallery_type" id="gallerytype" required>
												<option value="">Select Type</option>
												<option value="image">Image</option>
												<option value="video">Video</option>
											</select> 
										</div>
									  </div>
									  
									  <div class="col-md-3 iframe_url" style="display: none"> 	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Embed URL</label>
											<input type="text" class="form-control" name="iframe_url" placeholder="Iframe Embed URL"> 
										</div>
									  </div>

									  <div class="col-md-3 images">	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Select Images</label>
											<input type="file" class="form-control" id="files" name="files[]" multiple> 
										</div>
									  </div>
									  
									  <div class="col-md-3 coverImage">	
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Cover Image</label>
											<input type="file" class="form-control " name="coverphoto"> 
										</div>
									  </div>

										<div class="col-md-3">		
											<div class="form-group">
												<button type="submit" class="btn btn-success mt-30" style="width: 100%">Submit</button>
											</div>
										</div>
									 </div>
									<div class="row">
										
										<div class="col-md-3 customize" style="display: none">		
											<div class="form-group">
												<button type="button" class="btn btn-primary mt-30 edit" style="width: 100%">Edit</button>
											</div>
										</div>
										
										
										<div class="col-md-3 customize" style="display: none">		
											<div class="form-group">
												<button type="button" class="btn btn-danger mt-30 delete" style="width: 100%">Delete</button>
											</div>
										</div>
									
									</div>
										
											
									



									</form>



								</div>
							</div>
						</div>
					</div>
						
						
							</div>
						</div>
							
					</div>
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
<!--
									<div class="pull-left">
										<h6 class="panel-title txt-dark">With Filter</h6>
									</div>
-->
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="filter-wrap mb-40">
											<!-- Portfolio Filters --> 
											<ul id="filters" class="col-md-5">
											<?php 
												
												$gall = $this->db->group_by("gallery_title")->where("deleted",0)->get("tbl_gallery")->result(); 
												
												$i = 0;
												
												foreach($gall as $gg){
												
												?>
											
												<li><a href="#" data-filter=".filter<?php echo $gg->id ?>" class="<?php echo ($i==0) ? 'active' : ''; ?>"><?php echo $gg->gallery_title ?></a></li>
												
												<?php 
												$i++;
												} ?>
												
											</ul>
											<!--/Portfolio Filters -->
											<div class="clearfix"></div>
										</div>
								<?php		
								
									$gall1 = $this->db->group_by("gallery_title")->where("deleted",0)->get("tbl_gallery")->result(); 

									$i1 = 0;

									if(count($gall1) > 0){	
										
								?>		
										
										<div class="gallery-wrap">
											
											<div class="portfolio-wrap project-gallery">
												<ul id="portfolio" class="portf auto-construct project-gallery" data-col="4">
												
												<?php 
													
												
												foreach($gall1 as $gg1){
													
													$images = $this->db->where(array("gallery_title"=>$gg1->gallery_title,"deleted"=>0))->get("tbl_gallery")->result();
													
													foreach($images as $img){
														
														
												?>
													<li class="item filter<?php echo $gg1->id ?>" data-src="<?php echo base_url().$img->images ?>">
													
													<? if($img->type == "image"){ ?>
													
														<a href="javascript:void(0)">
														<img class="img-responsive" style="width: 100%" src="<?php echo base_url().$img->images ?>"  alt="<?php echo basename($img->images) ?>" /></a>
												  	
												  	<? }else{ ?>
												  	
												  		<iframe src="<? echo $img->images ?>"></iframe>
												  	
												  	<? } ?>
													  	
														<i class="fa fa-edit fa-2x updateDesc" style="position: absolute;top: 10px;left: 10px;z-index: 999;color: red;cursor: pointer" imgid="<? echo $img->id ?>" desc="<? echo $img->description ?>"></i>

														<i class="fa fa-times-circle fa-2x" style="position: absolute;top: 10px;right: 10px;z-index: 999;color: red;cursor: pointer" onClick="delImage(<?php echo $img->id; ?>)"></i>
												   </li>
													
												<?php 
												$i1++;
												}} ?>
														
												</ul>
												
											</div>
										
										</div>
										
										<?php
										}else{
													
											echo '<h4 align="center" style="color:black;margin-bottom:20px">No Images Found</h4>';

										}			
													
										?>
										
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
					
					
					
					
					
				</div>
				
				
				
				
<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: black">Update Gallery Title</h4>
      </div>
      <div class="modal-body">
        
        <form method="post" action="<?php echo base_url("admin/users/editGallerytitle") ?>" enctype="multipart/form-data">		
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputuname_1">Gallery Title</label>
				<input type="text" id="" class="form-control gTitle" name="galleryTitle"  required> 
			</div>

			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputuname_1">Cover Image</label>
				<input type="file" class="form-control " name="coverphoto1"> 
			</div>
		
			<div class="form-group">
			
				<input type="hidden" id="" class="form-control gTitle" name="extgalleryTitle" required> 

				<button type="submit" class="btn btn-success pull-left">Update</button>
			</div>
		
		</form>
     		 		 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
					
				
				
<!-- Modal -->
<div id="updateDesc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: black">Update Description</h4>
      </div>
      <div class="modal-body">
        
        <form method="post" action="<?php echo base_url("admin/users/editImgdesc") ?>">
        		
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputuname_1">Image Description</label>
				<textarea class="form-control gdesc" name="description" rows="4" required> </textarea>
			</div>

			<div class="form-group">
			
				<input type="hidden" id="" class="form-control gimgid" name="gimgid" required> 
				<button type="submit" class="btn btn-success pull-left">Update</button>
				
			</div>
		
		</form>
     		 		 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>				
				
				
				

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<script src="<?php echo base_url("assets/") ?>dist/js/lightgallery-all.js"></script>
<!--<script src="<?php echo base_url("assets/") ?>dist/js/gallery-data.js"></script>-->
<script src="<?php echo base_url("assets/") ?>dist/js/isotope.js"></script>
<script src="<?php echo base_url("assets/") ?>dist/js/gallery-data.js"></script>



<script type="text/javascript">
	
	
	

window.onload = function(){   
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        $('#files').on("change", function(event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                //Only pics
                // if(!file.type.match('image'))
                if(file.type.match('image.*')){
                    if(this.files[0].size < 2097152){    
                  // continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load",function(event){
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='preview image'/>";
                        output.insertBefore(div,null);            
                    });
                    //Read the image
                    $('#clear, #result').show();
                    picReader.readAsDataURL(file);
                    }else{
                        alert("Image Size is too big. Minimum size is 2MB.");
                        $(this).val("");
                    }
                }else{
                alert("You can only upload image file.");
                $(this).val("");
            }
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}

   $('.updateDesc').on("click", function() {
	  
	   var imgid = $(this).attr("imgid");
	   var desc = $(this).attr("desc");
	   
	   $(".gdesc").val(desc);
	   $(".gimgid").val(imgid);
	   $("#updateDesc").modal("show");
	   
   });
	
   $('.edit').on("click", function() {
	  
	   var title = $("#cgallery").val();
	   
	   $(".gTitle").val(title);
	   $("#editModal").modal("show");
	   
   });	
	
   $('.delete').on("click", function() {
	  
	     var r = confirm('Are you sure want to delete.');
		  if (r == true) {
			
		  } else {
			
			  return false;
		  }
	   
	   
	   var title = $("#cgallery").val();
	   
	   $.ajax({
		
			data : {title : title},
			url : "<?php echo base_url("admin/users/delGallerytitle/") ?>",
			type : "post",
			success : function(data){
				location.reload();

			},
			error : function(data){

				location.reload();
			}
		
		});
	   
	   
   });	


   $('#files').on("click", function() {
        $('.thumbnail').parent().remove();
        $('result').hide();
        $(this).val("");
    });

    $('#clear').on("click", function() {
        $('.thumbnail').parent().remove();
        $('#result').hide();
        $('#files').val("");
        $(this).hide();
    });


$("#cgallery").change(function(){
	
	var gallery = $("#cgallery").val();
	
	if(gallery == "cgallery"){
		
		$(".coverImage").show();
		$("#ctitle").show();
		$(".customize").hide();
		
	}else{
		
		$(".coverImage").hide();
		$("#ctitle").hide();
		$(".customize").show();
		
	}
	
});	
		
$("#gallerytype").change(function(){
	
	var gallery = $("#gallerytype").val();
	
	if(gallery == "image"){
		
		$(".images").show();
		$(".iframe_url").hide();
		
	}else{
		
		$(".images").hide();
		$(".iframe_url").show();
		
	}
	
});	

function delImage(id){
	
	var r = confirm('Are you sure want to delete.');
	  if (r == true) {

	  } else {

		  return false;
	  }
	   
	
	var status = "Inactive";
	
	$.ajax({
		
		
		data : {status : status},
		url : "<?php echo base_url("admin/users/delImage/") ?>"+id,
		type : "post",
		success : function(data){
			location.reload();
			
		},
		error : function(data){
			
			location.reload();
		}
		
		
	});
	
}

</script>








