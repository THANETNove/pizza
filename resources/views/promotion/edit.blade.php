@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">เเก้ไข Promotion</h6>
            </div>
            <div class="card-body">
                <form class="user" id="myForm" method="POST" action="{{ route('promotion-update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label @error('name') is-invalid @enderror">ชื่อ
                            PIZZA</label>
                        <select class="form-select" aria-label="Default select example" name="name">
                            <option selected disabled>เลือก PIZZA</option>
                            @foreach ($pizzas as $pi)
                                @if ($data->name == $pi->id)
                                    <option value="{{ $pi->id }}" selected>{{ $pi->name }}</option>
                                @else
                                    <option value="{{ $pi->id }}">{{ $pi->name }}</option>
                                @endif
                            @endforeach


                        </select>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1"
                            class="form-label @error('toppings') is-invalid @enderror">Toppings</label>
                        <select class="form-select" aria-label="Default select example" name="toppings">
                            <option selected disabled>เลือก Toppings</option>
                            @foreach ($toppings as $to)
                                @if ($data->toppings == $to->id)
                                    <option value="{{ $to->id }}" selected>{{ $to->name }}</option>
                                @else
                                    <option value="{{ $to->id }}">{{ $to->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('toppings')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ราคา Promotion</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $data->price }}" placeholder="ราคา" required>
                    </div>
                    <div class="mb-3">

                        <div class="row">

                            <div class="col-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">วันที่เริ่ม Promotion</label>
                                <input type="text" class="form-control" id="start_date" value="{{ $data->start_date }}"
                                    name="start_date" placeholder="yy-mm-dd">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">วันที่สิ้นสุด Promotion</label>
                                <input type="text" class="form-control" id="end_date" value="{{ $data->end_date }}"
                                    name="end_date" placeholder="yy-mm-dd">
                            </div>


                        </div>

                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-primary">
                        {{ __('บันทึก') }}
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
