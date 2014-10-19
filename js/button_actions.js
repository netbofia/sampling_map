$(document).ready(function(){
  $('.icon-size #set_icon_size').on('click',function(){
    $('.leaflet-marker-icon #test').css('width',$('.icon-size #width').val()).css('height',$('.icon-size #height').val());
  });
});



