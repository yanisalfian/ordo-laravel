require('./bootstrap');
import 'bootstrap';

import PerfectScrollbar from 'perfect-scrollbar';

$(function(){
  const ps = new PerfectScrollbar('.sidebar-container');
  const ps2 = new PerfectScrollbar('.main');
  
  const url = (window.location.href).split('?')[0]
  console.log(url)
  const urlParams = new URLSearchParams(window.location.search);
  const qLocation = urlParams.get('location')
  const qCategory = urlParams.get('category')

  const categoryEl = $('.category-group').children('a');
  for(var i = 0; i < categoryEl.length; i++){
    const el = categoryEl[i];
    const id = el.id;
    let catUrl = url + '?category=' + id.replace('menu', '');
    catUrl += qLocation ? '&location=' + qLocation : ''
    $("#" + id).attr('href', catUrl)
  }

  const locationEl = $('.location-group').children('a');
  for(var i = 0; i < locationEl.length; i++){
    const el = locationEl[i];
    const id = el.id;
    let locUrl = url + '?location=' + id.replace('loc', '');
    locUrl += qCategory ? '&category=' + qCategory : ''
    $("#" + id).attr('href', locUrl)
  }
})

$("#toggle-sidebar").on('click', function(){
  $('.sidebar').toggle(300, function(e){
    var sideState = $('.sidebar').css('display')
    console.log(sideState)
    if(sideState == 'block'){
      $('.main').removeClass('no-sidebar')
    } else {
      $('.main').addClass('no-sidebar')
    }
  })
});