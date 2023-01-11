$('.gallery ul li a').click(function () {
    var itemID = $(this).attr('href');
    $('.gallery ul').addClass('item_open');
    $(itemID).addClass('item_open');
    $('.descriptionimg').find('img').show();
    return false;
  });
  $('.close').click(function () {
    $('.descriptionimg').find('img').hide();
    $('.port, .gallery ul').removeClass('item_open');
    return false;
  });
  
  $(".gallery ul li a").click(function () {

    $('html, body').animate({
      scrollTop: parseInt($("#top").offset().top) },
    400);
  });