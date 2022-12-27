@php use App\Helpers\Formatter; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} | {{ __('You are logged in!') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="container">
                            <h2>Products</h2>
                            <a href="{{route('create')}}" class="btn btn-primary mt-2 mb-4">
                                Create new
                            </a>
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price (USD)</th>
                                    <th>Price with VAT (USD)</th>
                                    <th>Status</th>
                                    <th>Created by</th>
                                    <th>Created date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ ($key + 1) }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ Formatter::asMoney($product->price) }}</td>
                                        <td>{{ Formatter::asMoney($product->getVatPrice()) }}</td>
                                        <td class="text-bg-{{$product->status === 1 ? 'success' : 'danger'}}">
                                            {{$product->status === 1 ? 'Active' : 'Inactive'}}
                                        </td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a class="text-primary" href="{{ route('edit',['id'=>$product->id]) }}">Edit</a>
                                             |
                                            <a class="text-danger" href="{{ route('delete',['id'=>$product->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
