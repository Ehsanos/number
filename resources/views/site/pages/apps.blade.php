@extends('site.layout.master')
@section('content')

    <section class="py-5 p-3 main-server-section border-bottom px-3">
        <p class="tilte ">التطبيقات المتاحة </p>
        <div class="row justify-content-around">
            <form action="{{route('pay')}}" method="post">
                @csrf
                <input type="hidden" name="serverapi" value="{{$server}}">
                <input type="hidden" name="country" value="{{$country}}">
                @foreach($apps as $app)
                    <div class="col col-md-4 col-sm-6">
                        <div class="d-flex flex-column align-items-center flags-div h-100 ps-4">
                            <label for="app{{$app['id']}}" class="">
                                <img class="flags img-fluid h-50" src="{{$app['img']}}">

                                <p class="text-center">{{$app['name']}}</p>
                            </label>
                            <input type="radio" id="app{{$app['id']}}" name="app" class="d-none" value="{{$app['id']}}">
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-sm btn-success btn-primary">pay</button>

            </form>


        </div>
    </section>
@endsection
@section('script')

    <script>
        $('label').click(function(){

            $('label').removeClass('border border-primary border-1');
            $(this).addClass('border border-primary border-1');
        });


    </script>
    @endsection
