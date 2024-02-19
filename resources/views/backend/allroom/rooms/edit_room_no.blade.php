@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Room Number</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Room Number</li>
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

                                <form action="{{ route('update.roomno',$editroomno->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <!-- Hidden input for id -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Room Number </h6>
                                                    <input type="text" class="form-control" name='room_no'  value='{{$editroomno->room_no}}' />
                                                </div>

                                                <div class="col-md-4">
                                                    <h6>Room style </h6>
                                                    <select name='status'id="input7" class="form-select">
                                                        <option selected="">Select Status </option>
                                                        <option value="Active" {{ $editroomno->status == 'Active'?'selected':''}}>Active</option>
                                                        <option value="Inactive" {{ $editroomno->status == 'Inactive'?'selected':''}}>Inactive</option>
                                                      
                                                    </select>
                                                   
                                                </div>

                                                <div class="col-md-4 text-center">
                                                   
                                                    <button type="submit" class="btn btn-outline-primary px-4 mt-4 radius-30"   >Save  </button>
                                                </div>
                                            </div>

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


@endsection