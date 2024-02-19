@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Room type </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Room type</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            
        </div>
    </div>
    <!--end breadcrumb-->
    <div class='row d-flex'>
        <div class='col-9'>
            <h6 class="mb-0 ">Room Type list</h6>
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
                            <th>Room Number</th>
                            <th>Image</th>	
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($room_number_list as $key => $item)
                
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->roomtype}}</td>
                            <td>{{$item->room_no}}</td>
                            <td> <img src="{{ (!empty($item->image)) ? url ('upload/rooming/'.$item->image)
                                : url ('upload/no_image.jpg')}}" alt="Room image" width="50" height="30"></td>

                                <td>
                                    {{$item->status}}
                                </td>
                            <td class=" d-flex justify-content-between">

                            
                                <a href="{{route('edit.roomno',$item->id) }}" class='btn btn-outline-warning px-3 radius-30'>Edit</a>

                                <a href="{{route('delete.roomno',$item->id) }}" class='btn btn-outline-danger px-3 radius-30' id='delete'>Delete</a>
                            </td>
                        </tr>
             @endforeach 
                    
                
                </table>
            </div>
        </div>
    </div>
</div>




@endsection