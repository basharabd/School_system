@extends('layouts.master')
@section('css')
@toastr_css


@section('title')
{{ trans('classroom.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('classroom.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

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
                    {{ trans('classroom.add_class') }}
                </button>

                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('classroom.delete_checkbox') }}
                </button>


                <br><br>

                <form action="{{ route('Filter_Classes') }}" method="POST">
                    @csrf
                    <select class="selectpicker" data-style="btn-info" name="grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('classroom.Search_By_Grade') }}</option>
                        @foreach ($Grades as $Grade)
                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                        @endforeach
                    </select>
                </form>



                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ trans('classroom.Name_class_en') }}</th>
                                <th>{{ trans('classroom.Name_Grade') }}</th>
                                <th>{{ trans('classroom.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (isset($details))

                            <?php $List_Classes = $details; ?>
                            @else

                            <?php $List_Classes = $classes; ?>
                            @endif

                            <?php $i = 0; ?>

                            @foreach ($List_Classes as $class)
                            <tr>
                                <?php $i++; ?>
                                <td><input type="checkbox" value="{{ $class->id }}" class="box1"></td>
                                <td>{{ $i }}</td>
                                <td>{{ $class->class_name }}</td>
                                <td>{{ $class->grades->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $class->id }}" title="{{ trans('grade.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $class->id }}" title="{{ trans('grade.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Class -->
                            <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classroom.edit_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('classrooms.update' , 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('classroom.Name_class') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name" class="form-control"
                                                            value="{{ $class->getTranslation('class_name', 'ar') }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en" class="mr-sm-2">{{
                                                            trans('classroom.Name_class_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $class->getTranslation('class_name', 'en') }}"
                                                            name="name_en" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{
                                                        trans('classroom.Name_Grade') }}
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                        id="exampleFormControlSelect1" name="grade_id">
                                                        <option value="{{ $class->grades->id }}">
                                                            {{ $class->grades->name }}
                                                        </option>
                                                        @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">
                                                            {{ $Grade->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

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


                            <!-- delete_modal_class -->
                            <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classroom.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classrooms.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('classroom.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $class->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('classroom.Close')
                                                        }}</button>
                                                    <button type="submit" class="btn btn-danger">{{
                                                        trans('classroom.submit') }}</button>
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


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classroom.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">
                                                    {{trans('classroom.Name_class')}}:</label>


                                                <input class="form-control" type="text" name="class_name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{
                                                    trans('classroom.Name_class_en') }}:</label>

                                                <input class="form-control" type="text" name="name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{
                                                    trans('classroom.Name_Grade') }}:</label>


                                                <div class="box">
                                                    <select class="fancyselect" name="grade_id">
                                                        @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">{{
                                                    trans('classroom.Processes') }} :</label>

                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('classroom.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('classroom.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                        trans('grade.Close') }}</button>
                                    <button type="submit" class="btn btn-success">{{ trans('grade.submit')
                                        }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
</div>



<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classroom.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{ trans('classroom.Warning_Grade') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                        trans('classroom.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('classroom.submit') }}</button>
                </div>
            </form>
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

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>




@endsection