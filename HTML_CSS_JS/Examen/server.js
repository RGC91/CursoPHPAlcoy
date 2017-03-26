var express = require ('express');
var app     = express();
var fs      = require('fs');
var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({estend: false});

app.get('/', function(req,res){
    res.sendFile(__dirname + '/index.html');
});

app.post('/add', urlencodedParser, function(req,res){
    //recibimos los datos del formulario y los convertimos
    var id = parseInt(req.body.identificador)
    var name = req.body.nombre
    var price = req.body.precio
    var available = req.body.disponible
    if(available == 'on'){
        available = true;
    }else{
        available = false;
    }

    // leer el archivo JSON
    fs.readFile(__dirname + "/lista.json", 'utf8', function(err, data){
        //convertir string Json en objeto
        var object = JSON.parse(data);

        //añadir una nueva propiedad al objeto
        object['producto' + id] = {
            "id":id,
            "nombre": name,
            "precio": price,
            "disponible": available
        }

        //volvemos a convertir el objeto en un string json
        var json = JSON.stringify(object, null, 2);
        console.log(json);
        //sobreescribimos el archivo .json con el 
        fs.writeFile(__dirname + "/lista.json", json);

        //y devolvemos el string
        res.end(json);
    })  
})

app.get('/delete/:id', urlencodedParser, function(req, res){
    fs.readFile(__dirname + "/lista.json", 'utf8', function(err, data){
        var object = JSON.parse(data);

        delete object['producto' + req.params.id];

        var json = JSON.stringify(object, null, 2);

        fs.writeFile(__dirname + "/lista.json", json);

        res.end(json)
    })
})
app.get('/lista', function(req,res){
    res.sendFile(__dirname + '/lista.json');
});
app.listen(8081);
console.log ('Funciona');
