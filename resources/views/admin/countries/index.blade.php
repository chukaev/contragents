{{--@extends('admin.layouts.index')--}}

{{--@section('content')--}}
    {{--<!-- Content Wrapper. Contains page content -->--}}
    {{--<div class="content-wrapper">--}}
        {{--<!-- Content Header (Page header) -->--}}
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Страны--}}
                {{--<small>Страны</small>--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Главная </a></li>--}}
                {{--<li><a href="#">Tables</a></li>--}}
                {{--<li class="active">Data tables</li>--}}
            {{--</ol>--}}
        {{--</section>--}}


        {{--<section class="content-header">--}}
            {{--<div class="box">--}}
                {{--<div class="box-header">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-1">--}}
                            {{--<td>--}}
                                {{--<a href="{{ route('admin_country_create') }}">--}}
                                    {{--<button type="button" class="btn btn-block btn-success">Добавить</button>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

        {{--<!-- Main content -->--}}
            {{--<section class="content">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xs-12">--}}

                        {{--<div class="box">--}}
                            {{--<div class="box-header">--}}
                                {{--<h3 class="box-title">Страны</h3>--}}
                            {{--</div>--}}
                            {{--<!-- /.box-header -->--}}
                            {{--<div class="box-body">--}}
                                {{--<table id="example1" class="table table-bordered table-striped">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th><a data-name="name" class="sortable-column"> Название <i class="fa fa-fw fa-sort"></i> </a>  </th>--}}
                                        {{--<th> <a data-name="status" class="sortable-column"> Статус <i class="fa fa-fw fa-sort"></i> </a> </th>--}}
                                        {{--<th> <a data-name="created_at" class="sortable-column"> Дата создания <i class="fa fa-fw fa-sort"></i> </a> </th>--}}
                                        {{--<th> <a data-name="updated_at" class="sortable-column"> Дата изменения <i class="fa fa-fw fa-sort"></i> </a> </th>--}}
                                        {{--<th>Действия</th>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="w0-filters" class="filters">--}}
                                        {{--<td><input id="name" type="text" class="form-control filter" name="name"></td>--}}
                                        {{--<td>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<select id="status" class="form-control filter">--}}
                                                    {{--<option value="all">Все</option>--}}
                                                    {{--@foreach (\App\Enums\Statuses::statuses() as $key => $value)--}}
                                                        {{--<option value="{{ $key }}">{{$value}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div></td>--}}
                                        {{--<td>--}}
                                            {{--<!-- Date range picker created_at-->--}}
                                            {{--<div class="form-group">--}}

                                                {{--<div class="input-group">--}}
                                                    {{--<div class="input-group-addon">--}}
                                                        {{--<i class="fa fa-calendar"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<input data-date-format="yyyy-mm-dd" type="text" class="form-control pull-right date-range filter" id="created_at">--}}
                                                {{--</div>--}}
                                                {{--<!-- /.input group -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /.form group -->--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<!-- Date range picker, updated_at -->--}}
                                            {{--<div class="form-group">--}}

                                                {{--<div class="input-group">--}}
                                                    {{--<div class="input-group-addon">--}}
                                                        {{--<i class="fa fa-calendar"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<input data-date-format="yyyy-mm-dd" type="text" class="form-control pull-right date-range filter" id="updated_at">--}}
                                                {{--</div>--}}
                                                {{--<!-- /.input group -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /.form group --></td>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}

                                    {{--<tbody class="table-rows">--}}
                                        {{--@include('admin.partials.countries')--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                            {{--<!-- /.box-body -->--}}
                        {{--</div>--}}
                        {{--<!-- /.box -->--}}
                    {{--</div>--}}
                    {{--<!-- /.col -->--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}

                {{--@include('admin.partials.modals')--}}

            {{--</section>--}}
        {{--<!-- /.content -->--}}
    {{--</div>--}}
{{--@endsection--}}