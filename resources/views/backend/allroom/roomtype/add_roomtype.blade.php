@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">

	<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#manageroom" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
										</div>
										<div class="tab-title">Add Room</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
										</div>
										<div class="tab-title">Room Number</div>
									</div>
								</a>
							</li>
						
						</ul>
	<div class="tab-content py-3">
		<div class="tab-pane fade show active" id="manageroom" role="tabpanel">
			
	<div class="col-xl-8 mx-auto">
	
		<div class="card">
			<div class="card-body p-4">
				<h5 class="mb-4 text-center">Add Room</h5>
				<form class="row g-3" method="POST" action="{{route('room.type.storeee')}}" enctype="multipart/form-data">
					@csrf
							<div class="col-md-4">
								<label for="input1" class="form-label">Room Type  Name</label>
								<input type="text" name='roomtype' class="form-control" id="input1" >
							</div>
							
							<div class="col-md-4">
								<label for="input2" class="form-label">Total Adult</label>
								<input type="text" name ='total_adult'class="form-control" id="input2" >
							</div>
	
							<div class="col-md-4">
								<label for="input2" class="form-label">Total Child</label>
								<input type="text" name='total_child' class="form-control" id="input2" >
							</div>
	
							<div class="col-md-6">
								<label for="input3" class="form-label">Main image</label>
								<input type="file"  name='image' class="form-control" id="image" >
								
	
								{{-- <img  src="{{(!empty(image)) ? url('upload/rooming/'.image)
								: url('upload/no_image.jpg')}}" alt="Error " id='showImage' class="rounded-circle p-1 bg-primary mt-2" height='100' width="80"> --}}
							</div>
							
	
	
	
	
							<div class="col-md-6">
								<label for="multiImg" class="form-label">Gallary </label>
								<input type="file" name='multi_image[]' class="form-control"  id="multiImg"
								accept="image/jpeg,image/jpg,image/gif,image/png" multiple>
	
								<div class="row  " id='preview_img'>
									<div class="col">
											{{-- @foreach ($mutiimgs as $img)
											<img  src="{{(!empty(multi_image)) ? url('upload/rooming/multi_img/'.multi_image)
											: url('upload/no_image.jpg')}}" alt="Error " id='showImage' class="rounded-circle p-1 bg-primary m-2"	style='width:80px; height:100px;' />	
											<a href="{{route('multi.image.delete',$img->id)}}" class="text-center"> <i class="lni lni-close"></i></a>
										
											@endforeach --}}
									</div>
	
								</div>
							</div>
	
							
	
							<div class="col-md-3">
								<label for="input1" class="form-label">Room Price </label>
								<input type="text" name='price' class="form-control" id="input1" >
							</div>
							
							<div class="col-md-3">
								<label for="input1" class="form-label">Size </label>
								<input type="text" name='size' class="form-control" id="input1" >
							</div>
	
							<div class="col-md-3">
								<label for="input2" class="form-label">Discount ( % )</label>
								<input type="text" name ='discount'class="form-control" id="input2" >
							</div>
	
							<div class="col-md-3">
								<label for="input2" class="form-label">Room Capacity</label>
								<input type="text" name='room_capacity' class="form-control" id="input2">
							</div>
	
							<div class="col-md-6">
								<label for="input7" class="form-label">Room View </label>
								<select name='view' id="input7" class="form-select">
									<option selected="">Choose...</option>
									<option value="sea View"  >sea View </option>
									<option value="hill View" >hill view </option>
									
								</select>
							</div>
							<div class="col-md-6">
								<label for="input7" class="form-label">Bed Style</label>
								<select name='bed_style'id="input7" class="form-select">
									<option selected="">Choose...</option>
									<option value="Queen Bed" > Queen Bed </option>
									<option value="Twin Bed" >Twin Bed </option>
									<option value="King Bed" >King Bed </option>
								</select>
							</div>
	
							<div class="col-md-12">
								<label for="input11" class="form-label">Short Description</label>
								<textarea name='short_desc'class="form-control" id="input11" rows="6"></textarea>
							</div>
	
							<div class="col-md-12">
								<label for="input11" class="form-label"> Description</label>
								<textarea name='description'class="form-control" id="editor"  rows="10"></textarea>
							</div>		
							 {{-- Facility  --}}
				<div class="row mt-2">
					<div class="col-md-12 mb-3">					
					
						
					
							<div class="basic_facility_section_remove" id="basic_facility_section_remove">
								<div class="row add_item">
									<div class="col-md-6">
										<label for="basic_facility_name" class="form-label">Room Facilities </label>
										<select name="facility_name[]" id="basic_facility_name" class="form-control"  >
											<option value="">Select Facility</option>
											<option value="Complimentary Breakfast">Complimentary Breakfast</option>
											<option value="32/42 inch LED TV" > 32/42 inch LED TV</option>
											<option value="Smoke alarms" >Smoke alarms</option>
											<option value="Minibar"> Minibar</option>
											<option value="Work Desk" >Work Desk</option>
											<option value="Free Wi-Fi">Free Wi-Fi</option>
											<option value="Safety box" >Safety box</option>
											<option value="Rain Shower" >Rain Shower</option>
											<option value="Slippers" >Slippers</option>
											<option value="Hair dryer" >Hair dryer</option>
											<option value="Wake-up service" >Wake-up service</option>
											<option value="Laundry & Dry Cleaning" >Laundry & Dry Cleaning</option>
											<option value="Electronic door lock" >Electronic door lock</option> 
										</select>
									</div>
									<div class="col-md-6">
										<div class="form-group" style="padding-top: 30px;">
							<a class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></a>
					
							<span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
										</div>
									</div>
								</div>
							</div>
					
					
					
					
	
						</div> 
					</div>
					<br>
											 {{--End  Facility  --}}											 
							   
	
							<div class="col-md-12">
								<div class="d-md-flex d-grid align-items-center gap-3">
									<button type="submit" class="btn btn-primary px-4">Save </button>
								</div>
							</div>
			</form>
					</div>
				</div>
	
			
	
					</div>
											
										</div>
									</div>
									<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
										<div class="card">
											<div class="card-body">
												<a onclick="addRoomNO()" id="addRoomNO"  class="card-title btn btn-primary float-right ">
													<i class="lni lni-plus"> Add New</i>
												</a>
	
												<div class="roomnoHide" id="roomnoHide">
	
													<form action="" method="POST">
														@csrf
	
														<input type="hidden" name="room_type_id" value="">
														<div class="row">
														<div class="col-md-4">
															<label for="input2" class="form-label">Room Number</label>
															<input type="text" name='room_no' class="form-control" id="input2" >
														</div>
								
														<div class="col-md-4">
															<label for="input7" class="form-label">Status  </label>
															<select name='status' id="input7" class="form-select">
																<option selected="">Select Status</option>
																<option value="Active"  >Avtive </option>
																<option value="Inactive" >Inactive </option>
																
															</select>
														</div>
	
														<div class="col-md-4 text-center">
															<button type="submit" class="btn btn-outline-success mt-4 " id="input2" value=""> Save </button>
														</div>
	
													</div>
														
	
													</form>
	
												</div>
	
												<div class="row "> 
													<div class="col mt-2">
														<table class="table mb-0  mt-3 table-striped" id='roomview'>
															<thead>
																<tr>
																	<th class="col-4">Room Number</th>
																	<th class="col-4">Status</th>
																	<th class="col-4">Action</th>
															
																</tr>
															</thead>
															<tbody>
															
														{{-- @foreach($all_room_number as $item)													
																<tr>
																	<td>{{$item->room_no}}</td>
																	<td>{{$item->status}}</td>
																		<td class=" d-flex justify-content-between">
																		<a href="{{route('edit.roomno',$item->id)}}" class='btn btn-outline-warning px-3 radius-30'>Edit</a>
																		<a href="{{route('delete.roomno',$item->id)}}" class='btn btn-outline-danger px-3 radius-30' id='delete'>Delete</a>
																	</td>
																</tr>
																
														@endforeach --}}
																
															</tbody>
														</table>
													</div>
												</div>
	
											</div>
	
										</div>
										
	
	
									</div>
									 {{-- End primary profile --}}
									
								</div>
	
							
							
							</div>
						</div>
					</div>
					
				</div>
	
				<script type="text/javascript">
					$(document).ready(function(){
						$('#image').change(function(e){
							var reader = new FileReader();
							reader.onload = function(e){
								$('#showImage').attr('src',e.target.result);
							}
							reader.readAsDataURL(e.target.files['0']);
						});
					});
			</script>      
	
	  {{-- show multi image  --}}
	<script>
		$(document).ready(function(){
		 $('#multiImg').on('change', function(){ //on file input change
			if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
			{
				var data = $(this)[0].files; //this file data
				 
				$.each(data, function(index, file){ //loop though each file
					if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
						var fRead = new FileReader(); //new filereader
						fRead.onload = (function(file){ //trigger function on successful read
						return function(e) {
							var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100).addClass('rounded-circle p-1 bg-primary mt-2')
						.height(80); //create image element 
							$('#preview_img').append(img); //append image to output element
						};
						})(file);
						fRead.readAsDataURL(file); //URL representing the file's data.
					}
				});
				 
			}else{
				alert("Your browser doesn't support File API!"); //if File API is absent
			}
		 });
		});
	   </script>
	
	
	<!--================== Start of add Basic Plan Facilities ==============-->
	<div style="visibility: hidden">
		<div class="whole_extra_item_add" id="whole_extra_item_add">
		   <div class="basic_facility_section_remove" id="basic_facility_section_remove">
			  <div class="container mt-2">
				 <div class="row">
					<div class="form-group col-md-6">
					   <label for="basic_facility_name">Room Facilities</label>
					   <select name="facility_name[]" id="basic_facility_name" class="form-control">
							 <option value="">Select Facility</option>
								<option value="Complimentary Breakfast">Complimentary Breakfast</option>
								<option value="32/42 inch LED TV" > 32/42 inch LED TV</option>
								<option value="Smoke alarms" >Smoke alarms</option>
								<option value="Minibar"> Minibar</option>
								<option value="Work Desk" >Work Desk</option>
								<option value="Free Wi-Fi">Free Wi-Fi</option>
								<option value="Safety box" >Safety box</option>
								<option value="Rain Shower" >Rain Shower</option>
								<option value="Slippers" >Slippers</option>
								<option value="Hair dryer" >Hair dryer</option>
								<option value="Wake-up service" >Wake-up service</option>
								<option value="Laundry & Dry Cleaning" >Laundry & Dry Cleaning</option>
								<option value="Electronic door lock" >Electronic door lock</option> 
					   </select>
					</div>
					<div class="form-group col-md-6" style="padding-top: 20px">
					   <span class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></span>
					   <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
	 
	 <script type="text/javascript">
		$(document).ready(function(){
		   var counter = 0;
		   $(document).on("click",".addeventmore",function(){
				 var whole_extra_item_add = $("#whole_extra_item_add").html();
				 $(this).closest(".add_item").append(whole_extra_item_add);
				 counter++;
		   });
		   $(document).on("click",".removeeventmore",function(event){
				 $(this).closest("#basic_facility_section_remove").remove();
				 counter -= 1
		   });
		});
	 </script>
	 <!--========== End of Basic Plan Facilities ==============-->
	
	
	
	  <!--========== Room Number add ==============-->
	  <script>
		$('#roomnoHide').hide();
		$('#roomview').show();
	
		function addRoomNO(){
			$('#roomnoHide').show();
			$('#roomview').hide();
			$('#addRoomNO').hide();
		}
	
		
	  </script>
	
	
	
		<!--==========End Room Number add ==============-->
	
	 
	 
	 
	
		
	
	@endsection

