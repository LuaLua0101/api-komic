@extends('main')
@section('title', isset($data) ? 'Chỉnh sửa thông tin người dùng' :'Thêm người dùng mới')
@section('user_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">{{isset($data) ? 'Chỉnh sửa thông tin người dùng' :'Thêm người dùng mới'}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{isset($data) ?route('adpostEditUser', ['id' => $data->id]): route('adpostAddUser')}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Họ tên
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="name" name="name" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->name : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                            </label>
                            <div class="col-md-4">
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox6" name="admin" class="md-check">
                                    <label for="checkbox6">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Quản trị viên </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Giới tính
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio14" name="gender" class="md-radiobtn">
                                        <label for="radio14">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nữ </label>
                                    </div>
                                    <div class="md-radio has-error">
                                        <input type="radio" id="radio15" name="gender" class="md-radiobtn" checked="">
                                        <label for="radio15">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nam </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Địa chỉ
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="address" name="address" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->address :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Điện thoại
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="phone" name="phone" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->phone :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="email" id="email" name="email" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->email :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Ngày sinh
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4 input-group date date-picker" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" name="dob" readonly aria-required="true" aria-invalid="false" aria-describedby="datepicker-error">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hình avatar
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" class="custom-file-input" id="form-cover" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if(isset($data) &&$data->avatar != "")
                                    {{substr($data->avatar,0,strpos($data->avatar,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if(isset($data) &&$data->avatar != "")
                                src="{{asset('public/admins/img/users/' .$data->avatar)}}" @else class="hidden" @endif >
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
