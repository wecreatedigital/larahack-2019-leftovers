function updateInputProgress(){
    var filledFields = 0;
    var totalFields = 0;

    $("#addRecipeForm").find("input, select, textarea").each(function(){

        if ($(this).hasClass('recipeStep')) {
            totalFields = 1;
        } else if ($(this).hasClass('trackProgress')) {
            totalFields++;
        } else {
            totalFields++;
        }

        if ($(this).val() != "" && $(this).hasClass('recipeStep')) {
            filledFields = 1;
        } else if ($(this).val() != "" && $(this).hasClass('trackProgress')) {
            filledFields++;
        } else {
            filledFields++;
        }
    });

    var percent = Math.ceil(100 * filledFields / totalFields);
    $("#progress-inputs .progress-bar").attr("aria-valuenow", percent).width(percent + "%").find(".sr-only").html(percent + "% Complete");

    return percent;
}
