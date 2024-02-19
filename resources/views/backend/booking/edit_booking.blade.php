@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Booking Number :</p>
									<h6 class="my-1 text-info">{{$editData->code}}</h6>
									<p class="mb-0 font-13"></p>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>

                   <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                       <div class="card-body">
                           <div class="d-flex align-items-center">
                               <div>
                                   <p class="mb-0 text-secondary">Booking Date</p>
                                   <h6 class="my-1 text-info">{{$editData->created_at->format('d/m/Y')}}</h6>
                                  
                               </div>
                               <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
                               </div>
                           </div>
                       </div>
                    </div>
                  </div>

				   <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Payment Method</p>
								   <h6 class="my-1 text-danger">{{$editData->payment_method}}</h6>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Payment Status</p>
								   <h6 class="my-1 text-success">
                                        @if ($editData->payment_status == '1')

                                            <span class="textsuccess"> Complete</span>

                                        @else

                                         <span class="text-danger">Pending</span>         

                                        @endif 
                                   </h6>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Status</p>
								   <h6 class="my-1 text-warning">
                                    @if ($editData->status == '1')
                                        <span class="textsuccess"> Complete</span>
                                    @else
                                        <span class="text-danger">Pending</span>
                                        
                                         @endif </td>

                                   </h6>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->

				<div class="row">
                   <div class="col-12 col-lg-8 d-flex">
                      <div class="card radius-10 w-100">
						  <div class="card-body">
                            <div class="table-responsive">
                                
                                    <table class="table  align-middle mb-0">
                                        <thead class="table-light">
                                                <tr>
                                                    <th>Room Type</th>
                                                    <th>Total Room</th>
                                                    <th>Price</th>
                                                    <th>Check in/out</th>
                                                    <th>Total Days</th>
                                                    <th>Total</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$editData->room->roomtype}}</td>
                                                <td>{{$editData->number_of_rooms}}</td>
                                                <td>${{$editData->actual_price}}</td>
                                                <td> <span class="badge bg-primary">{{$editData->check_in}} </span> / <span class="badge bg-warning text-dark"> {{$editData->check_out}} </span></td>
                                                <td>{{$editData->total_night}}</td>
                                                <td>${{$editData->actual_price * $editData->number_of_rooms}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="col-md-12 mt-3" style="float: right">
                                        
                                        <table class="table test_table table-border" >
                                            <tr class=" table-light">
                                                <th> categories</th>
                                                <th> price</th>
                                            </tr>
                                            <tr>
                                                <td>subtotal</td>
                                                <td>${{$editData->subtotal}}</td>
                                            </tr>

                                            <tr>
                                                <td>Discount</td>
                                                <td>${{$editData->discount}}</td>
                                            </tr>

                                            <tr>
                                                <td>Grand Total</td>
                                                <td>${{$editData->total_price}}</td>
                                            </tr>

                                        </table>

                                    </div>

                                    <div style="clear:both">
                                        <div class="my-2 ">
                                            <a href="javascript::void(0)" class="btn btn-primary assign_room">Assign Room</a>
                                        </div>

                                        @php
                                            $assign_rooms = App\Models\BookingRoomList::with('room_number')->where('booking_id',$editData->id)->get();
                                        @endphp

                                        @if (count( $assign_rooms) >0)
                                            
                                        
                                            <table class="table table-borderd">
                                                <tr>
                                                    <th>Room Number </th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($assign_rooms as $assign)                                               
                                                    <tr>
                                                        <td>{{$assign->room_number->room_no}} </td>
                                                        <td>
                                                            <a href="{{ route('assign_room_delete',$assign->id) }}" id="delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                        <div class="alert alert-danger text-center">
                                            No Room Assigned
                                        </div>
                                        @endif
                                    </div>


                            </div>
                             {{-- End table Responsive --}}

                        <form action="{{route('update.booking.status',$editData->id)}}" method="post">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="payment_status">payment status</label>
                                    <select name='payment_status'id="payment_status" class="form-select">
                                        <option selected="">Select Status </option>
                                        <option value="0" {{ $editData->payment_status == 0 ?'selected':''}}>Pending</option>
                                        <option value="1" {{ $editData->payment_status == 1 ?'selected':''}}>Complete</option>
                                      
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status"> Booking Status</label>
                                    <select name='status'id="status" class="form-select">
                                        <option selected="">Select Status </option>
                                        <option value="0" {{ $editData->status == 0 ?'selected':''}}>Pending</option>
                                        <option value="1" {{ $editData->status == 1 ?'selected':''}}>Complete</option>
                                      
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-4">
                                 <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary"> Update </button><br>
                                        <a href="{{route ('download.invoice',$editData->id)}}" class="btn btn-warning mt-2 px-3 radius-10"><i class="lni lni-download"></i>Download Invoice</a>
                                 </div>
                            </div>
                        </form>
    
                        </div>


						
					  </div>
				   </div>


                                        {{-- Mangee --}}
				   <div class="col-12 col-lg-4">
                       <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Mange Room  and Data</h6>
								</div>
								
							</div>
						</div>
						   <div class="card-body">
                             <form action="{{ route('update.booking',$editData->id)}}" method="post">
                                @csrf
                                 <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="check_in" class="mb-1">Check In</label>
                                        <input type="date" required name="check_in" class="form-control" id="check_in" value="{{$editData->check_in}}">
                                    </div> 

                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="check_out" class="mb-1">Check Out</label>
                                        <input type="date" required name="check_out" class="form-control" id="check_out"  value="{{$editData->check_out}}">
                                    </div> 
                                 </div>

                                 <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="room" class="mb-1">Room</label>
                                        <input type="number" required name="number_of_rooms" class="form-control" id="ch_out"  value="{{$editData->number_of_rooms}}">
                                    </div> 
                                    <input type="hidden" name="available_room" id="available_room"  >
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="ava" class="mb-1">Avalibilty :
                                            <span class="text-success availability" ></span>
                                        </label>

                                    </div> 

                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn btn-primary">Update </button>
                                    </div>
                                 </div>

                             </form>
							
						   </div>
						  
					   </div>


                        {{-- End Mangee Rooooooooooooooooooooooooooooooooooooooom  --}}
                       <div class="card radius-10 w-100">
						    <div class="card-header">
							    <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Customer Information</h6>
                                    </div>			
							    </div>
						    </div>

						   <div class="card-body">

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                            UserName 
                                            <span class="badge bg-success rounded-pill">
                                                {{$editData->user->name}}
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                            Email 
                                            <span class="badge bg-danger rounded-pill">
                                                {{$editData->user->email}}
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                            Phone 
                                            <span class="badge bg-primary rounded-pill text-bold">
                                                {{$editData->user->phone}}
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                            zip_code 
                                            <span class="badge bg-secondary rounded-pill">
                                                {{$editData->zip_code}}
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                            Address 
                                            <span class="badge bg-warning rounded-pill">
                                                {{$editData->address}}
                                            </span>
                                        </li>
                                        
                                    </ul>

                           </div>

                                {{-- End information div   --}}
				   </div>
				</div><!--end row-->

				
					

					
			</div>

<!-- Modal -->
                <div class="modal fade myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rooms</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            
                        </div>
                    </div>
                </div>
 {{-- End Modal --}}


            <script>
             $(document).ready(function (){
                    getAvaility();
                    $(".assign_room").on('click', function(){
                    $.ajax({
                    url: "{{ route('assign_room',$editData->id) }}",
                     success: function(data){
                    $('.myModal .modal-body').html(data);
                    $('.myModal').modal('show');
                }
            });
            return false;
        });
                });
                function getAvaility(){
                    var check_in = $('#check_in').val();
                    var check_out = $('#check_out').val();
                    var room_id = "{{ $editData->rooms_id }}";
                    $.ajax({
                    url: "{{ route('check_room_availability') }}",
                    data: {room_id:room_id, check_in:check_in, check_out:check_out},
                    success: function(data){
                        $(".availability").text(data['available_room']);
                        $("#available_room").val(data['available_room']);
                    }
                }); 
                }
   
            </script>
			@endsection
		