{{--@extends('admin.layouts.index')--}}

{{--@section('content')--}}
    {{--<!-- Content Wrapper. Contains page content -->--}}
    {{--<div class="content-wrapper">--}}
        {{--<!-- Content Header (Page header) -->--}}
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--<a href="{{ route('admin_countries_all') }}"> Страны </a>--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Главная </a></li>--}}
                {{--<li><a href="#">Tables</a></li>--}}
                {{--<li class="active">Data tables</li>--}}
            {{--</ol>--}}
        {{--</section>--}}

        {{--<!-- Main content -->--}}
        {{--<section class="content">--}}
            {{--<div class="box box-warning">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<h3 class="box-title">Создание страны</h3>--}}
                {{--</div>--}}
                {{--<!-- /.box-header -->--}}
                {{--<div class="box-body">--}}
                    {{--<form role="form" method="post" action="{{ route('admin_country_store') }}">--}}

                    {{--{{ csrf_field() }}--}}
                    {{--<!-- text input -->--}}
                        {{--<div class="form-group @if($errors->has('name')) has-error @endif">--}}
                            {{--<label class="control-label" for="inputError">--}}
                                {{--@if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif--}}
                                    {{--Название--}}
                            {{--</label>--}}

                            {{--<input name="name" type="text" class="form-control"--}}
                                   {{--placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">--}}

                            {{--@if($errors->has('name'))--}}
                                {{--<span class="help-block">{{ $errors->first('name') }}</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<!-- checkbox -->--}}
                        {{--<div class="form-group @if($errors->has('status')) has-error @endif">--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input name="status" type="checkbox" checked value="1"  @end>--}}

                                    {{--@if($errors->has('status')) <i class="fa fa-times-circle-o"></i> @endif--}}
                                    {{--<b> Активно </b>--}}
                                {{--</label>--}}

                                {{--@if($errors->has('status'))--}}
                                    {{--<span class="help-block">{{ $errors->first('status') }}</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-xs-1">--}}
                                {{--<td>--}}
                                    {{--<a href="{{ route('admin_country_create') }}">--}}
                                        {{--<button type="submit" class="btn btn-block btn-success">Добавить</button>--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</form>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<!-- /.content -->--}}
    {{--</div>--}}
{{--@endsection--}}