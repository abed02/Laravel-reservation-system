@php
    $setting = App\Models\SiteSetting::find(1);
@endphp


<div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a  href="{{route('dashboard')}}" class="logo">
                    <img src="{{asset('frontend/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                    <img src="{{asset('frontend/assets/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{ asset($setting->logo) }}" class="logo-one" alt="Logo">
                            <img src="{{ asset($setting->logo) }}" class="logo-two" alt="Logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{url('/')}}" class="nav-link active">
                                        Home 
                                    </a>
                                  
                                </li>
                          

                                <li class="nav-item">
                                    <a href="{{ route('show.gallery') }}" class="nav-link">
                                        Gallery 
                                    </a>
                                   
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('blog.list') }}" class="nav-link">
                                        Blog
                                    </a>
                                   
                                </li>
                                @php
                                    $rooms = App\Models\Room::latest()->get();
                                @endphp

                                <li class="nav-item">
                                    <a href="{{route('froom.all')}}" class="nav-link">
                                        All Room
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($rooms as $item)
                                            
                                       
                                        <li class="nav-item">                                           
                                            <a href="" class="nav-link">
                                                {{$item['roomtype']}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contact.us') }}" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about.us')}}" class="nav-link">
                                        About 
                                    </a>
                                </li>

                                <li class="nav-item-btn">
                                    <a href="#check_in" class="default-btn btn-bg-one border-radius-1">Book Now</a>
                                </li>
                            </ul>

                            <div class="nav-btn">
                                <a href="{{route('froom.all')}}"  class="default-btn btn-bg-one border-radius-5">Book Now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>