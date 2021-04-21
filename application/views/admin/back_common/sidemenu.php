<?php
$d = & get_instance();

?>


<!-- Left Menu  Start-->

<div class="fixed-sidebar-left">

	<ul class="nav navbar-nav side-nav nicescroll-bar">


		<!-- User Profile -->
		<li>
			<div class="user-profile text-center">
				<img src="<?php echo base_url("assets");?>/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
				<div class="dropdown mt-5">
					<a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown">Admin <span class="caret"></span></a>
					<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
						<li>
							<a href="<?php echo base_url() ?>admin/login/logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<!-- /User Profile -->
		<li class="navigation-header">
			<span>Main</span>
			<i class="zmdi zmdi-more"></i>
		</li>

		<li>
			<a class="active" href="<?php echo base_url(); ?>admin/dashboard" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="icon-home mr-20"></i>
					<span class="right-nav-text">Dashboard</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>

		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Users</span>
				</div>
				<div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>

			<ul id="ecom_dr" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/users">Online</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/users/offlineusers">Offline</a>
				</li>

			</ul>

		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr1">
				<div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">RIPF</span>
				</div>
				<div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>

			<ul id="ecom_dr1" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/ripf">RIPF Settings</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/ripf/ripf_registrations?registration_type=online">Online Registrations</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/ripf/ripf_registrations?registration_type=offline">Offline Registrations</a>
				</li>

			</ul>

		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/payments" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-bank mr-20"></i>
					<span class="right-nav-text">Payments</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr144">
				<div class="pull-left"><i class="fa fa-wpforms mr-20"></i><span class="right-nav-text">Offline Registrations</span>
				</div>
				<div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>

			<ul id="ecom_dr144" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/users/register">NIRF/NAAC</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/ripf/registration">RIPF</a>
				</li>
			</ul>

		</li>
		
		<li>
			<a href="<?php echo base_url(); ?>admin/schedule" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-calendar mr-20"></i>
					<span class="right-nav-text">Schedule</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr2">
				<div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Events</span>
				</div>
				<div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>

			<ul id="ecom_dr2" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/schedule/events">Events</a>
				</li>
				<!--<li>
					<a href="<?php echo base_url(); ?>admin/schedule/new_events_nirf">Nirf</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/schedule/naac">Naac</a>
				</li>-->

			</ul>

		</li>
		
		<li>
			<a href="<?php echo base_url(); ?>admin/schedule/schedulejoindata" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-clock-o mr-20"></i>
					<span class="right-nav-text">Attendees</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/categories" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-list-alt mr-20"></i>
					<span class="right-nav-text">Categories</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/Streams" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-list-alt mr-20"></i>
					<span class="right-nav-text">Streams</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/institution_types" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-list-alt mr-20"></i>
					<span class="right-nav-text">Institution Types</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr112">
				<div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Reports</span>
				</div>
				<div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>

			<ul id="ecom_dr112" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/schedule/reports">NIRF Reports</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/schedule/naacreports">NAAC Reports</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/ripf/reports">RIPF Reports</a>
				</li>

			</ul>

		</li>
		
		<li>
			<a href="<?php echo base_url(); ?>admin/users/gallery" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-image mr-20"></i>
					<span class="right-nav-text">Gallery</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/users_download" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-download mr-20"></i>
					<span class="right-nav-text">Downloaded Users</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		
		<li>
			<a href="<?php echo base_url(); ?>admin/downloads" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-download mr-20"></i>
					<span class="right-nav-text">Downloads</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>

		<li>
			<a href="<?php echo base_url(); ?>admin/speakers" data-toggle="collapse" data-target="#ecom_dr1">
				<div class="pull-left"><i class="fa fa-volume-up mr-20"></i><span class="right-nav-text">Speakers</span>
				</div>
				<div class="clearfix"></div>
			</a>

			<!--<ul id="ecom_dr1" class="collapse-level-1 two-col-list collapse" aria-expanded="false" style="height: 0px;">

				<li>
					<a href="<?php echo base_url(); ?>admin/speakers">Speakers</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/speakers/reorderspeakers">Reorder Speakers</a>
				</li>

			</ul>-->

		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/guests" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Guests</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/testimonals" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-envelope mr-20"></i>
					<span class="right-nav-text">Messages</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/collaborators" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Collaborators</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/experts" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Experts</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/advisors" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Advisors</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/team" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Team</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/field_expert" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-users mr-20"></i>
					<span class="right-nav-text">Field Expert</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/users/new_testimonials" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-comments-o mr-20"></i>
					<span class="right-nav-text">Testimonials</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/settings/updates" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-calendar mr-20"></i>
					<span class="right-nav-text">Updates</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/settings" data-toggle="collapse" data-target="#dashboard_dr">
				<div class="pull-left"><i class="fa fa-gear mr-20"></i>
					<span class="right-nav-text">Settings</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>
	</ul>
</div>