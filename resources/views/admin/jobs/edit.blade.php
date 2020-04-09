@extends('main')
@section('title',isset($data) ? 'Chỉnh sửa thông tin công việc' :'Thêm công việc mới')
@section('job_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">{{isset($data) ? 'Chỉnh sửa thông tin công việc' :'Thêm công việc mới'}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{isset($data) ?route('adpostEditJob', ['id' => $data->id]): route('adpostAddJob')}}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tiêu đề việc làm
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="title" name="title" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->title : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mô tả ngắn
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="short_description" name="short_description" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->short_description : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mô tả đầy đủ
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="description" name="description">{{isset($data) ? $data->description : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lương tối thiểu
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="number" id="salary_from" name="salary_from" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->salary_from : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lương tối đa
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="number" id="salary_to" name="salary_to" data-required="1" class="form-control" required="" value="{{isset($data) ? $data->salary_to : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Loại hình công việc
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                    <label class="mt-radio">
                                        <input type="radio" name="type" value="0" @if(isset($data) && $data->job_type = 0) checked @endif> Full-time
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="type" value="1" @if(isset($data) && $data->job_type = 1) checked @endif> Part-time
                                        <span></span>
                                    </label>
                                </div>
                                <div id="form_2_membership_error"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Chọn công ty
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                @php $companies = \App\Models\Company::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="company" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn công ty...</option>
                                    @if(isset($data))
                                    @foreach($companies as $key => $value)
                                    <option value="{{$value->id}}" @if($data->company_id == $value->id) selected @endif>{{$value->name}}</option>
                                    @endforeach
                                    @else
                                    @foreach($companies as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Chọn ngành nghề
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                @php $list = \App\Models\Career::get() @endphp
                                <select class="form-control select2me select2-hidden-accessible" name="career" tabindex="-1" aria-hidden="true">
                                    <option value="0">Chọn ngành nghề...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if($data->career_id == $value->id) selected @endif>{{$value->name}}</option>
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
                            <label class="control-label col-md-3">Hạn nộp hồ sơ
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8 input-group date date-picker" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control" name="end_date" readonly aria-required="true" aria-invalid="false" aria-describedby="datepicker-error" value="{{isset($data) ? $data->end_date :''}}">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Quyền lợi
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="benefit" name="benefits">{{isset($data) ? $data->benefits : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Yêu cầu công việc
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="requirement" name="requirements">{{isset($data) ? $data->requirements : ''}}</textarea>
                            </div>
                        </div>
                        @if(isset($data))
                        @php $pinneds = \App\Models\JobPinned::select('user_id')->where('job_id', $data->id)->get()
                        @endphp
                        <div class="form-group">
                            <label class="control-label col-md-3">Gán người dùng
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                @php $list = \App\Models\Account::get() @endphp
                                <select multiple class="form-control select2me select2-hidden-accessible" name="user_pinned[]" tabindex="-1" aria-hidden="true">
                                    <option value="0">Gán người dùng...</option>
                                    @if(isset($data))
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}" @if( \App\Models\Account::checkInArray($pinneds,$value->id)) selected @endif>{{$value->name}}</option>
                                    @endforeach
                                    @else
                                    @foreach($list as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3">Hình cover
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="file" class="custom-file-input" id="form-avatar" name="cover">
                                <label class="custom-file-label" for="form-avatar">@if(isset($data) && $data->cover != "")
                                    {{substr($data->cover,0,strpos($data->cover,'?'))}} @else Chọn hình
                                    @endif </label>
                                <img id="file-show" @if(isset($data) && $data->cover != "")
                                src="{{asset('public/admins/img/jobs/' .$data->cover)}}" @else class="hidden" @endif >
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
