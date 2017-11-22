<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Room</title>
    <link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}"/>
    <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('event/js/daypilot/daypilot-all.min.js')}}" type="text/javascript"></script>
            <script type="text/javascript" src="">
    window.alert = function() {};

// or simply
alert = function() {};
window.prompt = alert;
prompt = alert;
</script>
</head>
<body>
<?php
// check the input
if ($id > 0) {

} else {
    die("invalid URL");

}

?>
<form id="f" style="padding:20px;">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$room->id}}"/>
    <h1>Edit Room</h1>
    <label style="display: block; " for="name">Name:</label>
    <div><input type="text" id="name" name="name" value="{{$room->name}}"/></div>
    <label style="display: block; " for="name">Size:</label>
    <div><input type="text" id="size" name="size" value="{{$room->size}}"/></div>
    <label style="display: block;" for="capacity">Capacity:</label>
    <div>
        <select id="capacity" name="capacity">
            <?php
            $options = array(1, 2, 4);
            ?>
            @foreach($options as $option)
                <option value='{{$option}}' {{$room->capacity == $option ?  ' selected="selected"' : ''}}>{{$option}}</option>
            @endforeach
        </select>
    </div>
    <label style="display: block; " for="status">Status:</label>
    <div>
        <select id="status" name="status">
            <?php
            $options = array("Ready", "Cleanup", "Dirty");
            ?>
            @foreach($options as $option)

                <option value='{{$option}}' {{$room->status == $option ?  ' selected="selected"' : ''}}>{{$option}}</option>
            @endforeach
        </select>
    </div>


    <div class="space"><input type="submit" value="Save"/> <a href="javascript:close();">Cancel</a></div>
</form>

<script type="text/javascript">
    function close(result) {
        DayPilot.Modal.close(result);
    }

    $("#f").submit(function () {
        var f = $("#f");
        alert(f.serialize());
        $.post("{{url('api/v1/room_update')}}", f.serialize(), function (result) {
            alert(JSON.stringify(result));
//            close(eval(result));
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
