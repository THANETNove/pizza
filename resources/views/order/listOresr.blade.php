@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">Order</h6>
                <a href="{{ url('order-create') }}">เพิ่ม Order</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">pizzs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $da)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    @php
                                        // Decode the JSON string to an array
                                        $pizzasArray = json_decode($da->pizzas, true);
                                    @endphp
                                    <td>
                                        @if (!empty($pizzasArray))
                                            <ul>
                                                @foreach ($pizzasArray as $pizza)
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img id="myImg{{ $da->id }}" class="cursor"
                                                                src="{{ URL::asset('/assets/img/pizza/' . $pizza['image']) }}"
                                                                onclick="showImage(this,{{ $da->id }})"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                height="90px" width="80px" alt="...">
                                                        </div>
                                                        <div class="col-8">
                                                            Price: {{ number_format($pizza['price'], 2) }}<br>
                                                            Name: {{ $pizza['name_pi'] }}<br>
                                                            Topping: {{ $pizza['topping'] }}<br>
                                                            Quantity: {{ $pizza['quantity'] }}<br>
                                                            Total Price: {{ number_format($pizza['totalPrice'], 2) }}
                                                            <br>
                                                            <br>
                                                            ยอดรวมบิล :{{ number_format($da->total_sum, 2) }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($da->status == 1)
                                            <button type="button" class="btn btn-secondary">ส่งเร็จ</button>
                                        @endif
                                        @if ($da->status == 2)
                                            <button type="button" class="btn btn-secondary">ยกเลิก</button>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
