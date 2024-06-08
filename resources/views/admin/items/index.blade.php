@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                        <h3>
                            <i class="fas fa fa-store"></i> Products
                        </h3>

                        <a href="{{route('item.create')}}" class="btn">
                            <i class="fas fa fa-plus"></i>
                        </a>
                    </div>

                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Old Price</th>
                                <th>In Stock</th>
                                <th>Quantity</th>
                                <th>Country Made</th>
                                <th>Image</th>
                                <th>Category </th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @foreach ($items as $item)
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{Str::limit($item->description,50)}}  </td>
                                <td>RM {{$item->price}}</td>
                                <td>RM {{$item->Old_price}}</td>
                                <td>{{$item->in_Stock>0?"Available":"Not Available"}}</td>
                                <td>{{$item->Qte}}</td>
                                <td>{{$item->Country_Mad}}</td>

                                <td>
                                    <img src="images/items/{{$item->image}}" alt="{{$item->title}}" class="img-fluid rounded-circle" width="70" height="70">
                                </td>

                                <td>{{$item->category->title}}</td>

                                <td class="d-flex f-row justify-content-center align-items-center">
                                    <a href="{{route('item.edit',$item->slug)}}" class="btn btn-success btn-sm ml-3" >
                                        <i class="fas fa fa-edit"></i>
                                    </a>

                                    <form id="{{$item->id}}" action="{{route('item.destroy',$item->slug)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault();
                                            if(confirm('Would you like Delete The Product {{$item->title}} ??')){
                                            document.getElementById('{{$item->id}}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                                @endforeach
                    </table>

                    {{-- Pagination --}}
                    <div class="justify-content-center d-flex">
                        {{$items->links("pagination::bootstrap-4")}}
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