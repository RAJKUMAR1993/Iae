<? front_header(); 
	$event_id = explode("~",$this->uri->segment(2))[1];
	$event_name = str_replace("-"," ",explode("~",$this->uri->segment(2))[0]);
?>
<link href="<? echo base_url('assets/css/pricing.css') ?>" rel="stylesheet">  

<div id="generic_price_table">   
<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        <h1>Packages</h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">
            
            <!--BLOCK ROW START-->
            <div class="row">
				<div class="col-md-2"></div>
                <div class="col-md-4">
                
                  <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                              <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Standard</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency">5000</span>
                                </span>
                            </div>
                            <!--//PRICE END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                          <ul>
                              <li><span>1</span> Contact Person</li>
                              <li><span>5</span> Participants</li>
                              <li>Participation Certificate</li>
                          </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                          <a class="register" href="javascript:void(0)" package="0" event_id="<? echo $event_id ?>" event_name="<? echo $event_name ?>" promo_status="<? echo ($this->input->get("ref") == 'promo') ? 'Active' : 'Inactive' ?>">Register</a>
                        </div>
                        <!--//BUTTON END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
                
                <div class="col-md-4">
                
                  <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                              <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Premium</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency">10000</span>
                                </span>
                            </div>
                            <!--//PRICE END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                          <ul>
                              <li><span>1</span> Contact Person</li>
                              <li><span>10</span> Participants</li>
                              <li>Participation Certificate</li>
                          </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                          <a class="register" href="javascript:void(0)" package="1" event_id="<? echo $event_id ?>" event_name="<? echo $event_name ?>" promo_status="<? echo ($this->input->get("ref") == 'promo') ? 'Active' : 'Inactive' ?>">Register</a>
                        </div>
                        <!--//BUTTON END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
            </div>  
            <!--//BLOCK ROW END-->
            
        </div>
    </section> 
</div>
<? front_footer() ?>

<script>

	$(".register").click(function(){
		
		var package = $(this).attr("package");
		var event_id = $(this).attr("event_id");
		var event_name = $(this).attr("event_name");
		var promo_status = $(this).attr("promo_status");
		$.ajax({
			type : "post",
			data : {package : package,event_id : event_id,event_name : event_name,promo_status : promo_status},
			url : "<? echo base_url('selectpackage') ?>",
			success : function(data){
			 	window.location.href = "<? echo base_url('home/register') ?>";
//				console.log(data);
			}
		})
		
	})
	
</script>  
