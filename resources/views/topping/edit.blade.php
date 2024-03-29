@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">เเก้ไข Topping</h6>
            </div>
            <div class="card-body">
                <form class="user" id="myForm" method="POST" action="{{ route('topping-update', $data->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}"
                            placeholder="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ราคา (กรณี + ราคา Topping)</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $data['price'] }}" placeholder="ราคา">
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
