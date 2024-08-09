@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @can("create.product")
            <a type="button" class="btn btn-primary" href="{{ route('home.create')}}">Jauns ieraksts</a>
            @endcan

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Prece nosaukums</th>
                  <th scope="col">Vienību skaits</th>
                  <th scope="col">Cena par vienu vienību</th>
                  <th scope="col">Cena ar PVN</th>
                  <th scope="col">Darbība</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product['Prece nosaukums'] }}</td>
                  <td>{{ $product['Vienību skaits'] }}</td>
                  <td>{{ $product['Cena par vienu vienību'] }}</td>
                  <td>{{ $product['Cena_ar_PVN'] }}</td>
                  <td>
                    @can("update.product")
                        <a type="button" class="btn btn-primary" href=" {{ url('home/show' . '/' . $product->id)}}">Mainit</a>
                    @endcan
                    @can("delete.product")
                        <form action="{{ url('home/destroy' . '/' . $product->id)}}" method="POST">
                            <button type="submit" class="btn btn-danger">Izdzest</button>
                            @method('DELETE')
                            @csrf 
                        </form>

                    @endcan
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
