<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Room</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#523c35">

    <link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}"/>
    <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('event/js/daypilot/daypilot-all.min.js')}}" type="text/javascript"></script>
     <script src="{{url('event/js/alert.js')}}" type="text/javascript"></script>

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
    var condition = true;
    $("#f").submit(function () {
        var f = $("#f");
        if(condition){
            condition = false;
                $.post("{{url('api/v1/room_new')}}", f.serialize(), function (result) {
                    var condition = true;
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
