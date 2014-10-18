$(document).ready(function(){
  if( $.dough('sampling_map')==null){
        $.dough('sampling_map', '{"name":"unknown","geos":[]}',{ expires: 7, path: "current", domain: "auto", secure: false });
        
  }else{
    $('table.samples').empty();
    var cookie = $.dough('sampling_map');
    for ( var i in cookie.geos ){
      cookie.geos[i];
      $('table.samples').append('<tr><td><span class="badge">N'+cookie.geos[i].lat+"W"+cookie.geos[i].long+'</span></td></tr>');
    };
  }
  $('.btn.btn-primary#add').on('click',function(){
    var cookie = $.dough('sampling_map');
    cookie.geos[cookie.geos.length]={"lat":$('#lat').val(),"long":$('#lon').val()};         
    $.dough('sampling_map','remove',{ expires: 7, path: "current", domain: "auto", secure: false });
    $.dough('sampling_map',JSON.stringify(cookie),{ expires: 7, path: "current", domain: "auto", secure: false });
    $('table.samples').empty();
    for ( var i in cookie.geos ){
      cookie.geos[i];
      $('table.samples').append('<tr><td><span class="badge">N'+cookie.geos[i].lat+'W'+cookie.geos[i].long+'</span></td></tr>');
    };
    L.circle([cookie.geos[cookie.geos.length-1].lat,cookie.geos[cookie.geos.length-1].long],3000).addTo($map);
  });   
  $('button#clear').on('click',function(){
    $('div.alert#delete_data').removeClass('hide');
  });
  $('#delete_data #confirm').on('click',function(){
    console.log("cofirmed");
    $.dough('sampling_map','remove',{ expires: 7, path: "current", domain: "auto", secure: false });
    $.dough('sampling_map', '{"name":"unknown","geos":[]}',{ expires: 7, path: "current", domain: "auto", secure: false });
    $('table.samples').empty();
    //clear map data [to do!]

    $('div.alert#delete_data').addClass('hide');
  });
});
