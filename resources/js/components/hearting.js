$(document).on('click', '.heart', function(e) {
  e.preventDefault();
  $(this).toggleClass("is-active");

  $recipe_slug = $(this).attr('data-recipe-slug');

  if ($(this).hasClass('is-active')) {
    $boolean = 'true';
  } else {
    $boolean = 'false';
  }

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: '/recipes/'+$recipe_slug+'/liking-recipe',
    data: {
      '_token': $('input[name=_token]').val(),
      'boolean': $boolean,
    },
    datatype: 'json',
    success: function(data) {

      if ($(this).hasClass('is-active')) {
        $('.likes-count').html(parseInt($('.likes-count').html(), 10)+1)

        if ($('.likes-count').html() <= 1) {
          $('.likes-title').text('Like');
        } else {
          $('.likes-title').text('Likes');
        }
      } else {
        $('.likes-count').html(parseInt($('.likes-count').html(), 10)-1)

        if ($('.likes-count').html() <= 1) {
          $('.likes-title').text('Like');
        } else {
          $('.likes-title').text('Likes');
        }
      }

    }
  });
});
