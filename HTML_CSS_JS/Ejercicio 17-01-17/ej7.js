$(document).ready(teñir);

function teñir(){
    
    var paragrafs=$("p");
    paragrafs.each(function(index){

        if($(this).text().length>100){
            $(this).addClass("groc");
        }
        $(this).text($(this).text() + $(this).text().length);


    })
   
}

