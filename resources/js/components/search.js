$( document ).ready(function() {

    $('.tags-ingredients').select2({
        tags: true,
        allowClear: true,
        width: "resolve"
    });

    // $(".addRecipeSelect2").select2({
    //   tags: "true",
    //   theme: 'bootstrap4',
    //   allowClear: true
    // });

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
