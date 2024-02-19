@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Update smtp</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update smtp setting</li>
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

                                <form action="{{ route('smtp.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <!-- Hidden input for id -->
                                        <input type="text" name='id' Hidden value='{{$smtp->id}}'>

									<div class="card-body">

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mailer</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='mailer'  value='{{$smtp->mailer}}' />
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Host </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='host'  value='{{$smtp->host}}' />
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Port</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='port' value='{{$smtp->port}}' />
											</div>
										</div>



										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control"name='username' value='{{$smtp->username}}'  />
											</div>
										</div>

                                        
                                        
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='password' value='{{$smtp->password}}' />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">encryption</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='encryption' value='{{$smtp->encryption}}' />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">From Addres</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='from_address' value='{{$smtp->from_address}}' />
											</div>
										</div>

										

										



										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                                
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