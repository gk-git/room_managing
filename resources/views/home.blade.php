@extends('layouts.app')
@section('title')
<title>Kashta Camp</title>
@endsection
@section('head')

    <link type="text/css" rel="stylesheet" href="{{  url('event/media/layout.css')}}"/>
    <script src="{{ url('event/js/daypilot/daypilot-all.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('event/js/alert.js')}}" type="text/javascript"></script>

    <style type="text/css">
        .icon {
            font-size: 14px;
            text-align: center;
            line-height: 14px;
            vertical-align: middle;

            cursor: pointer;
        }

        .scheduler_default_rowheader_inner {
            border-right: 1px solid #ccc;
        }

        .scheduler_default_rowheadercol2 {
            background: White;
        }

        .scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner {
            top: 2px;
            bottom: 2px;
            left: 2px;
            background-color: transparent;
            border-left: 5px solid #1a9d13; /* green */
            border-right: 0px none;
        }

        .status_dirty.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner {
            border-left: 5px solid #ea3624; /* red */
        }

        .status_cleanup.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner {
            border-left: 5px solid #f9ba25; /* orange */
        }
        .scheduler_default_event .scheduler_default_event_bar .scheduler_default_event_bar_inner{
            width: 100% !important;
        }
    </style>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')

                    <div id="header">
                        <div class="bg-help">
                            <div class="inBox">

                                <hr class="hidden"/>
                            </div>
                        </div>
                    </div>
                    <div class="shadow"></div>
                    <div class="hideSkipLink">
                    </div>
                    <div class="div">
                            <h3 class="page-title">@lang('quickadmin.customers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.customers.store']]) !!}

<input type="hidden" name="homer_redirect" value='true'/>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.customers.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'اسم الزبون', 'required' => '']) !!}
                    <p class="help-block">اسم الزبون</p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone', trans('quickadmin.customers.fields.phone').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'رقم هاتف العميل', 'required' => '']) !!}
                    <p class="help-block">رقم هاتف العميل</p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

                    </div>
                    <div class="main">

                        <div style="width:160px; float:left;">
                            <div id="nav"></div>
                        </div>

                        <div style="margin-left: 160px;">

                            <div class="space">
                               عرض الخيام:
                                <input type="text" name="rooms" id='filter' placeholder='أدخل رقم الخيمه لإجراء التصفية'/>

                                <div class="space">
                                    النطاق الزمني:
                                    <select id="timerange">
                                        <option value="week" selected>أسبوع</option>
                                        <option value="month" >شهر</option>
                                    </select>
                                    <label for="autocellwidth"><input type="checkbox" id="autocellwidth" selected>Auto table Cell width</label>
                                </div>
                            </div>
                            <div id="dp"></div>
                            <div class="space">
                                <a href="#" id="add-room">اضافه خيمه</a>
                            </div>

                        </div>


                    </div>
                    <div class="clear">
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('end_body')

    <script type="text/javascript">
        var nav = new DayPilot.Navigator("nav");
        nav.selectMode = "week";
        nav.showMonths = 3;
        nav.skipMonths = 3;
        nav.onTimeRangeSelected = function (args) {
            loadTimeline(args.start);
            loadEvents();
        };

        nav.init();

        $("#timerange").change(function () {
            switch (this.value) {
                case "week":
                    dp.days = 7;
                    nav.selectMode = "Week";
                    nav.select(nav.selectionDay);
                    break;
                case "month":
                    dp.days = dp.startDate.daysInMonth();
                    nav.selectMode = "Month";
                    nav.select(nav.selectionDay);
                    break;
            }
        });

        $("#autocellwidth").click(function () {
            dp.cellWidth = 40;  // reset for "Fixed" mode
            dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
            dp.update();
        });

        $("#add-room").click(function (ev) {
            ev.preventDefault();
            var modal = new DayPilot.Modal();
            modal.onClosed = function (args) {
                loadResources();
            };
            modal.showUrl("{{  url('admin/room_add')}}");
        });
    </script>

    <script>
        var dp = new DayPilot.Scheduler("dp");
        dp.allowEventOverlap = false;


        dp.scale = "Day";
        //dp.startDate = new DayPilot.Date().firstDayOfMonth();
        dp.days = 7;
        loadTimeline(DayPilot.Date.today());
        dp.cellWidthSpec = "Auto";
        dp.eventDeleteHandling = "Update";

        dp.timeHeaders = [
            {groupBy: "Month", format: "MMMM yyyy"},
            {groupBy: "Day", format: "d"}
        ];
         dp.heightSpec = "Max";
  dp.height = 350;

        dp.eventHeight = 50;
        dp.bubble = new DayPilot.Bubble({});

        dp.rowHeaderColumns = [
            {title: "خيمه", width: 80},
            {title: "السعة", width: 80},
            {title: "الحجم", width: 80}
        ];

        dp.onBeforeResHeaderRender = function (args) {
            var beds = function (count) {
                return count + " " + (count > 1 ? "s" : "");
            };

            args.resource.columns[0].html = beds(args.resource.capacity);
            args.resource.columns[1].html = args.resource.size;
            switch (args.resource.status) {
                case "Dirty":
                    args.resource.cssClass = "status_dirty";
                    break;
                case "Cleanup":
                    args.resource.cssClass = "status_cleanup";
                    break;
            }

            args.resource.areas = [{
                top: 3,
                right: 4,
                height: 14,
                width: 14,
                action: "JavaScript",
                js: function (r) {
                    var modal = new DayPilot.Modal();
                    modal.onClosed = function (args) {
                        loadResources();
                    };
                    modal.showUrl("/admin/room_edit/" + r.id);
                },
                v: "Hover",
                css: "icon icon-edit",
            }];
        };

        // http://api.daypilot.org/daypilot-scheduler-oneventmoved/
        dp.onEventMoved = function (args) {
            var data =  {
                    id: args.e.id(),
                    newStart: args.newStart.toString('yyyy-MM-dd HH:mm:ss'),
                    newEnd: args.newEnd.toString('yyyy-MM-dd HH:mm:ss'),
                    newResource: args.newResource
                };
              
            $.post("{{  url('api/v1/reservations_move')}}",
               data,
                function (data) {
                    dp.message(data.message);
                });
        };

        // http://api.daypilot.org/daypilot-scheduler-oneventresized/
        dp.onEventResized = function (args) {
           var data = {
                    id: args.e.id(),
                    newStart: args.newStart.toString('yyyy-MM-dd HH:mm:ss'),
                    newEnd: args.newEnd.toString('yyyy-MM-dd HH:mm:ss')
                };
            
            $.post("{{  url('api/v1/reservations_resize')}}",
                data,
                function () {
                    dp.message("Resized.");
                });
        };

        dp.onEventDeleted = function (args) {
            $.post("{{  url('api/v1/reservations_delete')}}",
                {
                    id: args.e.id()
                },
                function () {
                    dp.message("Deleted.");
                });
        };

        // event creating
        // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
        dp.onTimeRangeSelected = function (args) {
            //var name = prompt("New event name:", "Event");
            //if (!name) return;

            var modal = new DayPilot.Modal();
            modal.closed = function () {
                dp.clearSelection();

                // reload all events
                var data = this.result;
                if (data && data.result === "OK") {
                    loadEvents();
                }
            };
    
            modal.showUrl('/admin/event_add/' + args.start.toString('yyyy-MM-dd HH:mm:ss') + '/' + args.end.toString('yyyy-MM-dd HH:mm:ss') + '/' + args.resource);

        };

        dp.onEventClick = function (args) {
            var modal = new DayPilot.Modal();
            modal.closed = function () {
                // reload all events
                var data = this.result;
                if (data && data.result === "OK") {
                    loadEvents();
                }
            };
             modal.showUrl("/admin/event_edit/" + args.e.id());
        };

        dp.onBeforeCellRender = function (args) {
            var dayOfWeek = args.cell.start.getDayOfWeek();
            if (dayOfWeek === 6 || dayOfWeek === 0) {
                args.cell.backColor = "#f8f8f8";
            }
        };

        dp.onBeforeEventRender = function (args) {
              args.e.toolTip = '';
            var start = new DayPilot.Date(args.e.start);
            var end = new DayPilot.Date(args.e.end);

            var today = DayPilot.Date.today();
            var now = new DayPilot.Date();

            args.e.html = args.e.text + " (" + start.toString("M/d/yyyy") + " - " + end.toString("M/d/yyyy") + ")";

         

            args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";

            var paid = args.e.paid;
            var paidColor = "#e8e843";
      args.e.barColor = 'orange';   
if(paid){
    paid= 100;
    paidColor = "#ff000";
     args.e.barColor = 'red';
}
            args.e.areas = [
                {
                    bottom: 10,
                    right: 4,
                    html: "<div style='color:" + paidColor + "; font-size: 8pt;'>Paid: " + paid + "%</div>",
                    v: "Visible"
                },
                {
                    left: 4,
                    bottom: 8,
                    right: 4,
                    height: 2,
                    html: "<div style='background-color:" + paidColor + "; height: 100%; width:" + paid + "%'></div>",
                    v: "Visible"
                }
            ];

        };
        dp.onBeforeCellRender = function (args) {
            if (args.cell.start <= DayPilot.Date.today() && DayPilot.Date.today() < args.cell.end) {
                args.cell.backColor = "#ffcccc";
            }
        };


        dp.init();

        setInterval(()=>{
            console.log('End');
            loadResources();
                loadEvents();
        }, 5000 )
        loadResources();
        loadEvents();

        function loadTimeline(date) {
            dp.scale = "Manual";

            dp.timeline = [];
            var start = date.getDatePart();
//            var start  = DayPilot.Date.today()
//            dp.startDate = DayPilot.Date.today()


            for (var i = 0; i < dp.days; i++) {
                dp.timeline.push({start: start.addDays(i), end: start.addDays(i + 1)});
            }

            dp.update();
        }

        function loadEvents() {
            var start = dp.visibleStart();
            var end = dp.visibleEnd();
            var data = {
                start: start.toString('yyyy-MM-dd HH:mm:ss'),
                end: end.toString('yyyy-MM-dd HH:mm:ss')
            }
           
            $.post("{{  url('api/v1/reservations_get')}}",
                data,
                function (data) {
                    dp.events.list = data;
                    dp.update();
                }
            );
        }

        function loadResources() {
            $.post("{{  url('api/v1/rooms_get')}}",
                {room_number: $("#filter").val()},
                function (data) {
                    dp.resources = data;
                    dp.update();
                });
        }

        $(document).ready(function () {
            $("#filter").change(function () {
                loadResources();
            });
        });

    </script>
       

@endsection
