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
                {{--<li><a href="#">Страны</a></li>--}}
                {{--<li class="active">Редактирование</li>--}}
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
                    {{--<form role="form" method="post" action="{{ route('admin_country_update') }}">--}}

                    {{--{{ csrf_field() }}--}}

                        {{--<input name="id" type="hidden" value="{{ $editItem->id }}">--}}
                    {{--<!-- text input -->--}}
                        {{--<div class="form-group @if($errors->has('name')) has-error @endif">--}}
                            {{--<label class="control-label" for="inputError">--}}
                                {{--@if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif--}}
                                    {{--Name--}}
                            {{--</label>--}}

                            {{--<input name="name" type="text" class="form-control" value="{{ $editItem->name }}"--}}
                                   {{--placeholder="Название товара ..." autocomplete="off">--}}

                            {{--@if($errors->has('name'))--}}
                                {{--<span class="help-block">{{ $errors->first('name') }}</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<!-- checkbox -->--}}
                        {{--<div class="form-group @if($errors->has('status')) has-error @endif">--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input name="status" type="checkbox"--}}
                                           {{--@if($editItem->status == \App\Enums\Statuses::ACTIVE) checked value="on" @endif>--}}

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
                                        {{--<button type="submit" class="btn btn-block btn-success">Сохранить</button>--}}
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