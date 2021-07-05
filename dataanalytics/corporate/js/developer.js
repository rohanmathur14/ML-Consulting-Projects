// animations js 
 new WOW().init();


// testimonial js


  $(document).ready(function(){
  $(".testimonial .indicators li").click(function(){
    var i = $(this).index();
    var targetElement = $(".testimonial .tabs li");
    targetElement.eq(i).addClass('active');
    targetElement.not(targetElement[i]).removeClass('active');
            });
            $(".testimonial .tabs li").click(function(){
                var targetElement = $(".testimonial .tabs li");
                targetElement.addClass('active');
                targetElement.not($(this)).removeClass('active');
            });
        });
$(document).ready(function(){
    $(".slider .swiper-pagination span").each(function(i){
        $(this).text(i+1).prepend("0");
    });
});


// End testimonial js


// google map js


function initialize() {
   var latlng = new google.maps.LatLng(26.912434, 75.787270);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom:17
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div >Aashirwad Farms, Village Gaushala Khedi Shikohpur, Uttarakhand</div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);


// End google map js


// side menu in responsive js

  function menuopen() {
      document.getElementById("sitebar-menu").classList.add('open-menu');
  }

  function menuclose() {
      document.getElementById("sitebar-menu").classList.remove('open-menu');
  }

// End side menu in responsive js