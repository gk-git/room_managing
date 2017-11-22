<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Reservation</title>
    	<link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}" />   
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="">
    window.alert = function() {};

// or simply
alert = function() {};
window.prompt = alert;
prompt = alert;
</script>
    </head>
    <body>
        <form id="f" action="{{url('api/v1/reservations_new')}}" style="padding:20px;">
            <h1>New Reservation</h1>
            <div>Name: </div>
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
              <option value='1'>Hot Dog, Fries and a Soda</option>
              <option value='2' >Burger, Shake and a Smile</option>
              <option value='3'>Sugar, Spice and all things nice</option>
            </select>

            <div>Start:</div>
            <div><input type="text" id="start" name="start" value="{{$start}}" /></div>
            <div>End:</div>
            <div><input type="text" id="end" name="end" value="{{$end}}" /></div>
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
            console.log()
            if(document.getElementById('name').value == ''){
                document.getElementById('name').value = 'No Customer Name'
            }
            console.log(f.serialize());
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
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
         <script type="text/javascript" src="">
    
        window.frames[0].alert =  window.frames[0].prompt =  window.frames[0].confirm = window.alert =window.confirm = window.prompt =alert =prompt = confirm =  function () {
        debugger;
        };
    </script>

    </body>
</html>
