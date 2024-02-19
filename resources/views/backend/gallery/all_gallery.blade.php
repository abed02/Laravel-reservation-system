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
                     <a href="{{route('add.image')}}" class='btn btn-outline-primary radius-30 px-5 '> Add Image </a>
                    </div>
                </div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                            <form action="{{route('delete.gallery.multiple')}}" method="post"> 
                                @csrf
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width ='50px'>Select</th>
                                            <th width ='50px'> Id</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gallery as $item)
                                        <tr>
                                            <td class="text-center"> <input type="checkbox" name="selectedItem[]" value="{{$item->id}}" class="form-check-input mt-3" ></td>
                                            <td>{{$item->id}}</td>
                                            <td><img src="{{asset($item->photo_name)}}" alt="Error " width="70px" height='50px'></td>
                                            <td class=" d-flex justify-content-between">
                                                <a href="{{route('edit.gallery',$item->id) }}" class='btn btn-outline-warning my-2 px-3 radius-30'>Edit</a>
                                                <a href="{{ route('delete.gallery',$item->id) }}" class="btn btn-danger my-2 px-3 radius-30" id="delete"> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                    
                                
                                </table>
                                <button type="submit" class="btn btn-danger">Delete Selected</button>

                            </form>    
						</div>
					</div>
				</div>
			</div>

@endsection