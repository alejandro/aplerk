// API e68f21d821c4cb00a2fe6136345cf1ee01b38f64
// https://api.clerk.im/rooms/room_type/1.json?api_key=
// 

$(document).ready(function () {
function information() 
 {
      var permalink = 'request.json' ;
      var lugar = $('#response');
      var code = 500;
      
      $("#status").addClass("loading");
      $.getJSON(permalink,function(data){
               $.each(data, function(i, odatos){
              code = odatos.status.code;
              if (code == 200) {
                  lugar.prepend('<header><p id="info" style="white-space:pre;"><img src="' + odatos.hotel.logo  + '" width=50 height=50><a href="' + odatos.hotel.domain + '" target="_blank" title="Go to your Website">' + odatos.hotel.name + '</a>.<br /> '+  odatos.hotel.city + ', '+ odatos.hotel.country + '</p></header>');
                  $("#h1").removeClass("center");
                $("#status").text("<").css("background","#eee")
                .append('<span onclick="location.reload()" style="cursor:pointer;">Regresar</span>');
              $("#status").removeClass("loading");
                return false;
               } else {
                $("#h1").removeClass("center");
                  $("#status")
                    .text("Error Interno, posiblemente tu API_key es incorrecta ")
                    .css("background","red")
                    .css("white-space","pre")
                    .css("color","white")
                    .append('<br/>< <span onclick="location.reload()" style="cursor:pointer;">Regresar</span>');
                    $("#status").removeClass("loading");
                  return false;
                }
               });
               
              });
            
}

  $("#status").text("Ingresa tu API");
    $("#go").click(function(){
      var lg = $("#ap").val().length;  
      if (lg < 40) {
        $("#status").text("tu API_Key debe tener 40 caracteres");
          return false;
      }else {
        $("#status").text("Bien!");
        information();
        $("#formulario").slideUp("slow");
        $("#response").slideDown("slow");
        
        return false;
      }
        
  });
  
});


