@extends('main')
@section('title', 'Danh sách tỉnh thành')
@section('province_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách tỉnh thành </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th width="5%"> # </th>
                            <th width="5%"> ID </th>
                            <th> Tên tỉnh thành </th>
                            <th> Cấp hành chính </th>
                            <th width="5%"> Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> Province0{{$item->id}}</td>
                            <td> {{$item->name}} </td>
                            <td> {{$item->type}} </td>
                            <td>
                                <a class="btn delete-btn dt-button buttons-pdf buttons-html5  purple btn-outline" href="{{route('adgetDetailProvince', ['id' => $item->id])}}"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
