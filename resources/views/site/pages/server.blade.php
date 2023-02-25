@extends('site.layout.master')
@section('content')

    <section class="py-5 p-3 main-server-section border-bottom px-3">
        <p class="tilte mb-0">اختر السيرفر</p>
        <p class="sub-title">عند اختيار السيرفر سوف تظهر لك الدول المتاحة</p>
        <div class="row justify-content-center align-self-center m-auto align-content-around">
            @foreach($servers as $server)
            <div class="col col-sm-6 col-md-4">

                <a href="{{route('country',['server'=>$server['id']])}}" class="server-btn position-relative">{{$server['name']}}</a></div>
@endforeach
        </div>
    </section>
    <section class="px-3 mt-5">
        <div class="table-responsive hall-table">
            <table class="table">
                <thead class="table-style">
                <tr class="table-style text-center">
                    <th class="table-cell-style">رقم الطلب</th>
                    <th class="table-cell-style">الدولة</th>
                    <th class="table-cell-style">رقم الهاتف</th>
                    <th class="table-cell-style">كود التفعيل</th>
                    <th>الحالة</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr class="table-row">
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                </tr>
                <tr class="table-row">
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                </tr>
                <tr class="table-row">
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                    <td class="table-cell-style">Cell 1</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
