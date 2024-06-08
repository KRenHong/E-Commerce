@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card p-3">
                        <div class="card-title border-bottom">
                            <h3><i class="fa fa-store"></i> Add New Product</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="title" class="col-md-2 col-sm-3 form-label">Title :</label>
                                    
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="The title must be less than 20 characters">
                                    </div>
                                </div>

                                {{-- Description input --}}
                                <div class="row mb-3">
                                    <label for="desc" class="col-md-2 col-sm-3 form-label">Description :</label>

                                    <div class="col-md-10 col-sm-9">
                                        <textarea name="description" id="desc" cols="30" rows="9" placeholder="Describe your product" class="form-control"></textarea>
                                    </div>
                                </div>

                                {{-- Price input --}}
                                <div class="input-group mt-3 mb-3">
                                    <label for="price" class="col-md-2 col-sm-3 form-label">Price :</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter the price of your product">
                                    <span class="input-group-text">RM</span>
                                    <span class="input-group-text">0.00</span>
                                </div>

                                {{-- Old price input --}}
                                <div class="input-group mt-3 mb-3">
                                    <label for="old-price" class="col-md-2 col-sm-3 form-label">Old Price :</label>
                                    <input type="text" class="form-control" id="old-price" name="Old_price" placeholder="Enter the old price of your product if exists">
                                    <span class="input-group-text">RM</span>
                                    <span class="input-group-text">0.00</span>
                                </div>

                                {{-- In stock --}}
                                <div class="col-sm-10 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="in_Stock" id="non_dispo" value="0" checked aria-label="Radio button for following text input">
                                        <label class="form-check-label" for="non_dispo">Not available in stock</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="in_Stock" id="dispo" value="1">
                                        <label class="form-check-label" for="dispo">Available in stock</label>
                                    </div>
                                </div>

                                {{-- Quantity --}}
                                <div class="row mb-3">
                                    <label for="qte" class="col-md-2 col-sm-3 form-label">Quantity :</label>

                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" name="Qte" id="qte" class="form-control" placeholder="Enter the available amount of your product">
                                    </div>
                                </div>

                                {{-- Country made --}}
                                <div class="row mb-3">
                                    <label for="cm" class="col-md-2 col-sm-3 form-label">Country Mad :</label>
                                    
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" name="Country_Mad" id="cm" class="form-control" placeholder="Enter the name of the country of manufacture">
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div class="input-group mb-3">
                                    <label for="inputGroupFile02" class="col-md-2 col-sm-3 form-label">Product Image :</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="image">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>

                                {{-- Category  --}}
                                <div class="input-group mb-3">
                                    <label for="cat" class="col-md-2 col-sm-3 form-label">Product Category :</label>

                                    <select name="category_id" id="cat" class="form-control">
                                        <option value="" selected disabled>Choose a category</option>
                                        @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}" >{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" value="Send" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection