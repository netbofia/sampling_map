$(document).ready(function(){
  if( $.dough('sampling_map')==null){
        $.dough('sampling_map', '{"name":"unknown","geos":[{"lat":0,"long":0}]}',{ expires: 7, path: "current", domain: "auto", secure: false });
        
  }
  $('.btn.btn-primary#add').on('click',function(){
    var cookie = $.dough('sampling_map');
    cookie.geos[cookie.geos.length]={"lat":$('#lat').val(),"long":$('#lon').val()};         
    $.dough('sampling_map',cookie);
    for ( var i in cookie.geos ){
      cookie.geos[i];
      $('table.samples').append('<tr><td>'+cookie.geos[i].lat+'</td></tr>');
    };
    console.log('Button pressed!');
  });   
});
