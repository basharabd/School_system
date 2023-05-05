{{-- @extends('layouts.master')
@section('css')

@section('title')
{{trans('side_trans.Grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('side_trans.Grades')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('side_trans.Home')}}</a></li>
                <li class="breadcrumb-item active"> {{trans('side_trans.Grades')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    @if ($errors->any())
    <div class="error">{{ $errors->first('name') }}</div>
    @endif



    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('grade.Add Grade') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('grade.Name Grade') }}</th>
                                <th>{{ trans('grade.Note Grade') }}</th>
                                <th>{{ trans('grade.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Grades as $Grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Grade->name }}</td>
                                <td>{{ $Grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Grade->id }}" title="#"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Grade->id }}" title="#"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>


                            <!-- add_modal_Grade -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.Add Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <!-- add_form -->
                                            <form action="{{route('grads.store')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('grade.stage_name_ar') }}
                                                        </label>
                                                        <input id="Name" type="text" name="name" class="form-control">


                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{
                                                            trans('grade.stage_name_en') }}
                                                        </label>
                                                        <input type="text" class="form-control" name="name_en">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{
                                                        trans('grade.Note Grade') }}
                                                    </label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <br><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                                trans('grade.Close') }}</button>
                                            <button type="submit" class="btn btn-success">{{
                                                trans('grade.submit') }}</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="#" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('grade.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name" class="form-control"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{
                                                            trans('grade.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{
                                                        trans('grade.Note Grade') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $Grade->Notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{
                                                        trans('grade.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('grade.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{
                                                        trans('grade.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection --}}



@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('side_trans.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('side_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    @if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
    @endif



    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('grade.Add Grade') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('grade.Name Grade') }}</th>
                                <th>{{ trans('grade.Note Grade') }}</th>
                                <th>{{ trans('grade.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Grades as $Grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Grade->name }}</td>
                                <td>{{ $Grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Grade->id }}" title="{{ trans('grade.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Grade->id }}" title="{{ trans('grade.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>




                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('grads.update' , 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('grade.stage_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name" class="form-control"
                                                            value="{{ $Grade->getTranslation('name', 'ar') }}" required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en" class="mr-sm-2">{{
                                                            trans('grade.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $Grade->getTranslation('name', 'en') }}"
                                                            name="name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{
                                                        trans('grade.Note Grade') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $Grade->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{
                                                        trans('grade.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('grads.destroy' , $Grade->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('grade.Warning_Grade') }}

                                                <input id="name" type="text" name="name" class="form-control"
                                                    value="{{ $Grade->getTranslation('name', 'ar') }}" disabled>
                                              
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{
                                                        trans('grade.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @endforeach

                            <!-- add_modal_Grade -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade.Add Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('grads.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name" class="mr-sm-2">{{
                                                            trans('grade.stage_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{
                                                            trans('grade.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="name_en">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('grade.Note Grade') }}
                                                        
                                                        :</label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <br><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                                trans('grade.Close')
                                                }}</button>
                                            <button type="submit" class="btn btn-success">{{ trans('grade.submit')
                                                }}</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                    </table>
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