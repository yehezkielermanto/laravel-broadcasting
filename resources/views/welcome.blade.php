<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="m-3">Server side</h1>
    <div class="container-fluid">
        <textarea id="value" cols="30" rows="10" class="form-control" placeholder="masukkan isi pesan event"></textarea>
        <br>
        <button onclick="sendEvent()" class="btn btn-primary">Send Event</button>
        <p id="status"></p>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // send event to client
    function sendEvent() {
        let value = document.querySelector("#value").value
        document.querySelector('#status').innerHTML = ""
        $.ajax({
            url: "/send-event",
            method: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { value: value },
            dataType: "JSON",
            statusCode: {
                200: function(){
                    document.querySelector('#status').innerHTML = "Event berhasil dikirim ke client"
                }
            }
        });
    }
</script>

</html>
