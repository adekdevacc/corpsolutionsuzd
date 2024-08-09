@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
          <form id="create_product" method="post" action="{{route('home.store')}}">
            @csrf
            <div class="mb-3">
              <label id="Prece nosaukums" class="form-label">Preces nosaukums</label>
              <input type="text" class="form-control" id="Prece nosaukums" name="Prece nosaukums">
              <label id="Vienību skaits" class="form-label">Vienību skaits</label>
              <input type="text" class="form-control" id="Vienību skaits" name="Vienību skaits">
              <label id="Cena par vienu vienību" class="form-label">Cena par vienību</label>
              <input type="text" class="form-control" id="Cena par vienu vienību" name="Cena par vienu vienību">
            </div>
            <button type="submit" class="btn btn-primary">Izveidot</button>
          </form>          
        </div>
    </div>
</div>
@endsection
