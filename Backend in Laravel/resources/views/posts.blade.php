<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Posts</h1>
                <div class="card">
                    <div class="card-header">
                        <h5>Post 1</h5>
                    </div>
                    <div class="card-body">
                        <p>I’m not in this world to live up to your expectations and you’re not in this world to live up to mine.</p>
                        <button class="btn btn-primary like" data-name="I’m not in this world to live up to your expectations and you’re not in this world to live up to mine.">Like</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Post 2</h5>
                    </div>
                    <div class="card-body">
                        <p>Do not pray for an easy life, pray for the strength to endure a difficult one.</p>
                        <button class="btn btn-primary like" data-name="Do not pray for an easy life, pray for the strength to endure a difficult one.">Like</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Post 3</h5>
                    </div>
                    <div class="card-body">
                        <p>Adapt what is useful, reject what is useless, and add what is specifically your own.</p>
                        <button class="btn btn-primary like" data-name="Adapt what is useful, reject what is useless, and add what is specifically your own.">Like</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- send an ajax post request upon click of like to /like -->
        <script>
            $(document).ready(function() {
                $('.like').on('click', function() {
                    var post_name = $(this).data('name');
                    var user_name = "John Doe";
                    $.ajax({
                        url: '/like',
                        method: 'POST',
                        data: {
                            post_name: post_name,
                            user_name:user_name,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $(this).text('Liked');
                        }
                    });
                });
            });
        </script>
</body>

</html>