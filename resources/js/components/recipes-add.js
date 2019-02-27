$( document ).ready(function() {

  // On Change Recipe stage 1
  $(document).on('input', '.addRecipeStage1', function(e) {

    e.preventDefault();

    if( $('#recipe_title').val().length && $('#recipe_description').val().length )
    {
      $('#addRecipeStage2Control').fadeIn( "slow" );
    } else {
      $('#addRecipeStage2Control').fadeOut( "slow" );
    }

  });

  // On Change Recipe stage 2
  $(document).on('input', '.addRecipeStage2', function(e) {

    e.preventDefault();

    if( $('#recipe_prep_time').val().length
    && $('#recipe_cook_time').val().length )
    {
      $('#addRecipeStage3Control').fadeIn( "slow" );
    } else {
      $('#addRecipeStage3Control').fadeOut( "slow" );
    }

  });

  // On Change Recipe stage 3
  $(document).on('input', '.addRecipeStage3', function(e) {

    e.preventDefault();

    if( $(this).val().length ) {
      $('#addRecipeStage4Control').fadeIn( "slow" );
      $('#addRecipeStage4Control').fadeIn( "slow" );


    } else {
      $('#addRecipeStage4Control').fadeOut( "slow" );
    }

  });


  // Dynamic Steps adding
  $(document).on('click', '.btn-add', function(e)
  {
    e.preventDefault();

    var controlForm = $('form'),
    currentEntry = $(this).parents('.entry:first'),
    newEntry = $(currentEntry.clone()).appendTo('#recipe_steps');

    // Count number of Steps so far
    var matches = 0;
    $(".addRecipeStage3").each(function(i, val) {
      matches++;
    });

    newEntry.find('textarea').val('');
    newEntry.find('label').closest('.stepLabel').text('Step '+ matches);

    controlForm.find('.entry:not(:last) .btn-add')
    .removeClass('btn-add').addClass('btn-remove')
    .removeClass('btn-success').addClass('btn-danger')
    .html('<i class="fas fa-minus-circle"></i>');
  }).on('click', '.btn-remove', function(e)
  {
    $(this).parents('.entry:first').remove();

    e.preventDefault();

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
      toastr.success('Already added ingredient!', 'Success Alert', {timeOut: 5000});
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



// postNewRecipe




});
