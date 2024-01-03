<!DOCTYPE html>

<head>
    <title>Arslan Stack</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4a4816565947ed5cf64f', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('like-channel');
        channel.bind('post-like', function(data) {
            var message = data.liker_name + ' liked your post ' + data.post_name;
            toastr.options = {
                closeButton: true,
                positionClass: 'toast-bottom-full-width',
                extendedTimeOut: 2000,
                timeOut: 2000,
                fadeOut: 250,
                fadeIn: 250
            };
            toastr.success(message);
        });
    </script>
</head>

<body>
    <h3>Open /posts and trigger event by liking a post</h3>
</body>