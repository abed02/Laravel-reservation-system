@extends('admin.admin_dashboard')
@section('admin')   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>

    
.large-checkbox
{
    
    transform: scale(1.5);
}

</style>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Comments</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Comment</li>
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
										<th>user Name</th>
										<th>Post Name</th>
										<th>Message</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($comments as $key => $item)
									<tr>
										<td>{{$item->id}}</td>
                                        <td>{{$item->user->name}}</td>
										<td>{{$item->post->post_title}}</td>
										<td>{{$item->message}}</td>
										<td class=" d-flex justify-content-center ">
                                            <div class="form-check-danger form-check form-switch">
                                                <input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-comment-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} >
                                                <label class="form-check-label" for="flexSwitchCheckCheckedDanger"> </label>
                                            </div>
                                        </td>
									</tr>
                                   @endforeach 
								
							
							</table>
						</div>
					</div>
				</div>
			</div>

            <script>
                $(document).ready(function(){
                    $('.status-toggle').on('change', function(){
                        var commentId = $(this).data('comment-id');
                        var isChecked = $(this).is(':checked');
                        // Send an ajax request to update status 
                        $.ajax({
                            url: "{{ route('update.comment.status') }}",
                            method: "POST",
                            data: {
                                comment_id: commentId,
                                is_checked: isChecked ? 1 : 0,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response){
                                toastr.success(response.message);
                            },
                            error: function(){
                            }
                        }); 
                    });
                });
            </script>
@endsection