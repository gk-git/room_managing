<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Room | Kashta Camp</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#523c35">
    <link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}"/>
    <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('event/js/alert.js')}}" type="text/javascript"></script>

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

var condition = true;
    $("#f").submit(function () {
        var f = $("#f");
     if(condition){
          condition = false;
          $.post("{{url('api/v1/room_update')}}", f.serialize(), function (result) {
            condition = true;
            close(eval(result));
        });
        return false;
     }else {
         window._backUpalert('please wait');
     }
       
    });

    $(document).ready(function () {
        $("#name").focus();
    });

</script>

</body>
</html>
