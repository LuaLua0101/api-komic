@extends('main')
@section('title', 'Thông tin chi tiết tỉnh thành')
@section('province_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Thông tin chi tiết tỉnh thành</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" enctype='multipart/form-data'>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tên tỉnh
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="title" data-required="1" class="form-control" required="" value="{{$data->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cấp hành chính
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="title" data-required="1" class="form-control" required="" value="{{$data->type}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th width="5%"> ID </th>
                            <th> Tên quận huyện </th>
                            <th> Cấp hành chính </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['district'] as $item)
                        <tr>
                            <td> Dis0{{$item->id}}</td>
                            <td> {{$item->name}} </td>
                            <td> {{$item->type}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>
@endsection
