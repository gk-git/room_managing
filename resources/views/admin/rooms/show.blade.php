@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.rooms.fields.name')</th>
                            <td field-key='name'>{{ $room->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.rooms.fields.size')</th>
                            <td field-key='size'>{{ $room->size }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#reservations" aria-controls="reservations" role="tab" data-toggle="tab">Reservations</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="reservations">
<table class="table table-bordered table-striped {{ count($reservations) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.reservations.fields.name')</th>
                        <th>@lang('quickadmin.reservations.fields.customer')</th>
                        <th>@lang('quickadmin.reservations.fields.room')</th>
                        <th>@lang('quickadmin.reservations.fields.start')</th>
                        <th>@lang('quickadmin.reservations.fields.end')</th>
                        <th>@lang('quickadmin.reservations.fields.paid')</th>
                        <th>@lang('quickadmin.reservations.fields.status')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($reservations) > 0)
            @foreach ($reservations as $reservation)
                <tr data-entry-id="{{ $reservation->id }}">
                    <td field-key='name'>{{ $reservation->name }}</td>
                                <td field-key='customer'>{{ $reservation->customer->name or '' }}</td>
                                <td field-key='room'>{{ $reservation->room->name or '' }}</td>
                                <td field-key='start'>{{ $reservation->start }}</td>
                                <td field-key='end'>{{ $reservation->end }}</td>
                                <td field-key='paid'>{{ Form::checkbox("paid", 1, $reservation->paid == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='status'>{{ $reservation->status }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('reservation_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservations.restore', $reservation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('reservation_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservations.perma_del', $reservation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('reservation_view')
                                    <a href="{{ route('admin.reservations.show',[$reservation->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('reservation_edit')
                                    <a href="{{ route('admin.reservations.edit',[$reservation->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('reservation_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservations.destroy', $reservation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.rooms.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
