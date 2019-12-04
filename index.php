<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Images Save from URL</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .done_url ul li {
            list-style: decimal;
        }

        #status {
            border: 1px solid;
            padding: 15px;
            margin-bottom: 50px;
            height: 38vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        body{
            overflow: hidden;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col mb-5 mt-5">
            <h2>Images Save from URL</h2>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Enter URL Each Line</label>
                    <textarea rows="5" class="form-control-file" name="url_list" id="url_list"></textarea>
                </div>
                <span id="process_button" class="btn btn-primary mb-2">Start Process</span>
            </form>
        </div>
        <div class="col" id="status">
            <div class="done_url">
                <ul></ul>
            </div>
        </div>
    </div>
    <!-- Custom JavaScript -->
    <script>
        $('#status').hide();
        function saveImage(url){
            var settings = {
                "url": "http://localhost/rendering/image/save/api.php",
                "method": "POST",
                "data": {
                    url: url
                }
            }

            $.ajax(settings).done(function (response) {
                $('#status').show()
                $('.done_url ul').append('<li>' + response + '</li>');
                console.log('url: ', url);
            });
        }

        $('#process_button').click(function () {
            var urls = [];
            let url_list = $('#url_list').val();
            urls = url_list.split("\n");
            console.log('url_list: ', url_list);
            console.log('urls: ', urls);
            if (urls.length > 0) {
                urls.forEach(element => {
                    saveImage(element.replace('http://localhost','https://d2w9m16hs9jc37.cloudfront.net'));
                });
            } else {
                console.log('No URL found!');
            }
        });
    </script>
</body>

</html>