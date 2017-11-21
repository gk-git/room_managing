@extends('layouts.app')
@section('head')
    <link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}"/>
    <script src="{{url('event/js/daypilot/daypilot-all.min.js')}}" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="{{url('event/icons/style.css')}}"/>
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
                    <div class="main">

                        <div style="width:160px; float:left;">
                            <div id="nav"></div>
                        </div>

                        <div style="margin-left: 160px;">

                            <div class="space">
                                Show rooms:
                                <select id="filter">
                                    <option value="0">All</option>
                                    <option value="1">Single</option>
                                    <option value="2">Double</option>
                                    <option value="4">Family</option>
                                </select>

                                <div class="space">
                                    Time range:
                                    <select id="timerange">
                                        <option value="week">Week</option>
                                        <option value="month" selected>Month</option>
                                    </select>
                                    <label for="autocellwidth"><input type="checkbox" id="autocellwidth">Auto Cell Width</label>
                                </div>
                            </div>
                            <div id="dp"></div>
                            <div class="space">
                                <a href="#" id="add-room">Add Room</a>
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
        nav.selectMode = "month";
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
            modal.showUrl("{{url('admin/room_add')}}");
        });
    </script>

    <script>
        var dp = new DayPilot.Scheduler("dp");
        dp.allowEventOverlap = false;


        dp.scale = "Day";
        //dp.startDate = new DayPilot.Date().firstDayOfMonth();
        dp.days = dp.startDate.daysInMonth();
        loadTimeline(DayPilot.Date.today());

        dp.eventDeleteHandling = "Update";

        dp.timeHeaders = [
            {groupBy: "Month", format: "MMMM yyyy"},
            {groupBy: "Day", format: "d"}
        ];

        dp.eventHeight = 50;
        dp.bubble = new DayPilot.Bubble({});

        dp.rowHeaderColumns = [
            {title: "Room", width: 80},
            {title: "Capacity", width: 80},
            {title: "Size", width: 80}
        ];

        dp.onBeforeResHeaderRender = function (args) {
            var beds = function (count) {
                return count + " bed" + (count > 1 ? "s" : "");
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
            $.post("{{url('api/v1/reservations_move')}}",
                {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString(),
                    newResource: args.newResource
                },
                function (data) {
                    dp.message(data.message);
                });
        };

        // http://api.daypilot.org/daypilot-scheduler-oneventresized/
        dp.onEventResized = function (args) {
            $.post("{{url('api/v1/reservations_resize')}}",
                {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString()
                },
                function () {
                    dp.message("Resized.");
                });
        };

        dp.onEventDeleted = function (args) {
            $.post("{{url('api/v1/reservations_delete')}}",
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
            modal.showUrl("new.php?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);

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
            modal.showUrl("edit.php?id=" + args.e.id());
        };

        dp.onBeforeCellRender = function (args) {
            var dayOfWeek = args.cell.start.getDayOfWeek();
            if (dayOfWeek === 6 || dayOfWeek === 0) {
                args.cell.backColor = "#f8f8f8";
            }
        };

        dp.onBeforeEventRender = function (args) {
            var start = new DayPilot.Date(args.e.start);
            var end = new DayPilot.Date(args.e.end);

            var today = DayPilot.Date.today();
            var now = new DayPilot.Date();

            args.e.html = args.e.text + " (" + start.toString("M/d/yyyy") + " - " + end.toString("M/d/yyyy") + ")";

            switch (args.e.status) {
                case "New":
                    var in2days = today.addDays(1);

                    if (start < in2days) {
                        args.e.barColor = 'red';
                        args.e.toolTip = 'Expired (not confirmed in time)';
                    }
                    else {
                        args.e.barColor = 'orange';
                        args.e.toolTip = 'New';
                    }
                    break;
                case "Confirmed":
                    var arrivalDeadline = today.addHours(18);

                    if (start < today || (start.getDatePart() === today.getDatePart() && now > arrivalDeadline)) { // must arrive before 6 pm
                        args.e.barColor = "#f41616";  // red
                        args.e.toolTip = 'Late arrival';
                    }
                    else {
                        args.e.barColor = "green";
                        args.e.toolTip = "Confirmed";
                    }
                    break;
                case 'Arrived': // arrived
                    var checkoutDeadline = today.addHours(10);

                    if (end < today || (end.getDatePart() === today.getDatePart() && now > checkoutDeadline)) { // must checkout before 10 am
                        args.e.barColor = "#f41616";  // red
                        args.e.toolTip = "Late checkout";
                    }
                    else {
                        args.e.barColor = "#1691f4";  // blue
                        args.e.toolTip = "Arrived";
                    }
                    break;
                case 'CheckedOut': // checked out
                    args.e.barColor = "gray";
                    args.e.toolTip = "Checked out";
                    break;
                default:
                    args.e.toolTip = "Unexpected state";
                    break;
            }

            args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";

            var paid = args.e.paid;
            var paidColor = "#aaaaaa";

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

//            $.post("backend _events.php",
            $.post("{{url('api/v1/reservations_get')}}",
                {
                    start: start.toString(),
                    end: end.toString()
                },
                function (data) {
                    dp.events.list = data;
                    dp.update();
                }
            );
        }

        function loadResources() {

//            $.post("backend _rooms.php",
            $.post("{{url('api/v1/rooms_get')}}",
                {capacity: $("#filter").val()},
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
