@extends('frontend.main_master')

@section('main')



    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>About Us</li>
                </ul>
                <h3>About Us</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->



 <!-- About Area -->
 <div class="about-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{asset('frontend/assets/img/about/about-img3.jpg')}}" alt="Images">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <h2>We Have More Than 20+ Global & International Experience</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt ante tellus, 
                            sit amet rhoncus massa aliquam sit amet. Cras porttitor mauris quis mattis ornare.
                            In efficitur at sem quis pretium. Aenean sit amet neque ut dolor lacinia rutrum. 
                            In vulputate pellentesque turpis et porta.
                        </p>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->


 <!-- Team Area Two -->
 <div class="team-area-two pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Special Team Member and Their Details at a Glance</h2>
        </div>
        <div class="row pt-45">
           

           
                @foreach ($team as $item)
                    
               
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="team-card">
                    <a href="team.html">
                        <img src="{{asset($item->image)}}" alt="Images">
                    </a>
                    <div class="content">
                        <h3>{{$item->name}}</h3>
                        <span>{{$item->postion}}</span>
                    </div>
                    <ul class="social-link">
                        <li>
                            <a href="{{$item->facbook}}" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li> 
                       
                    </ul>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
<!-- Team Area Two End -->
 

<div class="testimonials-area-another pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Latest Testimonials and What Our Client Says</h2>
        </div>

        <div class="testimonials-slider-three owl-carousel owl-theme pt-45">
            
            @foreach ($tesimoinal as $item)
                
          
            <div class="testimonials-item">
                <i class="flaticon-left-quote text-color"></i>
                <p>
                    {{$item->message}}
                </p>
                <ul>
                    <li>
                        <img src="{{asset($item->message)}}" alt="Images">
                        <h3> {{$item->name}}</h3>
                        <span> {{$item->city}}</span>
                    </li>
                </ul>
            </div>


            @endforeach
          
        </div>
    </div>
</div>



@endsection