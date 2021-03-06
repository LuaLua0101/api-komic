@extends('main')
@section('title', isset($data) ? 'Chỉnh sửa thông tin giảng viên' :'Thêm giảng viên mới')
@section('author_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">{{isset($data) ? 'Chỉnh sửa thông tin giảng viên' :'Thêm giảng viên mới'}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{isset($data) ?route('adpostEditAuthor', ['id' => $data->id]): route('adpostAddAuthor')}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
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
                            <label class="control-label col-md-3">Giới tính
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                    <label class="mt-radio">
                                        <input type="radio" name="gender" value="0" @if(isset($data) && $data->gender = 0) checked @endif> Nữ
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="gender" value="1" @if(isset($data) && $data->gender = 1) checked @endif> Nam
                                        <span></span>
                                    </label>
                                </div>
                                <div id="form_2_membership_error"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Điện thoại
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="phone" name="phone" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->phone :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="email" id="email" name="email" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->email :''}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hình avatar
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" class="custom-file-input" id="form-cover" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if(isset($data) && $data->avatar != "")
                                    {{substr($data->avatar,0,strpos($data->avatar,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if(isset($data) && $data->avatar != "")
                                src="{{asset('public/admins/img/authors/' .$data->avatar)}}" @else class="hidden" @endif
                                >
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
