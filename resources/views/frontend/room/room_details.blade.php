@extends('frontend.main_master')
@section('main')

        <!-- Inner Banner -->
        <div class="inner-banner inner-bg10">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Room Details </li>
                    </ul>
                    <h3>{{$roomdetails['roomtype'] }}</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Room Details Area End -->
        <div class="room-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">

                        <div class="room-details-article">

                            <div class="room-details-slider owl-carousel owl-theme">
                                @foreach ($multi as $image)
                                    
                               
                                <div class="room-details-item">
                                    <img src="{{asset('upload/rooming/multi_img/'.$image->multi_image)}} " alt="Images">
                                </div>
                                @endforeach
                               
                                
                            </div>


 


                            <div class="room-details-title">
                                <h2>{{ $roomdetails->name}}</h2>
                                <ul>
                                    
                                    <li>
                                       <b> Basic : ${{ $roomdetails->price}}/Night/Room</b>
                                    </li> 
                                 
                                </ul>
                            </div>

                            <div class="room-details-content">
                               <p>
                                {!! $roomdetails->description !!}

                               </p>




   <div class="side-bar-plan">
                                <h3>Basic Plan Facilities</h3>
                            
                                <ul>
                                    @foreach ($facility as $fac)
                                        
                                  
                                    <li><a href="#">{{$fac->facility_name}}</a></li>
                                    @endforeach
                                </ul>
                              

                                
                            </div>







<div class="row"> 
 <div class="col-lg-6">



 <div class="services-bar-widget">
                                <h3 class="title">Download Brochures</h3>
        <div class="side-bar-list">
            <ul>
               <li>
                    <a href="#"> <b>Capacity : </b> {{ $roomdetails->room_capacity}} <i class='bx bxs-cloud-download'></i></a>
                </li>
                <li>
                     <a href="#"> <b>Size : </b> {{ $roomdetails->size}} ft <sup> 2</sup> <i class='bx bxs-cloud-download'></i></a>
                </li>
               
               
            </ul>
        </div>
    </div>




 </div>



 <div class="col-lg-6">
 <div class="services-bar-widget">
        <h3 class="title">Room Details</h3>
        <div class="side-bar-list">
            <ul>
               <li>
                    <a href="#"> <b>View : </b>{{ $roomdetails->view}} <i class='bx bxs-cloud-download'></i></a>
                </li>
                <li>
                     <a href="#"> <b>Bad Style : </b> {{ $roomdetails->bed_style}}<i class='bx bxs-cloud-download'></i></a>
                </li>
                 
            </ul>
        </div>
    </div> 

                    </div> 
                        </div>

 

                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Room Details Area End -->

          <!-- Room Details Other -->
          <div class="room-details-other pb-70">
            <div class="container">
                <div class="room-details-text">
                    <h2>Other Room</h2>
                </div>

                <div class="row ">
                    @foreach ($otherRooms as $room)
                        
                    <div class="col-lg-6">
                        <div class="room-card-two">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-4 p-0">
                                    <div class="room-card-img">
                                        <a href="{{url('room/details/'.$room->id)}}">
                                            <img src="{{asset('upload/rooming/'. $room->image)}}" alt="Images">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-8 p-0">
                                    <div class="room-card-content">
                                         <h3>
                                             <a href="{{url('room/details/'.$room->id)}}"> {{$room->roomtype}}</a>
                                        </h3>
                                        <span>{{$room->price}}/ Per Night </span>
                                        <div class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                        </div><p>
                                        {{ $room->short_desc }}
                                    </p>
                                        <ul>
                                            <li><i class='bx bx-user'></i> {{$room->room_capacity}} Person</li>
                                            <li><i class='bx bx-expand'></i> {{$room->size}} ft <sup>2</sup></li>
                                        </ul>

                                        <ul>
                                            <li><i class='bx bx-show-alt'></i> {{$room->view}}</li>
                                            <li><i class='bx bxs-hotel'></i> {{$room->bed_style}}</li>
                                        </ul>
                                        
                                        <a href="{{url('room/details/'.$room->id)}}" class="book-more-btn">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
        <!-- Room Details Other End -->


    



@endsection