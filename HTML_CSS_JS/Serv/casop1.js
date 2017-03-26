//en el navegador: http://127.0.0.1:8081/index.htm
var http = require('http');
var fs = require('fs');
var url = require('url');
http.createServer( function (request, response) {
    var pathname = url.parse(request.url).pathname;
    console.log("petición: " + pathname + " received.");
    if("" == pathname || "/" == pathname){
        pathname = "/index.html";
    }else if("/adios" == pathname){
        response.writeHead(200, {'Content-Type': 'text/html'});
            response.write("Adios!!!");
    }else if("/hola"== pathname){
        response.writeHead(200, {'Content-Type': 'text/html'});
            response.write("Hola!!!");
    }else{

        
        fs.readFile(pathname.substr(1), function (err, data) {
            if (err) {
                var error = true;
           
            }else{
                // HTTP Status: 200 : OK
                // Content Type: text/plain
                response.writeHead(200, {'Content-Type': 'text/html'});
                response.write(data.toString());
            }
            response.end();
        });
        var error = true;
        if(error){

             fs.readFile('Error.html', function (err2, data2) {
                    console.log("entra");
                    response.writeHead(404, {'Content-Type': 'text/html'});
                    response.write(data2.toString());
                })
         }
    }
}).listen(8081);
console.log('Server running at http://127.0.0.1:8081/');