@extends('main')
@section('title', isset($data) ? 'Chỉnh sửa thông tin công ty' :'Thêm công ty mới')
@section('company_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">{{ isset($data) ? 'Chỉnh sửa thông tin công ty' :'Thêm công ty mới'}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{isset($data) ? route('adpostEditCompany', ['id' => $data->id]) : route('adpostAddCompany')}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tên công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="title" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->name : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Địa chỉ công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="address" name="address" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->address :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Điện thoại công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="phone" name="phone" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->phone :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="email" id="email" name="email" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->email :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Chọn tỉnh thành
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                @php $list = \App\Models\Province::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="province" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn tỉnh thành...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if($data->province_id == $value->id) selected @endif>{{$value->name}}</option>
                                    @endforeach
                                    @else
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Quy mô công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                @php $list = \App\Models\CompanySize::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="size" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn quy mô...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if($data->company_size == $value->id) selected @endif>{{$value->size}}</option>
                                    @endforeach
                                    @else
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}">{{$value->size}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Logo công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" class="custom-file-input" id="form-avatar" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if(isset($data) && $data->logo != "")
                                    {{substr($data->logo,0,strpos($data->logo,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if(isset($data) && $data->logo != "")
                                src="{{asset('public/admins/img/companies/' .$data->logo)}}" @else class="hidden" @endif >
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">{{isset($data) ? 'Chỉnh sửa' : 'Thêm mới'}}</button>
                                </div>
                            </div>
                        </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>
@endsection
