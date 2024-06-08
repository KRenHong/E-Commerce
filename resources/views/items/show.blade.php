@extends('layouts.app')

@section('content')
<!-- <section class="home pt-3 overflow-hidden">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <div class="home-banner home-banner-1">
                <div class="home-banner-text">
                    <h2>TEtstststststststtsst</h2>
                    <P><span style="color:#3b3b3b77">Special offers for</span> you woman</P>
                    <a href="/#products" class="btn btn-danger text-uppercase mt-4">Our Products</a>
                </div>
                </div>                      </div>
            <div class="carousel-item">
                <div class="home-banner home-banner-2">
                    <div class="home-banner-text">
                        <h2>E-SHOP</h2>
                        <P><span style="color:#3b3b3b77">You can pay by card </span>or using Paypal</P>
                        <a href="/#products" class="btn btn-danger text-uppercase mt-4">Our Products</a>
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
</section> -->

<section id="Show-product" class="Show-product mt-4 mb-5">
    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="head text-center mb-5">
                    <h2 class="pb-2 position-relative d-inline-block">{{$item->title}}</h2>
                </div>
            </div>
        </div>
    </div> -->

    <div class="show-product-info position-relative row col-sm-12 col-lg-12">
        <div class="col-sm-12 col-12 col-lg-6">
            <div class="show-product-image position-relative">
                <img src="{{asset('images/items/'.$item->image)}}" alt="{{$item->title}}" class="img-fluid">
                @if ($item->Qte>0 && $item->in_Stock==1)
                <span class="despo-msj">Available in stock</span>
                @else
                <span class="non-despo-msj">Not available in stock</span>
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
            <div class="product-info pt-3">
                <h2 class="text-capitalize show-product-title">{{$item->title}}</h2>

                <hr>

                <span class="mb-0 product-price">RM {{$item->price}}
                    @if ($item->Old_price>0)
                    <del>
                        <span class="text-danger">RM {{$item->Old_price}}</span>
                    </del>
                    @endif
                </span>

                <h5 class="info-title mt-3">Product Description</h5>
                <h6 class="product-desc">{{$item->description}}</h6>
                <h6 class="product-made">Made in {{$item->Country_Mad}}</h6>

                <br>

                <div class="add-to-card">
                    <form action="{{route('add.cart',$item->slug)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="add-to-card" class="qte-label">Quantity :</label>
                            <input type="number" class="form-control" placeholder="Enter the desired quantity" id="add-to-card" name="qte"
                            @if ($item->Qte>0 && $item->in_Stock==1)
                            value="1"
                            @else
                            value="0" readOnly
                            @endif
                            min="1" max="{{$item->Qte}}">
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                @if ($item->Qte<=0 || $item->in_Stock===0)
                                onclick="event.preventDefault();"
                                @else
                                onclick=""
                                @endif
                                class="btn">
                                <i class="fas fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="comment">
    <div class="add-comment">
        <form action="{{route('Comment.store')}}" method="POST" class="form">
            @csrf
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <textarea name="comment" id="comment" rows="1" placeholder="Enter your comment about this product"></textarea>
            <input type="submit" value="Add Your Comment" class="btn-comment">
        </form>
    </div>

    <br>
    <hr>
    
    <div class="comment-box mt-4">
        <div class="comment-box-heading">
            <span>COMMENTS</span>
        </div>

        <div class="comment-box-container">
            @foreach ($comments as $comment)
            @if ($comment->status ===1)
            <div class="comment-info">
                <!--Box Top-->
                <div class="box-top">
                    <div class="profile">
                        <div class='profil-img'>
                            @if (!empty($comment->user->image))
                                <img src="{{asset('images/users/'.$comment->user->image)}}" alt="{{$comment->user->name}}">
                                
                            @else
                                <img src="{{asset('images/users/DefaultUserImg.png')}}" alt="Profil_Image">
                            @endif
                        </div>

                        <div class="name-user">
                            {{$comment->user->name}}

                            @if (!empty($comment->user->FullName))
                            <span>@ {{$comment->user->FullName}}</span>

                            @else
                            <span>@ {{$comment->user->name}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="date">
                        {{$comment->created_at}}
                    </div>
                </div>

                <!--Box Bottom-->
                <div class="client-comment">
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        {{-- Comment Pagination --}}
        <div class="justify-content-center d-flex my-pagination">
            {{$comments->links("pagination::bootstrap-4")}}
        </div>
    </div>
</section>
@endsection

@section('javascript')
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    window.onload=function(){
        window.location=window.location.href+"#Show-product";
    }

    /* Initialize swiper */
    /* Swiper script */
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
    });
</script>
@endsection