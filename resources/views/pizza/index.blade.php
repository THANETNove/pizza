@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-2">PIZZA</h6>
                <a href="{{ url('pizza-create') }}">เพิ่ม pizza</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">รูปภาพ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $da)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $da->name }}</td>
                                    <td>{{ number_format($da->price) }}</td>
                                    <td>{{ $da->description }}</td>
                                    <td>{{ $da->image }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
