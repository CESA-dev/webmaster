<html>
<head>
    <meta charset="utf-8">
    <link href="js/node_modules/croppie/croppie.css" rel="stylesheet" type="text/css">
    <script   src="http://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/node_modules/croppie/croppie.js"></script>
    <script type="text/javascript">
$( document ).ready(function() {
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();          
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.upload-demo').addClass('ready');
            }           
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 800,
            height: 600
        },
        boundary: {
            width: 900,
            height: 700
        }
    });

    $('#upload').on('change', function () { readFile(this); });
    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (resp) {
            $('#imagebase64').val(resp);
            $('#form').submit();
        });
    });

});
</script>
</head>
<body>
<h1>This page is for inserting the activity information</h1>
<form id="form" enctype="multipart/form-data" action="processpage.php" method="post">
活动名，128字符以内 <input type="text" name="name"/><br>
活动时间，格式yyyy <input type="text" name="year"/><br>
活动url: <input type="text" name="url"/><br>    
Token:  <input type="text" name="fake_token"/><br>
<div id="upload-demo"></div>
<input type="hidden" id="imagebase64" name="imagebase64">
</form>

thumbnail: <input type="file" name="thumbnail" id="upload"/>

<a href="#" class="upload-result">Send</a>
</body>
</html>



