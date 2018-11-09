function ajaxLoad(filename) {
if(ajaxLoad.isLoaded != true) {
          $('.loading').show();
          $.ajax({
              type: "GET",
              url: filename,
              dataType: false,
              success: function (data) {
                console.log(data);
                //  $('.loading').hide(); 
                //  $('body').empty();
                 
                  $('body').html(data);
                  $('.loading').hide();
              },
              error: function (xhr, status, error) {
                  alert(xhr.responseText);
              }
          });
  }
    ajaxLoad.isLoaded = true;
}

$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    ajaxLoad($(this).attr('href'));
});

routie('*', function () {
    var url = window.location.href;
    var p = url.indexOf('#');
    if (p > -1) {
        var controllerAction = url.substr(url.indexOf('#') + 1);
        var pos = controllerAction.indexOf('*');
        var menu = controllerAction;
        if (pos > -1)
            menu = controllerAction.substr(0, pos);
        activeMenu("nav_" + menu.replace('/', '_'));
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        ajaxLoad(controllerAction.replace('*', '/'));
    } else {
        activeMenu("nav_home");
        ajaxLoad('home');
    }
});
function activeMenu(nav) {
    $('.nav li.active').removeClass('active');
    $(".nav ." + nav).addClass('active');
}



function Refresh(){
    document.location.reload();
}

