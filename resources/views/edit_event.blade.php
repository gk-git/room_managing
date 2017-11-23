<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Event</title>
        
         @include('partials.head')
    	<link type="text/css" rel="stylesheet" href="{{ secure_url('event/media/layout.css')}}" />    
        <script src="{{secure_url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
         <script src="{{secure_url('event/js/alert.js')}}" type="text/javascript"></script>

    </head>
    <body>
    
        <form id="f" action="{{ secure_url('api/v1/reservations_update')}}" style="padding:20px;">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$id}}" />
            <h1>تعديل الحجز</h1>
            
             <h1>حجز جديد</h1>
            <div>:ملاحظات </div>
            <div><input type="text" id="name" name="name" value="{{$event->name}}" /></div>
            <label for="customer_id" style="display: block">
                الزبون
            </label>
            <select id='customer_id'  class="js-example-basic-single" name="customer_id" style="width: 100%">
                <?php 
                foreach ($customers as $customer) {
                    // code...
                    print "<option value='$customer->id'>name $customer->name || phone: $customer->phone</option>";
                }
                ?>
            </select>

            <div>:البدايه</div>
            <div><input type="text" class='form-control datetime'  id="start" name="start" value="{{$event->start}}" /></div>
            <div>:النهايه</div>
            <div><input type="text" class='form-control datetime'  id="end" name="end" value="{{$event->end}}" /></div>
            <div>:خيمه</div>
            <div>
                <select id="room" name="room_id">
                    <?php 
                        foreach ($rooms as $room) {
                            $selected = $event->room_id == $room->id ? ' selected="selected"' : '';
                            $id = $room->id;
                            $name = $room->name;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select>
                
            </div>
            <div>Paid:</div>
            <div>
                <select id="paid" name="paid">
                    <?php 
                    if($event->paid ){
                        ?>
                         <option value='1' selected > مدفوع</option>
                   <option value='0' >غير مدفوع</option>
                        <?php
                    }else {
                        ?>
                        <option value='1'   > مدفوع</option>
                   <option value='0' selected >غير مدفوع</option>
                        <?php
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
             
            if(condition ){
               condition = false;
                 $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
                condition = true;
            });
            return false;
            }
            else {
                window._backUpalert('please wait');
            }
           
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
      
        <script src="{{ secure_url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>  
     
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss",
             language: 'en'
        });
    </script>
    </body>
</html>
