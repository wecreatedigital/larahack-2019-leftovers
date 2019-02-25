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

    if( $('#recipe_ingredients').val().length
    && $('#recipe_prep_time').val().length
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



});
