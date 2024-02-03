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
                                    <td>
                                        <img id="myImg{{ $da->id }}" class="cursor"
                                            src="{{ URL::asset('/assets/img/pizza/' . $da->image) }}"
                                            onclick="showImage(this,{{ $da->id }})" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" height="90px" width="80px" alt="...">
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <img id="img1" width="100%">
            </div>
        </div>
    </div>
    <script>
        function showImage(element, i) {
            var modal = document.getElementById('myModal');
            var img = document.getElementById('myImg' + i).src;
            console.log("img", img);
            document.getElementById('img1').src = img;
        }
    </script>
@endsection
