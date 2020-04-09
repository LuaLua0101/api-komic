@extends('main')
@section('title', 'Danh sách ebook')
@section('testebook_active', 'open')
@section('content')
<div class="row">
    <div class="col-md-12">
        {{-- <div class="note note-success">
            <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
        </div> --}}
        @if(intval($data->sum) > 0)
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách ebook </div>
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
                            
                            <th> Tên ebook </th>
                            <th> Đường dẫn </th>
                            <th> Số lượt tải </th>
                            <th> Số lượt xem </th>
                            <th width="5%"> Sửa</th>
                            <th width="5%"> Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> {{$item->title}} </td>
                            <td> {{$item->url}} </td>
                            <td> {{$item->buy_count}} </td>
                            <td> {{$item->review_count}} </td>
                            <td>
                                <a class="btn delete-btn dt-button buttons-pdf buttons-html5  purple btn-outline" href="{{route('adgetEditEbook', ['id' => $item->id])}}"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a class="btn delete-btn dt-button buttons-pdf buttons-html5 red btn-outline" href="{{route('adgetDelEbook', ['id' => $item->id])}}" onclick="return confirm('Bạn có chắc chắn xóa ebook này?');">
                                    <i class="icon icon-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_extended" id="sample_2_paginate">
                            <div class="pagination-panel"> Trang <a href="{{route('adgetListEbook', ['page' => $data->prev]). '?query='. request()->query('query')}}" class="btn btn-sm default prev @if($data->page == 1) disabled @endif">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <input type="text" class="pagination-panel-input form-control input-sm input-inline input-mini" maxlenght="5" style="text-align:center; margin: 0 5px;" value={{$data->page}}>
                                <a href="{{route('adgetListEbook', ['page' => $data->next]) . '?query='. request()->query('query')}}" class="btn btn-sm default next @if($data->page == $data->sum) disabled @endif">
                                    <i class="fa fa-angle-right"></i>
                                </a> / <span class="pagination-panel-total">{{$data->sum}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
        @else
        @include('admin.components.empty_table')
        @endif
    </div>
</div>
@endsection
