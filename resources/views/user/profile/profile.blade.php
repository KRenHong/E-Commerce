@extends('layouts.app')

@section('content')
<section id="profile" class="profile-section">
  @if (session()->has("success") || session()->has('info') || session()->has('success-mail') || $errors->all())
  <div class="row" style="margin-top: 80px">
    <div class=" col-sm-6 col-md-8 mx-auto my-4">
      @include('layouts.alerts')
    </div>
  </div>
  @endif

  <center class='profile-container mt-5'>
    <div class="row">
      <div class="col-sm-12">
          <div class="head text-center mb-4">
              <h2 class="pb-2 position-relative d-inline-block">MY PROFILE</h2>
          </div>
      </div>
    </div>
    <div class="profile-box">
      <form action="{{route('user.update',$user->id)}}" method="POST"  autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if (!empty($user->image))
        <img src="{{asset('images/users/'.$user->image)}}" alt="{{$user->name}}">

        @else
        <img src="{{asset('images/users/DefaultUserImg.png')}}" alt="Profil">
        @endif

        <label for="file">Edit Profile Picture</label>
        <input type="file" name="image" id="file" accept="image/*">

        <input type="text" name="name" autocomplete="off"
        @if (!empty($user->name))
        value='{{$user->name}}'

        @else
        placeholder="Username"
        @endif
        >

        <input type="text" name="FullName"
        @if (!empty($user->FullName))
        value='{{$user->FullName}}'

        @else
        placeholder="Enter your fullname"
        @endif
        >

        <input type="email" name="email"
        @if (!empty($user->email))
        value='{{$user->email}}'
        
        @else
        placeholder="Edit your email"
        @endif
        >

        <input type="password" name="password_confirmation" placeholder="Enter the new password">

        <input type="password" name="password" placeholder="Re-enter your password">
        <a type="button" href="/" class="btn">Cancel</a>
        <button type="submit" class="btn">Save Changes</button>
      </form>
    </div>
  </center>
</section>
@endsection

@section('javascript')
<script>
var Msj=document.getElementsByClassName("msj")
var btnclose=document.getElementById("close");
  btnclose.onclick=function(){
    for(c = 0; c < Msj.length; c++){
        Msj[c].style.display = "none";
    }
  }
</script>
@endsection