@extends('main')
@section('title', isset($data) ? 'Chỉnh sửa thông tin khóa học' :'Thêm khóa học mới')
@section('course_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">{{isset($data) ? 'Chỉnh sửa thông tin khóa học' :'Thêm khóa học mới'}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{isset($data) ?route('adpostEditCourse', ['id' => $data->id]): route('adpostAddCourse')}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tên khóa học
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" id="title" name="title" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->title : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mô tả ngắn
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" id="short_description" name="short_description" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->short_description : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mô tả đầy đủ
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <textarea id="description" name="description">{{isset($data) ? $data->description : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">URL
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" id="url" name="url" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->url : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Giá tiền
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="number" id="price" name="price" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->price : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Số lượng mua
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="number" id="buy" name="buy" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->buy_count : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lượt review
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="number" id="review" name="review" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->review_count : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Chọn giảng viên
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                @php $list = \App\Models\Author::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="author" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn giảng viên...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if($data->author_id == $value->id) selected @endif>{{$value->name}}</option>
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
                            <label class="control-label col-md-3">Chọn block hiển thị
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                @php $list = \App\Models\Block::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="block" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn block...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if($data->block_id == $value->id) selected @endif>{{$value->name}}</option>
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
                            <label class="control-label col-md-3">Hình cover
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="file" class="custom-file-input" id="form-avatar" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if(isset($data) &&$data->cover != "")
                                    {{substr($data->cover,0,strpos($data->cover,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if(isset($data) && $data->cover != "")
                                src="{{asset('public/admins/img/Courses/' .$data->cover)}}" @else class="hidden" @endif >
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
