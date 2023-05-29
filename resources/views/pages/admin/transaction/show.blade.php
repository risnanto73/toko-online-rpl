@extends('layouts.parent')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">
                Transaction Item
            </h5>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->transactionItem as $row )
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">{{ $row->product->name}}</td>
                            <td scope="col">{{ number_format($row->product->price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection