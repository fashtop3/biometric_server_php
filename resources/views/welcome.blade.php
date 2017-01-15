<!DOCTYPE html>
<html>
    <head>
        <title>IoT SDS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="qrc:///qtwebchannel/qwebchannel.js"></script>
        <script type="text/javascript">

            var capButton ;
            var widget ;

            // Initialise web page
            function initialize() {
                initialize_qt() ;
                capButton = document.getElementById('capButton') ;
                capButton.addEventListener('click', on_capButton_click, false) ;
            }

            // Initialise connection to QT C++
            function initialize_qt() {
                if (typeof qt != 'undefined') new QWebChannel(qt.webChannelTransport, function(channel) {
                    widget = channel.objects.widget;
                } );
            }

            // function, can be called from C++ or from Javascript
            function doneCapturing(msg) {
                alert(msg);
            }

            // Event handler for demonstration
            function on_capButton_click(ev) {
                //var x = ev.clientX - canvas.offsetLeft ;
                //var y = ev.clientY - canvas.offsetTop ;
                //addDot(x, y, 8, '#FF0000') ;
                callCpp("Calling from html page");
            }

            // Javascript function passes parameter to C++
            function callCpp(str) {
                if (typeof widget !== 'undefined') {
                    widget.jsStartCapturing(str) ;
                }
            }

        </script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body onload="initialize()" >
        <div class="container">
            <div class="content">
                <div class="title">BIOMETRICS API SERVER</div>
            </div>
            <div class="">
                <input id="capButton" type="submit" name="ClickMe" value="ClickMe" />
            </div>
        </div>
    </body>
</html>
