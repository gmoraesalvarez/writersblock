<!DOCTYPE html>
<html>
	<head>
        <title>Escritor</title>
        <link rel="icon" href="fav.png" type="icon">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="corpo.css?v=1.1" rel="stylesheet" type="text/css" >
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    </head>
    <body>
        <div class="login">
        	<input id='txtid'value="" placeholder="text's code" onkeyup="go(event)"><br><br>or<br><br>
            <a href='write.php' class='but'>new text</a>
        </div>
        
    </body>
    <script>
    	function go(event){
            if (event.keyCode === 13) {
                window.location = 'https://YOURSITEHERE.com/writer/write.php?id='+txtid.value;
            }
        }
    </script>
</html>
