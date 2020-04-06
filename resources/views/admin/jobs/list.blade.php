@extends('main')
@section('title', 'Danh sách việc làm')
@section('job_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="note note-success">
            <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
        </div>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách việc làm </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th width="5%"> ID </th>
                            <th> Tiêu đề </th>
                            <th width="5%"> Sửa</th>
                            <th width="5%"> Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td> JOB0{{$item->id}}</td>
                            <td> {{$item->title}} </td>
                            <td>
                                <a class="btn delete-btn" href="{{route('adgetEditJob', ['id' => $item->id])}}"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a class="btn delete-btn" href="{{route('adgetDelJob', ['id' => $item->id])}}" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?');">
                                    <i class="icon icon-close"></i>
                                </a>
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
