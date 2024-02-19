@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Member</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Booking </li>
							</ol>
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
						
							<div class="col-12">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <form  action="{{route('store.roomlist')}}" method="post" class="row g-3">
                                            @csrf

                                            <div class="col-md-4">
                                                <label for="roomtype_id" class="form-label">Room Type </label>
                                                <select name='room_id'   id="room_id" class="form-select">
                                                    <option selected="">Select Room Type </option>
                                                    @foreach ($room_type as $item)
                                                    <option value="{{$item->id}}"> {{collect(old('roomtype_id'))->contains($item->id) ? 'selected' : '' }} 
                                                         {{$item->roomtype}}</option>
                                                        
                                                    @endforeach
                                                </select> 
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <label for="input2" class="form-label">Check in</label>
                                                <input type="date" class="form-control" name="check_in" id="check_in">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="input2" class="form-label">Check out</label>
                                                <input type="date" class="form-control" name="check_out" id="check_out" >
                                            </div>

                                            <div class="col-md-4">
                                                <label for="input3" class="form-label">Room</label>
                                                <input type="number" name="numbers_of_rooms" class="form-control" >

                                                <input type="hidden" name="available_room" id="available_room"  class="form-control">
                                                <div class="mt-2">
                                                    <span>Avalibility: <span class="text-success availability"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="number_of_person" class="form-label">Guest</label>
                                                <input type="text" class="form-control" name='number_of_person' id="number_of_person" >
                                            </div>

                                            <h3 class="my-4 text-center"> Customer Information </h3>

                                            <div class="col-md-4">
                                                <label for="name" class="form-label">User Name</label>
                                                <input type="text" class="form-control" name="name" id="name" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="eamil" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="eamil" required>
                                            </div>
                                          

                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" id="name" required >
                                            </div>   
                                            
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">Zip code</label>
                                                <input type="text" class="form-control" name="zip_code" id="zip_code" required>
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">state</label>
                                                <input type="text" class="form-control" name="state" id="state"  disabled>
                                            </div>   

                                            <div class="col-md-4">
                                                <label for="state" class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" required >
                                            </div>
                                         
                                           
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
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
 
            <script>
               
               $(document).ready(function (){
            $("#room_id").on('change', function (){
                $("#check_in").val('');
                $("#check_out").val('');
                $(".availability").text(0);
                $("#available_room").val(0); 
            });
            $("#check_out").on('change', function() {
                getAvaility();
            });
        });
        function getAvaility(){
            var check_in = $('#check_in').val();
            var check_out = $('#check_out').val();
            var room_id = $("#room_id").val();
            var startDate = new Date(check_in);
            var endDate = new Date(check_out); 
            if (startDate > endDate) {
                alert('Invalid Date');
                $("#check_out").val('');
                return false;
            }
            if (check_in != '' && check_out != '' && room_id != '') {
            $.ajax({
            url: "{{ route('check_room_availability') }}",
            data: {room_id:room_id, check_in:check_in, check_out:check_out},
            success: function(data){
                $(".availability").text(data['available_room']);
                $("#available_room").val(data['available_room']);
             }
            }); 
        }else{
            alert('Field must be not empty')
          } 
        }

                   </script>
      


@endsection