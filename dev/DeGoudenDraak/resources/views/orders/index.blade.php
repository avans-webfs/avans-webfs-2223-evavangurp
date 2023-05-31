@extends('layouts.layout')

@section('body')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Bestellingen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a class="btn btn-secondary" href="/orders">Terug</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prijs</th>
                    <th>Gerechten</th>
                    <th>Specialiteiten</th>
                    <th>Tafelnummer</th>
                    <th>Betaald op</th>
                    <th>Aangemaakt op</th>
                    <th>Laatst aangepast op</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>€{{number_format($order->price, 2, ',', ' ')}}</td>
                        <td>
                            @foreach($order->dishes as $dish)
                            {{$dish->name}} 
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->specialties as $specialty)
                            {{$specialty->name}} 
                            @endforeach
                        </td>
                        <td>{{$order->table_number}}</td>
                        @if(isset($order->paid_at))
                        <td>{{$order->paid_at}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at}}</td>
                        <td>
                            <form action="/admin/orders/{{$order->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection
