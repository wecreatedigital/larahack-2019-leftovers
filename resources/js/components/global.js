
  $(".tags-ingredients").select2({
    tags: true,
    theme: "bootstrap",
    width: 'resolve'
  });

  $(".select2").select2({
    tags: true,
    theme: "bootstrap",
    width: 'resolve'
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });


$('.card-recipe').hover(function() {
  $(this).find('.favourite').fadeIn(200);
},
function(){
  $(this).find('.favourite').fadeOut(200);
});


$('.click').click(function() {
	if ($('span').hasClass("fas")) {
			$('.click').removeClass('active')
		setTimeout(function() {
			$('.click').removeClass('active-2')
		}, 30)
			$('.click').removeClass('active-3')
		setTimeout(function() {
			$('span').addClass('far').removeClass('fas')
		}, 15)
	} else {
		$('.click').addClass('active')
		$('.click').addClass('active-2')
		setTimeout(function() {
			$('span').addClass('fas').removeClass('far')
		}, 150)
		setTimeout(function() {
			$('.click').addClass('active-3')
		}, 150)
		setTimeout(function(){
		},1000)
	}
})
