@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                        <h3><i class="fas fa fa-shopping-cart"></i> Orders</h3>
                    </div>

                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Delivered</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @foreach ($orders as $order)
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->qte}}</td>
                                <td>RM {{$order->price}}</td>
                                <td>RM {{$order->total}}</td>

                                <td>
                                    @if ($order->paid)
                                    <i class="fa fa-check text-success"></i>

                                    @else
                                    <i class="fa fa-exclamation-circle text-danger"></i>
                                    @endif
                                </td>

                                <td>
                                    @if ($order->delivered===0)
                                    <form  id="approve-{{$order->id}}" action="{{route('order.update',$order->id)}}" method="Post">
                                        @csrf
                                        @method("PUT")
                                        <i class="fa fa-exclamation-circle text-danger text-align-center"></i>
                                        <button 
                                            onclick="event.preventDefault();
                                                    document.getElementById('approve-{{$order->id}}').submit();"
                                            class="btn btn-primary btn-sm ml-2" >
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>

                                    @else
                                    <i class="fa fa-check text-success"></i>
                                    @endif
                                </td>

                                <td class="d-flex f-row justify-content-center align-items-center">
                                    {{-- Delete Order --}}
                                    <form id="delete-{{$order->id}}" action="{{route('order.destroy',$order->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm ml-2"
                                            onclick="event.preventDefault();
                                        if(confirm('Are you sure you want to delete order ID {{$order->id}}?')){
                                        document.getElementById('delete-{{$order->id}}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                            @endforeach
                    </table>

                    {{-- Pagination--}}
                    <div class="justify-content-center d-flex my-pagination">
                        {{$orders->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
//
var Msj=document.getElementsByClassName("msj")
var btnclose=document.getElementById("close");
btnclose.onclick=function(){
    for(c = 0; c < Msj.length; c++){
        Msj[c].style.display = "none";
    }
}
</script>
@endsection