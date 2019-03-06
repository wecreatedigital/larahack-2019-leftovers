$( document ).ready(function() {

    // Dynamic Steps adding
    $(document).on('click', '.addNewRecipeStep', function(e)
    {
        e.preventDefault();

        var controlForm = $('form'),
        currentEntry = $(this).parents('.entry:first'),
        newEntry = $(currentEntry.clone()).appendTo('#recipe_steps');

        // Count number of Steps so far
        var matches = 0;
        $(".recipeStep").each(function(i, val) {
            matches++;
        });

        newEntry.find('textarea').val('');
        newEntry.find('label').closest('.stepLabel').text('Step '+ matches);

        controlForm.find('.entry:not(:last) .addNewRecipeStep')
        .removeClass('addNewRecipeStep').addClass('removeNewRecipeStep')
        .removeClass('btn-success').addClass('btn-danger')
        .html('<i class="fas fa-minus-circle"></i>');
    });

    // Dynamic Steps removing
    $(document).on('click', '.removeNewRecipeStep', function(e)
    {
        e.preventDefault();

        // Remove Recipe step
        $(this).parents('.entry:first').remove();

        // Reset Steps from 1
        var matches = 1;
        $(".stepLabel").each(function(index, currentElement) {
            $(currentElement).text('Step '+ matches);
            matches++;
        });

        return false;
    });

    // Add Ingredient to Array
    $(document).on('click', '#addInredientToSelect', function(e)
    {
        $ingredient_name = $("#ingredient_name").find(":selected").text();
        $ingredient_id = $("#ingredient_name").find(":selected").val();
        $ingredient_amount = $("#ingredient_amount").val();
        $ingredient_unit = $("#ingredient_unit").find(":selected").val();

        $recipesIngredientVal = $ingredient_id + '|' + $ingredient_amount + '|' + $ingredient_unit;
        $recipesIngredientText = $ingredient_name + ' ' + $ingredient_amount + ' ' + $ingredient_unit;

        // If User has already added option
        if ($('#recipeIngredients option[value="' +$recipesIngredientVal+ '"]').length) {
            toastr.success('Ingredient already added!', 'Success Alert', {timeOut: 5000});
            return false;
        }

        // Append it to the select
        var newOption = new Option($recipesIngredientText, $recipesIngredientVal, true, true);
        $('#recipeIngredients').append(newOption);

        $('#recipesIngredientBadges').append('<button type="button" class="btn btn-sm btn-primary m-1 removeRecipeIngredient" data-recipe-ingredient="'+ $recipesIngredientVal +'">'+ $recipesIngredientText +' <i class="fas fa-times"></i></button>');

    });

    // Remove Ingredient from Select array
    $(document).on('click', '.removeRecipeIngredient', function(e)
    {
        $recipesIngredientVal = $(this).attr('data-recipe-ingredient');

        jQuery("#recipeIngredients option").filter(function(){
            return $.trim($(this).val()) == $recipesIngredientVal;
        }).remove();

        $(this).remove();
    });


    toggleVisibilityOfTabControls();
    toggleTabsUsingControls();
    updateInputProgress();

    // Change File Input to match current filename
    $(document).on('change', '#validateFeatureImage', function(e)
    {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);

    });



    // Toggle the visibility of the recipe tab stages using tab Controls
    function toggleTabsUsingControls(){

        var i, items = $('.addRecipeTabControl'), pane = $('.tab-pane');

        // next
        $('.nexttab').on('click', function(){

            for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                    break;
                }
            }
            if(i < items.length - 1){
                // for tab
                $(items[i]).removeClass('active');
                $(items[i+1]).addClass('active');
                // for pane
                $(pane[i]).removeClass('show active');
                $(pane[i+1]).addClass('show active');
            }
            toggleVisibilityOfTabControls();
            updateInputProgress();

        });

        // Prev
        $('.prevtab').on('click', function(){

            for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                    break;
                }
            }
            if(i != 0){
                // for tab
                $(items[i]).removeClass('active');
                $(items[i-1]).addClass('active');
                // for pane
                $(pane[i]).removeClass('show active');
                $(pane[i-1]).addClass('show active');
            }
            toggleVisibilityOfTabControls();
            updateInputProgress();
        });
    }

    // Toggle the visibility of the recipe tab stages
    function toggleVisibilityOfTabControls()
    {
        if (!$('#image-tab').hasClass('show') || !$('#image-tab').hasClass('active') ) {
            $('.nexttab').removeClass('d-none');
        } else {
            $('.nexttab').addClass('d-none');
        }

        if (!$('#basic-info-tab').hasClass('show') || !$('#basic-info-tab').hasClass('active') ) {
            $('.prevtab').removeClass('d-none');
        } else {
            $('.prevtab').addClass('d-none');
        }
    }

    // Give the User Feedback on how long they have left until the Form
    // has been completed.
    function updateInputProgress()
    {
        if ( $('#basic-info-tab').hasClass('show') || $('#basic-info-tab').hasClass('active') ) {
            $("#progress-inputs .progress-bar").attr("aria-valuenow", '25%').width('25%').find(".sr-only").html('Stage 1');
        } else if ( $('#ingredients-tab').hasClass('show') || $('#ingredients-tab').hasClass('active') ) {
            $("#progress-inputs .progress-bar").attr("aria-valuenow", '50%').width('50%').find(".sr-only").html('Stage 2');
        } else if ( $('#method-tab').hasClass('show') || $('#method-tab').hasClass('active') ) {
            $("#progress-inputs .progress-bar").attr("aria-valuenow", '75%').width('75%').find(".sr-only").html('Stage 3');
        } else {
            $("#progress-inputs .progress-bar").attr("aria-valuenow", '100%').width('100%').find(".sr-only").html('Stage 4');
        }
    }



});
