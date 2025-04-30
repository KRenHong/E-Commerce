@extends('layouts.app')
<!-- @section('style')
<style>

</style>

@endsection -->
@section('content')
<!-- <section id="home" class="home pt-3 overflow-hidden">
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
</section> -->

<section id="Payment " class="payment mt-3">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <div class="head text-center mb-5">
              <h2 class="pb-2 position-relative d-inline-block">PAYMENT</h2>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9">
        <p class="mt-4 mb-4 amount">Total amount is <strong> RM {{$amount}}</strong></p>

        <form action="/charge" method="post" id="payment-form">
          @csrf
          <input type="hidden" name="amount" value="{{$amount}}">

          <div class="card-selection">  
            <label for="card-element mb-3">
              Credit or debit card
            </label>

            <div id="card-element"></div>

            <div id="card-errors" role="alert"></div>
          </div>

          <button class="btn mt-5">Submit Payment</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- <section class="footer mt-3">
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
</section> -->
@endsection

@section('javascript')
<script src="https://js.stripe.com/v3/"></script>
<script>
window.onload=function(){
  window.location=window.location.href+"#Payment";

  const stripe = Stripe('pk_test_51JvKLuLiRbvfDlcF1FWsxN0eCszUbVLr3YCevIZZ3k9qz9k4WrQl23y84W4aRtcuVVSfKTeUNkm7tShvvCO1xdeh00aWa1hPs7');
  var elements = stripe.elements();
  var style = {
    base: {
        fontSize: '16px',
        color: '#32325d',
    },
  };

  var card = elements.create('card', {style: style});

  card.mount('#card-element');
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
  }
}
</script>
@endsection