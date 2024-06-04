@extends('layouts.app')

@section('content')
<section id="home" class="home pt-3 overflow-hidden">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="home-banner home-banner-1"></div>                      
            </div>

            <div class="carousel-item">
                <div class="home-banner home-banner-2">
                    <div class="home-banner-text">
                        <h2>Welcome to SkinSense</h2>
                        <P>Explore a wide range of amazing products</P>
                        <a href="/#products" class="btn mt-4">Our Products</a>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
                <span class="silder-icon">
                    <i class="fa fa-angle-left"></i>
                </span>
            </span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
                <span class="silder-icon">
                    <i class="fa fa-angle-right"></i>
                </span>
            </span>
        </button>
    </div>

    <div class="catsection col-12">
    <!-- Swiper -->
    <!-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
        @foreach ($cats->where("visibility",1) as $cat)
            <div class="swiper-slide"><a href="{{route("cat.items",[$cat->slug])}}">{{$cat->title}} ({{$cat->items->count()}})</a></div>
        @endforeach
        </div>
    </div> -->
    </div>
</section>

{{-- Products section --}}
<section class="products mt-4" id="products">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="head text-center mb-5">
                    <h2 class="pb-2 position-relative d-inline-block">OUR PRODUCTS</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($items as $item)
            <div class="col-sm-6 col-lg-4">
                <div class="product-list ml-1 mb-2">
                    <div class="product-image position-relative">
                        <img src="{{asset('images/items/'.$item->image)}}" alt="{{$item->title}}" class="img-fluid">
                    </div>

                    <div class="product-info pt-3">
                        <h2 class="text-capitalize product-title" >{{$item->title}}</h2>
                        <h5 class="product-desc">{{Str::limit($item->description,30)}}</h5>
                        <h6 class="product-made">Made in {{$item->Country_Mad}} </h6>

                        <span class="mb-0 product-price">RM {{$item->price}}
                            @if ($item->Old_price>0)
                            <del>
                                <span class="text-danger">RM {{$item->Old_price}}</span>
                            </del>
                            @endif
                        </span>

                        <span class="show_product">
                            <a href="{{route('item.show',$item->slug)}}" class="btn mt-4">Show Product <i class="fa fa-chevron-right"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>

        {{-- Pagination --}}
        <div class="justify-content-center d-flex my-pagination">
            {{$items->links("pagination::bootstrap-4")}}
        </div>
    </div>
</section>

{{-- Contact section --}}
<section id="contact" class="contact mt-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="head text-center mb-5">
                    <h2 class="pb-2 position-relative d-inline-block">CONTACT US</h2>
                </div>
            </div>
        </div>

        <div class="contact-middle">
            {{-- Email info --}}
            <div>
                <span class="contact-icon">
                    <i class="fas fa-paper-plane"></i>
                </span>
                <span>Email Address</span>
                <p>skinsense@gmail.com</p>
            </div>

            {{-- Location info --}}
            <div>
                <span class="contact-icon">
                    <i class="fas fa-map-signs"></i>
                </span>
                <span>Location</span>
                <p>Selangor, Malaysia</p>
            </div>

            {{-- Website info --}}
            <div>
                <span class="contact-icon">
                    <i class="fas fa-globe"></i>
                </span>
                <span>Website</span>
                <p>www.skinsense.com</p>
            </div>

            {{-- Contact number info  --}}
            <div>
                <span class="contact-icon">
                    <i class="fas fa-phone"></i>
                </span>
                <span>Contact Number</span>
                <p>06-123 4567</p>
            </div>
        </div>

        <div class="contact-bottom">
            {{-- Contact form --}}
            <form action="{{route('send_email')}}" method="POST" class="form">
                @csrf
                <input type="text" name="name" placeholder="Enter Your Name" id="name">
                <input type="email" required name="email" placeholder="Enter Your Email" id="email">
                <input type="text" name="subject" placeholder="Subject" id="subject"> 
                <textarea name="msj" id="msj" rows="9" placeholder="Enter Your Message"></textarea>
                <input type="submit" value="Send Message" class="btn-send">
            </form>

            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509884.0171184477!2d101.0513207778675!3d3.232855384448511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4252cdeb045f%3A0x26e1bee1215dfbb9!2sSelangor%2C%20Malaysia!5e0!3m2!1sen!2sus!4v1717432797483!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

{{-- Footer section---}}
<section class="footer mt-3">
    <div class="social">
        <a href=""><i class="fab fa-instagram text-black"></i></a>
        <a href=""><i class="fab fa-linkedin"></i></a>
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
    </div>

    <ul class="list">
        <li><a href="\#home">Home</a></li>
        <li><a href="\#products">Products</a></li>
        <li><a href="\#contact">Contact Us</a></li>
    </ul>

    <p class="copyright">&copy Copyright 2024. All rights reserved.</p>
</section>
@endsection

@section('javascript')
<script>
    /* Initialize swiper*/
    /* Swiper script*/
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    });

    window.onload=function(){
        var Msj=document.getElementsByClassName("msj")
        var btnclose=document.getElementById("close");
        btnclose.onclick=function(){
            for(c=0;c<Msj.length;c++){
                Msj[c].style.display = "none";
            }
        }
    }
</script>
@endsection