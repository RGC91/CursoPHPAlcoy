$(document).ready(teñir2);


function teñir2(){
var paragrafs=$("p")
paragrafs.each(function(event){
        var textoOriginal = $(this).text()
        var numeroCaracteres = $(this).text().length;
        var nuevoTexto = textoOriginal  +"<span class='roig'>" 
                                        + numeroCaracteres 
                                        +"</span>";
        if($(this).text().length>500){
            $(this).addClass("groc");
        }
        $(this).html( nuevoTexto);
    });
}
