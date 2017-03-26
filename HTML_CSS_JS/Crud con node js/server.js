var express =require('express');
var http    =require('http');
var bodyParser=require('body-parser');
var fs      =require('fs');
var app     =express();
var urlencodedParser=bodyParser.urlencoded({extended: false});
//Esto es para solo tener que modificar el puerto desde aqui una unica vez
var port=8081;

//Directorio de los ficheros html y css
app.use(express.static(__dirname + '/public'));

//Ir al index
app.get('/', function(req,res){
    res.sendFile(__dirname + '/public/index.html')
});

// Cosas con el formulario
app.post('/add', urlencodedParser, function(req,res){
    //recibimos
    var id = parseInt(req.body.identificador)
    var nom = req.body.nombre;
    var coste = parseFloat(req.body.precio);
    var disp = req.body.disponible;
    if(disp == 'on'){
        disp = true;
        // Esto es mi "joga bonito" si quedan disponibles, recoge cuantas quedan.
        var rest=req.body.restantes;
    }else{
        disp = false;
        // Si no quedan lo guarda como nulo.
        var rest=null ;
    }

    // leemos la lista
    fs.readFile(__dirname + "/lista.json", 'utf8', function(err, data){
        //convertir string Json en objeto
        var objeto = JSON.parse(data);

        //añadir una nueva propiedad al objeto 
        objeto['producto' + id] = {
            "id":id,
            "nombre": nom,
            "precio": coste,
            "disponible": disp,
            "restantes" : rest
        }

        //volvemos a convertir el objeto en un string json
        var json = JSON.stringify(objeto, null, 2);
        
        //sobreescribimos el archivo .json con el 
        fs.writeFile(__dirname + "/lista.json", json);

        //y devolvemos el string
        res.end(json);
    })  
})
// Eliminar
app.get('/delete/:id', urlencodedParser, function(req, res){
    fs.readFile(__dirname + "/lista.json", 'utf8', function(err, data){
        var objeto = JSON.parse(data);

        delete objeto['producto' + req.params.id];

        var json = JSON.stringify(objeto, null, 2);

        fs.writeFile(__dirname + "/lista.json", json);

        res.end(json);
    })
})
//Escoger
app.get('/selection/:id', urlencodedParser, function(req, res){

    fs.readFile(__dirname + "/lista.json", 'utf8', function(err, data){

        var objeto = JSON.parse(data);
        var elec = objeto['producto' + req.params.id];

        var json = JSON.stringify(elec, null, 2);
        
       res.end(json);

    })

})


// Mostrar la lista
app.get('/lista', function(req,res){
    res.sendFile(__dirname + '/lista.json');
});

// que la gente no se desmande
app.get('/*', urlencodedParser, function(req,res){
    res.end('La direccion escrita no existe.');
});

// activacion
app.listen(port);
console.log('El servidor funciona y esta situado en el puerto ' + port);
console.log('La URL es http://127.0.0.1:8081/');
