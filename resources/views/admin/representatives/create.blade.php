@extends('admin.layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="{{ route('admin_representatives_all') }}"> Представители </a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Главная </a></li>
                {{--<li><a href="#">Tables</a></li>--}}
                {{--<li class="active">Data tables</li>--}}
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Создание страны</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="post" action="{{ route('admin_representative_store') }}">

                    {{ csrf_field() }}
                    <!-- text input -->
                        <div class="form-group @if($errors->has('first_name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('first_name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Фамилия представителя
                            </label>

                            <input name="first_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('first_name') }}" autocomplete="off">

                            @if($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Имя представителя
                            </label>

                            <input name="last_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Отчество представителя
                            </label>

                            <input name="middle_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                Фамилия подписанта
                            </label>

                            <input name="signer_last_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Серия и номер паспорта представителя
                            </label>

                            <input name="passport" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Имя подписанта
                            </label>

                            <input name="signer_first_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Отчество подписанта
                            </label>

                            <input name="signer_middle_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Компания полное название
                            </label>

                            <input name="company_full_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Компания краткое название
                            </label>

                            <input name="company_brief_name" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    ИНН
                            </label>

                            <input name="inn" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    КПП
                            </label>

                            <input name="kpp" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    ОГРН
                            </label>

                            <input name="ogrn" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label" for="inputError">
                                @if($errors->has('name')) <i class="fa fa-times-circle-o"></i> @endif
                                    Тип (ЮЛ, ИП, ФЛ)
                            </label>

                            <input name="type" type="text" class="form-control"
                                   placeholder="Название товара ..." value="{{ old('name') }}" autocomplete="off">

                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-1">
                                <td>
                                    <a href="{{ route('admin_representative_create') }}">
                                        <button type="submit" class="btn btn-block btn-success">Добавить</button>
                                    </a>
                                </td>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection