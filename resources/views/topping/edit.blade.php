@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">เเก้ไข PIZZA</h6>
            </div>
            <div class="card-body">
                <form class="user" id="myForm" method="POST" action="{{ route('update-pizza', $data->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $data['name'] }}"
                            placeholder="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ราคา</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $data['price'] }}" placeholder="ราคา" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" placeholder="ราคา" required>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img class="cursor" src="{{ URL::asset('/assets/img/pizza/' . $data->image) }}" height="90px"
                            width="80px" alt="...">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $data['description'] }}
                        </textarea>
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
