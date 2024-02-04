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
                                <th scope="col">ชื่อ</th>
                                <th scope="col">Topping</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">เริ่ม Promotion</th>
                                <th scope="col">หมด Promotion</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                          {{--   @foreach ($data as $da)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $da->pizzaName }}</td>
                                    <td>{{ $da->toppingName }}</td>
                                    <td>{{ number_format($da->price) }}</td>
                                    <td>{{ $da->start_date }}</td>
                                    <td>{{ $da->end_date }}</td>
                                    <td>
                                        <img id="myImg{{ $da->id }}" class="cursor"
                                            src="{{ URL::asset('/assets/img/pizza/' . $da->image) }}"
                                            onclick="showImage(this,{{ $da->id }})" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" height="90px" width="80px" alt="...">
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('promotion-edit', $da->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <a class="dropdown-item alert-destroy"
                                                    onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                    href="{{ url('promotion-destroy', $da->id) }}"><i
                                                        class="bx bx-trash me-1"></i> ยกเลิก</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
