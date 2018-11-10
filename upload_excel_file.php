<?php
/**
 * Created by PhpStorm.
 * User: hninsunyein
 * Date: 11/9/2018
 * Time: 8:34 PM
 */?>
<!DOCTYPE HTML>

<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <meta charset="utf-8">
    <title>File Upload</title>
    <meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" integrity="sha384-KJX9lrSUid7hQ50iMEae8ELw6LCZUrLQ2KpYZ9LXMjxySoHgeBfsC6mx3ufqk4d3" crossorigin="anonymous">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="assets/css/jquery.fileupload.css">
    <link rel="stylesheet" href="assets/css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="assets/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="assets/css/jquery.fileupload-ui-noscript.css"></noscript>
</head>
<style>
    .font{
        font-family: "Times New Roman";
    }
</style>
<body>
<div class="container">
    <h3 align="center" class="text-primary" style="font-family: 'Times New Roman'">Import Excel to Mysql using PHP Excel in PHP</h3>
    <br><br>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload"  action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->



            <div class= "col-md-12 form-inline col-md-offset-2"  >
                <div class="form-group col-md-6 ">
                    <label class="text-block" style="font-family: 'Times New Roman';font-size: 18px">Select Year :</label>
                    <select class="form-control container font" required=""  name="year">
                        <option class="hidden"  selected disabled>Select Year</option>
                        <option  value="1st">1st</option>
                        <option value="2nd" >2nd</option>
                        <option valuze="3rd">3rd</option>
                        <option valuze="4th">4th</option>
                        <option valuze="5th">5th</option>
                        <option valuze="6th">6th</option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-block" style="font-family: 'Times New Roman';font-size: 18px ">Select Major :</label>
                    <select class="form-control container font" required="" name="role">
                        <option class="hidden"  selected disabled>Select Major</option>
                        <option  value="ict"  >ICT</option>
                        <option value="ist" >IS</option>
                        <option valuze="ce">CE</option>
                        <option  value="pre">PRE</option>
                        <option  value="ame">AME</option>

                    </select>
                </div>
            </div>
        <br><br>

            <div class="row fileupload-buttonbar">
                <div class="col-md-12">
                    <fieldset>
                        <legend class="text-block" style="font-family: 'Times New Roman';font-size: 18px">Select Excel Files</legend>

                    <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                        <input type="file" name="files[]" multiple>

                    </span>

                        <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Import File</span>
                        </button>

                    <span class="fileupload-process"></span>
                </div>
                <!-- The global progress state -->
                <div class="col-lg-5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                    </div>
                    <div class="progress-extended">&nbsp;</div>
                    </fieldset>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>





    </form>

</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file ; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>


                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}

                    <span>{%=file.name%}</span>
                {% } %}
            </p>
               {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}

        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
           {% if (file.url) { %}
                <span>Completed</span>
                {% } else { %}
                    <span>Not Completed</span>
                {% } %}
        </td>




        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>

            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js" integrity="sha384-9RnDvEg3yE0DwTGAY34Gze15jSzmr6XlrL5t/fzE2+qNe93kv6fyr3BOAsJIu8yL" crossorigin="anonymous"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js" integrity="sha384-klGuZWTnqB7v2Zy+LDefVRiFX90fVhu5XSs58OioYvF7nGVV4VP91dbUr5e5u4np" crossorigin="anonymous"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js" integrity="sha384-Ruiok12tfp1D6SJw02NyOhoEKZ1oyXvy4/0YfF+K459YJA31h93bS+iOszDHXd8w" crossorigin="anonymous"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js" integrity="sha384-dCF25SRAwEga8+EATJhluXfC+zve4mtBr9kaZ6rlp0xYbi9zR8PzN29hje8I9L9t" crossorigin="anonymous"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="assets/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="assets/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="assets/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="assets/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="assets/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="assets/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="assets/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="assets/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="assets/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body>
</html>

