<!DOCTYPE html>
<!-- release v4.4.2, copyright 2014 - 2017 Kartik Visweswaran -->
<!--suppress JSUnresolvedLibraryURL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://127.0.0.1/samples/kartik-v-bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="http://127.0.0.1/samples/kartik-v-bootstrap-fileinput/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://127.0.0.1/samples/kartik-v-bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="http://127.0.0.1/samples/kartik-v-bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="http://127.0.0.1/samples/kartik-v-bootstrap-fileinput/themes/explorer/theme.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container kv-main">
    <img src="{{ asset('0aa.jpg') }}" alt="">
    <form id="frm_file5" enctype="multipart/form-data">
        
            {{ csrf_field() }}
            <div class="form-group aa" id="upload-container">
                <input id="file-5" name="photo[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="{{ route('file_upload') }}">
            </div>
            <button id="submit-me" type="submit">Submit</button>
    </form>
    

    <hr>
    <br>
</div>
</body>
<script>
    $('body').on('submit', '#frm_file5', function (e) {
        $('#upload-container').addClass('aa');
        e.preventDefault();
        alert('fsaf');
        var formData = new FormData( $(this)[0] );
        $.ajax({
            url : "{{ route('file_upload') }}",
            type : 'POST',
            data : formData,
            processData : false,
            contentType : false,
            success     : function (data) {
                console.log(data);
                $('#upload-container').removeClass('aa');
            }
        });
    });
    $('#file-5').on('fileimageloaded', function(event, previewId) {
        console.log("fileimageloaded");
        alert('loaded');
    });
    
    $("#file-5").fileinput({
        //showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "{{ asset('0aa.jpg') }}",
            "{{ asset('0aa.jpg') }}",
            "{{ asset('0aa.jpg') }}",
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{{ route('file_delete') }}", key: 1, extra : { _token : "{{ csrf_token() }}" } },
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{{ route('file_delete') }}", key: 2, extra : { _token : "{{ csrf_token() }}" } },
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{{ route('file_delete') }}", key: 3, extra : { _token : "{{ csrf_token() }}" } }
        ],
        uploadExtraData: {_token: "{{ csrf_token() }}"},
        uploadUrl: "{{ route('file_upload') }}",
        showUploadedThumbs : false
    });





    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "http://lorempixel.com/1920/1080/transport/1",
            "http://lorempixel.com/1920/1080/transport/2",
            "http://lorempixel.com/1920/1080/transport/3"
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
        ]
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3"
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
        
    });
</script>
</html>