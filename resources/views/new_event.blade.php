<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Reservation</title>
    <link type="text/css" rel="stylesheet" href="{{url('event/media/layout.css')}}"/>
    <script src="{{url('event/js/jquery/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
</head>
<body>
<?php
// check the input
//is_numeric($_GET['id']) or die("invalid URL");

require_once '_db.php';

$rooms = $db->query('SELECT * FROM rooms');

$start = $_GET['start']; // TODO parse and format
$end = $_GET['end']; // TODO parse and format
?>
<form id="f" action="{{url('api/v1/reservations_new')}}" style="padding:20px;">
    <h1>New Reservation</h1>
    <label style="display: block" for="name">Name:</label>
    <div><input type="text" id="name" name="name" value=""/></div>
    <label style="display: block" for="size">Size:</label>
    <div><input type="text" id="size" name="size" value=""/></div>
    <label style="display:block;" for="start">Start:</label>
    <div><input type="text" id="start" name="start" value="<?php echo $start ?>"/></div>
    <label style="display:block;" for="end">End:</label>
    <div><input type="text" id="end" name="end" value="<?php echo $end ?>"/></div>
    <label style="display:block;" for="room">Room:</label>
    <div>
        <select id="room" name="room">
            <?php
            foreach ($rooms as $room) {
                $selected = $_GET['resource'] == $room['id'] ? ' selected="selected"' : '';
                $id = $room['id'];
                $name = $room['name'];
                print "<option value='$id' $selected>$name</option>";
            }
            ?>
        </select>

    </div>
    <div class="space"><input type="submit" value="Save"/> <a href="javascript:close();">Cancel</a></div>
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
</body>
</html>
