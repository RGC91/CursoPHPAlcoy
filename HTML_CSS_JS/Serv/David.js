//en el navegador: http://127.0.0.1:3000/index.htm
var http = require('http');
var fs = require('fs');
var url = require('url');
http.createServer( function (request, response) {
    var pathname = url.parse(request.url).pathname;
    console.log("petición: " + pathname + " received.");
    if("" == pathname || "/" == pathname){
        pathname = "/index.html";
    }else if("/hola" == pathname){
        response.writeHead(200, {'Content-Type': 'text/html'});
            response.write("HOLA!!!!");
    }else if("/adios" == pathname){
        response.writeHead(200, {'Content-Type': 'text/html'});
            response.write("ADIOS!!!!")
    }else{
        pathname = "/error.html";
    }
    // switch(pathname){
        
    //     case ("/hola"):
    //         response.writeHead(200, {'Content-Type': 'text/html'});
    //         response.write("HOLA!!!!");
    //     case ("/adios"):
    //         response.writeHead(200, {'Content-Type': 'text/html'});
    //         response.write("ADIOS!!!!");
    // default:
    //         response.writeHead(404, {'Content-Type': 'text/html'});
    //         response.write("ERROR!!!!");

    // }
    
    
    fs.readFile(pathname.substr(1), function (err, data) {
        if (err) {
            console.log(err);
            // HTTP Status: 404 : NOT FOUND
            // Content Type: text/plain
            response.writeHead(404, {'Content-Type': 'text/html'});
        }else{
            // HTTP Status: 200 : OK
            // Content Type: text/plain
            response.writeHead(200, {'Content-Type': 'text/html'});
            response.write(data.toString());
        }
        response.end();
    });
}).listen(3000);
console.log('Server running at http://127.0.0.1:3000/');