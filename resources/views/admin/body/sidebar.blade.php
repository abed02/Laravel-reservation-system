

<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Easy</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

			<li>
					<a href="{{route('admin.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<li>
					<a href="{{route('dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">User Dashboard</div>
					</a>
				</li>
			
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Team Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('all.team')}}"><i class='bx bx-radio-circle'></i>Members </a>
						</li>
						<li> <a href="{{route('add.member')}}"><i class='bx bx-radio-circle'></i>Add Member</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Room Area </div>
					</a>
					<ul>
						<li> 
							<a href="{{route('book.area')}}"><i class='bx bx-radio-circle'></i>Update Book Area </a>
						</li>	
						
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Room Type</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('room.type.list')}}"><i class='bx bx-radio-circle'></i> Room Type List</a>
						</li>	
						
					</ul>
				</li>

				<li class="menu-label">Booking Manage</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Booking</div>
					</a>
					<ul>
						<li> <a href="{{route('booking.list')}}"><i class='bx bx-radio-circle'></i>Booking List</a>
						</li>
						<li> <a href="{{ route ('add.room.list')}}"><i class='bx bx-radio-circle'></i>Add Booking</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Room List </div>
					</a>
					<ul>
						<li> <a href="{{route ('view.room.list')}}"><i class='bx bx-radio-circle'></i>Room List </a>
						</li>
						
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">setting </div>
					</a>
					<ul>
						<li> <a href="{{route ('smtp.setting')}}"><i class='bx bx-radio-circle'></i>SMTP setting </a>
						</li>

						<li>
							 <a href="{{route ('site.setting')}}"><i class='bx bx-radio-circle'></i>site setting </a>
						</li>
						
						
					</ul>
				</li>
				
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Testimonial </div>
					</a>
					<ul>
						<li> <a href="{{route ('all.testimonial')}}"><i class='bx bx-radio-circle'></i>All Testimonal </a>
						</li>

						<li> <a href="{{route ('add.testimonial')}}"><i class='bx bx-radio-circle'></i>Add Testimonal </a>
						</li>
						
					</ul>
				</li>


				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Blog  </div>
					</a>
					<ul>
						<li> <a href="{{route ('blog.category')}}"><i class='bx bx-radio-circle'></i> Blog category </a>
						</li>

						<li> <a href="{{route ('all.blog.post')}}"><i class='bx bx-radio-circle'></i>Blog  post  </a>
						</li>
						
					</ul>
				</li>

				
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Contact Message  </div>
					</a>
					<ul>

						<li> 
							<a href="{{ route('contact.message') }}"><i class='bx bx-radio-circle'></i>Contact Message </a>
					   </li>
	   
					</ul>
				</li>



				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Comeents   </div>
					</a>
					<ul>

						<li>
							 <a href="{{route ('all.comment')}}"><i class='bx bx-radio-circle'></i> Comments </a>
						</li>
						
					</ul>
				</li>
				
				
				

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Hotel Gallery  </div>
					</a>
					<ul>
						<li> <a href="{{route ('all.gallery')}}"><i class='bx bx-radio-circle'></i>All Gallery</a>
						</li>

					
					</ul>
				</li>
				
				
				
				
				
			
				
				
		
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->