<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="antialiased">
    <h1>Server side</h1>
    <button onclick="sendEvent()">Send Event</button>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function sendEvent() {
        $.ajax({
            url: "/send-event",
            method: "GET",
            success: function(){
                console.log('Success send Event');
            }
        });
    }
</script>

</html>
