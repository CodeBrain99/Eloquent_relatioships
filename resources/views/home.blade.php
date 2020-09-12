@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        <h2>Users:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>userneme</th>
                    <th>email</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach ($users as $key => $user)   
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>
    </div>
    
    <div class="row py-3">
        <h2>Users - addresses:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>userneme</th>
                    <th>email</th>
                    <th>country</th>
                    <th>city</th>
                    <th>street</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($users_addresses) > 0)
                        @foreach ($users_addresses as $key => $user_address)   
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$user_address->name}}</td>
                                <td>{{$user_address->email}}</td>
                                <td>{{$user_address->address->country}}</td>
                                <td>{{$user_address->address->city}}</td>
                                <td>{{$user_address->address->street}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>
    </div>

    <h2 class="mt-2">Users - addresses & orders:</h2>
    <div id="accordion">
        @if(count($users_addresses_orders) > 0)
            @foreach ($users_addresses_orders as $key => $user_address_orders)
                <div class="card my-3">
                    <div class="card-header" id="headingTwo">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>userneme</th>
                                    <th>email</th>
                                    <th>country</th>
                                    <th>city</th>
                                    <th>street</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$user_address_orders->name}}</td>
                                        <td>{{$user_address_orders->email}}</td>
                                        <td>{{$user_address_orders->address->country}}</td>
                                        <td>{{$user_address_orders->address->city}}</td>
                                        <td>{{$user_address_orders->address->street}}</td>
                                    </tr>
                                </tbody>
                        </table>
                        <button class="btn btn-info text-white collapsed" data-toggle="collapse" data-target="{{'#users_addresses_orders_'.$user_address_orders->id}}" aria-expanded="false" aria-controls="collapseTwo">
                            More...
                        </button>
                    </div>
                    <div id="{{'users_addresses_orders_'.$user_address_orders->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    @if(count($user_address_orders->orders) > 0)
                                        <tr>
                                            <th>#</th>
                                            <th>Order Status</th>
                                            <th>Order date</th>
                                            <th>shipping date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        @foreach ($user_address_orders->orders as $order_index => $user_orders)
                                            <tr>
                                                <td>{{++$order_index}}</td>
                                                <td>{{$user_orders->order_status}}</td>
                                                <td>{{$user_orders->order_date}}</td>
                                                <td>{{$user_orders->shipping_date}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <h2 class="mt-2">Users - products:</h2>
    <div id="accordion">
        @if(count($users) > 0)
            @foreach ($products_users as $key => $products_user)
                <div class="card my-3">
                    <div class="card-header" id="headingTwo">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>userneme</th>
                                    <th>email</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$products_user->name}}</td>
                                        <td>{{$products_user->email}}</td>
                                        
                                    </tr>
                                </tbody>
                        </table>
                        <h5 class="mb-0">
                            
                        <button class="btn btn-info text-white collapsed" data-toggle="collapse" data-target="{{'#products_user_'.$products_user->id}}" aria-expanded="false" aria-controls="collapseTwo">
                            More...
                        </button>
                        </h5>
                    </div>
                    <div id="{{'products_user_'.$products_user->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    @if(count($products_user->products) > 0)
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                        @foreach ($products_user->products as $product_index => $product_user)
                                            <tr>
                                                <td>{{++$product_index}}</td>
                                                <td>{{$product_user->product_name}}</td>
                                                <td>{{$product_user->category}}</td>
                                                <td>{{$product_user->product_price}}</td>
                                                <td>{{$product_user->pivot->quantity}}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    
</div>
@endsection
