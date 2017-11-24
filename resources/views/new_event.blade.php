<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Reservation</title>
          @include('partials.head')
    	<link type="text/css" rel="stylesheet" href="{{ secure_url('event/media/layout.css')}}" />   
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="{{ secure_url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
         <script src="{{ secure_url('event/js/alert.js')}}" type="text/javascript"></script>
    </head>
    <body >
        <form id="f" action="{{ secure_url('api/v1/reservations_new')}}" style="padding:20px;">
            <h1>New Reservation</h1>
            <div>ملاحظات: </div>
            <div><input type="text" id="name" name="name" value="" /></div>
            <label for="customer_id" style="display: block">
                Customer
            </label>
            <select id='customer_id'  class="js-example-basic-single" name="customer_id" style="width: 100%">
                <?php 
                foreach ($customers as $customer) {
                    // code...
                    print "<option value='$customer->id'>name $customer->name || phone: $customer->phone</option>";
                }
                ?>
            </select>

            <div>Start:</div>
            <div><input type="text" class='form-control datetime' id="start" name="start" value="{{$start}}" /></div>
            <div>End:</div>
            <div><input type="text" class='form-control datetime' id="end" name="end" value="{{$end}}" /></div>
            <div>Room:</div>
            <div>
                <select id="room" name="room_id">
                    <?php 
                        foreach ($rooms as $room) {
                            $selected = $resource == $room->id ? ' selected="selected"' : '';
                            $id = $room->id;
                            $name = $room->name;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select>
                
            </div>
            <div class="space"><input type="submit" id='submit' value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
         @include('partials.javascripts')
        <script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }
        var condition = true;

        $("#f").submit(function () {
            var f = $("#f");
          
            if(document.getElementById('name').value == ''){
                document.getElementById('name').value = 'لا يوجد ملاحظات'
            }
              
            if(condition){
            condition = false;
                $.post(f.attr("action"), f.serialize(), function (result) {
                      var condition = true;
                close(eval(result));
            });
            return false;
            }
            else {
                 window._backUpalert('please wait');
                  return false;
            }
            
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
        </script>
        <script src="{{ secure_url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

    </body>
</html>
