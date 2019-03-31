$( document ).ready(function() {

    function makeSearch(){

        $('#append-results').empty();

        setTimeout(function(){

            $form = $("#make-search");
            $data = $form.serialize();
            $inputs = $form.find('input, select');
    		$inputs.prop("disabled", true);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr('content')
                },
                type: 'GET',
                url: $form.attr('action'), //Suggested action
                data: $data,
                datatype: 'json',
                success: function (data) {
                    $('.tags-ingredients').select2("close");
                    $('#append-results').append(data.html);
                    window.history.pushState(data, data.title, data.url);
                },
                error: function (error) {
                }
            });

            $inputs.prop("disabled", false);

        }, 500);

    }

    $('#make-search .tags-ingredients').on('select2:select', function (e) {
        makeSearch();
    });

    $('#make-search .tags-ingredients').on('select2:unselect', function (e) {
        makeSearch();
    });

    $('#make-search').on('submit', function (e) {
        e.preventDefault();
        makeSearch();
    });

});



var rangeSlider = function(){
  var slider = $('.range-slider'),
  range = $('.range-slider__range'),
  value = $('.range-slider__value');

  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
};

rangeSlider();
