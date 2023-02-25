@extends('site.layout.master')
@section('content')

    <section class="py-5 p-3 main-server-section border-bottom px-3">
        <p class="tilte mb-0">اختر الدولة</p>
        <p class="sub-title">&nbsp;الدول المتاحة:</p>

        <div class="row justify-content-around">
            @foreach($countries as $country)
            <div class="col col-md-4 col-sm-6">
                <a href="{{route('apps',['server'=>$server,'country'=>$country['id']])}}">
                <div class="d-flex flex-column align-items-center flags-div h-100 ps-4"><img class="flags img-fluid h-50" src="{{$country['img']}}">
                    <p class="text-center">{{$country['name']}}</p>
                </div>
                </a>
            </div>
                @endforeach


        </div>
    </section>
@endsection
