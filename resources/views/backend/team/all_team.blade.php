@extends('admin.admin_dashboard')
@section('admin')   

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Members</div>
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
                     <a href="{{route('add.member')}}" class='btn btn-outline-primary radius-30 px-5 '> Add Member</a>
                    </div>
                </div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Image</th>
										<th>Position</th>
										<th>Facbook</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($team as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->name}}</td>
										<td><img src="{{asset($item->image)}}" alt="Error " style="70px" height='40px'></td>
										<td>{{$item->postion}}</td>
										<td>{{$item->facbook}}</td>
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