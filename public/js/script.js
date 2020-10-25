$(document).ready(function(){
  $(".video-clickable").on("click",function(){
    console.log("clicked",$(this).attr('id'));
    videoId = $(this).attr('id');
    $(location).attr('href', '/video/'+videoId)
  });

});