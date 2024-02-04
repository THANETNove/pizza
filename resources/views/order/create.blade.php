@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">เพิ่ม Order</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    @php
                        $date = now();

                        $formattedDate = $date->format('Y-m-d');

                    @endphp
                    @foreach ($pizzas as $pi)
                        @foreach ($promotion as $pro)
                            @if ($pro->name == $pi->id && $formattedDate >= $pro->start_date && $formattedDate <= $pro->end_date)
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters ">
                                                <div class="col mr-2">
                                                    <div class=" mb-0 font-weight-bold text-gray-800">{{ $pi->name }}
                                                    </div>
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-2"
                                                        id="price-pro">
                                                        @foreach ($topping as $to)
                                                            @if ($pro->toppings == $to->id)
                                                                $ {{ number_format($pi->price + $to->price, 2) }}
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    <select class="form-control-sm " id="topping-pro"
                                                        aria-label="Disabled select example">

                                                        @foreach ($topping as $to)
                                                            @if ($pro->toppings == $to->id)
                                                                <option value="{{ $to->id }}" selected>
                                                                    {{ $to->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input class="form-control form-control-sm mt-3 mb-3" type="number"
                                                        placeholder="1" aria-label=".form-control-sm example"
                                                        id="quantity-pro" value="1" min="1">

                                                    <span>ระยะ Promotion: </span>
                                                    <span class="start-date">
                                                        {{ \Carbon\Carbon::parse($pro->start_date)->format('d-m-yy') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($pro->end_date)->format('d-m-yy') }}
                                                    </span>
                                                </div>
                                                <div class="col-auto">
                                                    <img id="myImg{{ $pi->id }}" class="cursor"
                                                        src="{{ URL::asset('/assets/img/pizza/' . $pi->image) }}"
                                                        onclick="showImage(this,{{ $pi->id }})" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" height="90px" width="80px"
                                                        alt="...">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3"
                                                onclick="addToCart('{{ $pi->name }}')">Add
                                                to Cart</button>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                    @foreach ($pizzas as $pi)
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="mb-0 font-weight-bold text-gray-800">{{ $pi->name }}</div>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-2 total-price">
                                                ${{ number_format($pi->price, 2) }}
                                            </div>
                                            <select class="form-control-sm topping-select"
                                                aria-label="Disabled select example" data-pi-price="{{ $pi->price }}">
                                                <option selected disabled>Topping</option>
                                                @foreach ($topping as $to)
                                                    <option value="{{ $to->id }}"
                                                        data-topping-price="{{ $to->price }}">{{ $to->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input class="form-control form-control-sm mt-3" type="number" placeholder="1"
                                                aria-label=".form-control-sm example" value="1" min="1">
                                        </div>
                                        <div class="col-auto">
                                            <img id="myImg{{ $pi->id }}" class="cursor"
                                                src="{{ URL::asset('/assets/img/pizza/' . $pi->image) }}"
                                                onclick="showImage(this,{{ $pi->id }})" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" height="90px" width="80px" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <script>
        // Sample JavaScript function to handle adding items to the cart
        function addToCart(pizzaName, pizzaId, promotionId) {
            var price = $('#price-pro').text().replace(/\s/g, '').replace(/\$/g, '');
            var topping = $('#topping-pro').text().replace(/\s/g, '');
            var quantity = $('#quantity-pro').val();


            // You can implement logic to add this item to the shopping cart
            console.log('Added to Cart:', pizzaName, price, topping, quantity);
        }
    </script>
    <!-- End of Main Content -->
@endsection
