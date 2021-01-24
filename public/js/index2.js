$(document).ready(function() {

    $(".box").hover(function() {
      $(".box-right").toggleClass('cl-box2');
      $(".bar").toggleClass('cl-bar2');
    });
  
    $(".bar").click(function() {
      alert("Deleted");
    });
  });