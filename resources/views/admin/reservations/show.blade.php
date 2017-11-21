@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.name')</th>
                            <td field-key='name'>{{ $reservation->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.customer')</th>
                            <td field-key='customer'>{{ $reservation->customer->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.room')</th>
                            <td field-key='room'>{{ $reservation->room->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.start')</th>
                            <td field-key='start'>{{ $reservation->start }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.end')</th>
                            <td field-key='end'>{{ $reservation->end }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.paid')</th>
                            <td field-key='paid'>{{ Form::checkbox("paid", 1, $reservation->paid == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservations.fields.status')</th>
                            <td field-key='status'>{{ $reservation->status }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.reservations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
