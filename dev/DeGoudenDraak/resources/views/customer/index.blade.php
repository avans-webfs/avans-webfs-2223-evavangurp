@extends('layouts.layout')
@section('body')
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
<div class="row">
    <div class="col">
        <h3>Klik hier om een nieuwe bestelling te starten:</h3>
        <form action="{{ route('customer.index')}}" method="post">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="tablenumber" class="col-form-label">Tafel nummer</label>
                </div>
                <div class="col-auto mb-2">
                    <input type="number" id="tablenumber" name="tablenumber" class="form-control" aria-describedby="tablenumber">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Start nieuwe bestelling</button>
        </form>
    </div>
</div>
@stop