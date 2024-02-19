@extends('admin.admin_dashboard')
@section('admin')   

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Booking</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Members</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						
					</div>
				</div>
				<!--end breadcrumb-->
                <div class='row d-flex'>
                    <div class='col-9'>
                    </div>
                    <div class='col-3'>
                     <a href="{{route('add.room.list')}}" class='btn btn-outline-primary radius-30 px-5 '> Add Booking</a>
                    </div>
                </div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Booking code</th>
										<th>Booking date</th>
										<th>Customer</th>
										<th>Room </th>
										<th>check_in/out</th>
                                        <th>Total Room</th>
                                        <th>Guest</th>
                                        <th>Total Night</th>
                                        <th>Payment</th>
                                        <th>status</th>
                                        <th>Action</th>
                                        
									</tr>
								</thead>
								<tbody>
                                    @foreach ($allData as $key => $item)
									<tr>
									<td>{{$key +1 }}</td>
                                    <td> <a href="{{route('edit.booking',$item->id)}}">{{$item->code}}</a></td>
                                    <td>{{$item->created_at->format('d/m/y')}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->room->roomtype}}</td>
                                    <td> <span class="badge bg-primary">{{$item->check_in}} </span> / <span class="badge bg-warning text-dark"> {{$item->check_out}} </span></td>
                                    <td>{{$item->number_of_rooms}}</td>
                                    <td>{{$item->person}}</td>
                                    <td>{{$item->total_night}}</td>

                                    <td> @if ($item->payment_status == '1')
                                            <span class="textsuccess"> Complete</span>
                                        @else
                                            <span class="text-danger">Pending</span>
                                            
                                             @endif 
                                    </td>

                                    <td>@if ($item->status == '1')
                                        <span class="textsuccess"> Complete</span>
                                    @else
                                        <span class="text-danger">Pending</span>
                                        
                                         @endif </td>

										<td class=" d-flex justify-content-between">
                                            <a href="{{route('edit.team',$item->id) }}" class='btn btn-outline-warning px-3 radius-30'>Edit</a>
                                            <a href="{{route('delete.team',$item->id) }}" class='btn btn-outline-danger px-3 radius-30' id='delete'>Delete</a>
                                        </td>
									</tr>
                                   @endforeach 
								
							
							</table>
						</div>
					</div>
				</div>
			</div>

@endsection