<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Room</title>
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

<form id="f" style="padding:20px;">
    <h1>New Room</h1>
    <label style="display: block" for="name">Name:</label>
    <div><input type="text" id="name" name="name" value=""/></div>
    <label style="display: block" for="size">Size:</label>

    <div><input type="text" id="size" name="size" value=""/></div>
    <label style="display: block" for="capacity">Capacity:</label>
    <div>
        <select id="capacity" name="capacity">
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='4'>4</option>
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

        $.post('{{url('api/v1/room_new')}}', f.serialize(), function (result) {
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
