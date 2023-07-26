@extends('layouts.layout')
@section('body')
<br>
<div class="d-flex align-items-start">
    <div class="row me-2">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach($dishTypes as $dishType)
            <button class="btn btn-outline-primary mb-2" id="v-pills-{{$dishType->id}}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$dishType->id}}" type="button" role="tab" aria-controls="v-pills-{{$dishType->id}}" aria-selected="false">{{$dishType->name}}</button>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        </div>
        <div class="col-12 mb-3">
            <div class="tab-content" id="v-pills-tabContent">
                @foreach($dishTypes as $dishType)
                    <div class="tab-pane fade" id="v-pills-{{$dishType->id}}" role="tabpanel" aria-labelledby="v-pills-{{$dishType->id}}-tab" tabindex="0">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($dishes as $dish)
                                @if($dish->dish_type_id == $dishType->id)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$dish->name}}</h5>
                                            <p class="card-text">{{$dish->description}}</p>
                                            <form action="{{ route('customer.addToOrder', [$order->id, $dish->id])}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-auto">
                                                        <p class="card-text"><small class="text-body-secondary">€{{number_format($dish->price, 2, ',', '')}}</small></p>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="number" id="amount" name="amount" class="form-control"></input>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="btn btn-primary" type="submit">Voeg toe aan bestelling</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <a class="btn btn-success" href="#">Bestelling inzien</a>
        </div>
    </div>
</div>
@stop