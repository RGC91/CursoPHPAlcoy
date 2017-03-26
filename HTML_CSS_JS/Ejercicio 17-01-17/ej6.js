$(document).ready(CP6);
        function CP6() {

            $("#nom").focus(function(){
                $(this).addClass("roig");
            })
            $("#nom").blur(function(){
                $(this).removeClass("roig");
            })
            $("#cou").focus(function(){
                $(this).addClass("roig");
            })
            $("#cou").blur(function(){
                $(this).removeClass("roig");
            })

        }