@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.List_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.List_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('Students_trans.Back_all')}}
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_Grade')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_Year')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_Class')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_Section')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.New_Grade')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.New_Year')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.New_Class')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.New_Section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->class_name}}</td>
                                                <td>{{$promotion->f_section->section_name}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->class_name}}</td>
                                                <td>{{$promotion->t_section->section_name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب</button>
                                                    {{-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">تخرج الطالب</button> --}}
                                                </td>
                                            </tr>
                                   @include('dashboard.Students.promotion.delete_all')
                                   @include('dashboard.Students.promotion.delete_one')

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection