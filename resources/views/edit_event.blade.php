<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Event</title>
    	<link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}" />    
        <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    </head>
    <body>
    
        <form id="f" action="{{url('api/v1/reservations_update')}}" style="padding:20px;">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$id}}" />
            <h1>Edit Reservation</h1>
            
             <h1>New Reservation</h1>
            <div>Name: </div>
            <div><input type="text" id="name" name="name" value="{{$event->name}}" /></div>
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
              <option value='1'>Hot Dog, Fries and a Soda</option>
              <option value='2' >Burger, Shake and a Smile</option>
              <option value='3'>Sugar, Spice and all things nice</option>
            </select>

            <div>Start:</div>
            <div><input type="text" id="start" name="start" value="{{$event->start}}" /></div>
            <div>End:</div>
            <div><input type="text" id="end" name="end" value="{{$event->end}}" /></div>
            <div>Room:</div>
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
                         <option value='1' selected > Paid</option>
                   <option value='0' >Not Paid</option>
                        <?php
                    }else {
                        ?>
                        <option value='1'   > Paid</option>
                   <option value='0' selected >Not Paid</option>
                        <?php
                    }
                    ?>
                </select>
                
            </div>
            
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
         <script type="text/javascript" src="">
    
        window.frames[0].alert =  window.frames[0].prompt =  window.frames[0].confirm = window.alert =window.confirm = window.prompt =alert =prompt = confirm =  function () {
      debugger;
        };
    </script>

    </body>
</html>
