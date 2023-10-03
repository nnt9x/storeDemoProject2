@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
             <h1>{{$product->name}}</h1>


            <div id="carouselExampleControls" class="carousel slide" data-coreui-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $image )
                        <div class="carousel-item @if($loop->index == 0) active @endif">
                            <img src="{{$image->url}}" class="d-block w-100">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-coreui-target="#carouselExampleControls" data-coreui-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-coreui-target="#carouselExampleControls" data-coreui-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>

@endsection
