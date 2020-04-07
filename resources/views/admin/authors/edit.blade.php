@extends('main')
@section('title', 'Chỉnh sửa thông tin giảng viên')
@section('author_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Chỉnh sửa thông tin giảng viên</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{route('adpostEditAuthor', ['id' => $data->id])}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Họ tên
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="name" name="name" data-required="1" class="form-control" required="" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hình avatar
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" class="custom-file-input" id="form-cover" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if($data->avatar != "")
                                    {{substr($data->avatar,0,strpos($data->avatar,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if($data->avatar != "")
                                src="{{asset('public/admins/img/authors/' .$data->avatar)}}" @else class="hidden" @endif >
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Chỉnh sửa</button>
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
