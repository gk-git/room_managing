@extends('admin.messenger.template')

@section('title', 'رسالة جديدة')

@section('messenger-content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['admin.messenger.store'], 'method' => 'POST', 'novalidate', 'class' => 'stepperForm validate']) !!}

            @include('admin.messenger.form-partials.fields')

            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
