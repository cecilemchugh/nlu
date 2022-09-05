$(document).ready(function () {
    /* When the quote submit button is clicked, use AJAX to send the quote data to the server to be saved. */
    $("#quotesubmit").click(function(){
        /* Name and Email are required */
        let $name = $("#name").val();
        let $email = $("#email").val();
        if (($name.length === 0) || ($email.length === 0)) {
             alert("Name and Email are required.");
        }
        else {
            let formData = {
                name: $name,
                email: $email,
                capability:  $("#capability").val(),
                comments: $("#comments").val()
            };

            /* If newsletter checkbox is checked, send value. */
            if ($("#newsletter").is(':checked'))
                formData['newsletter'] = true;

            /* Send the data for the quote request to the server to be saved. */
            $.ajax({
                type: "POST",
                url: "savequote.php",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(data){
                    $('#name').val('');
                    $('#email').val('');
                    $("#capability").val([0]);
                    var valToSelect = "0";
                    $("#capability option[value='" + valToSelect + "']").attr("selected", "selected");
                    $('#comments').val('');
                    $("#newsletter").prop("checked", false);
                    alert("Thank you for your interest in obtaining a quote. We will be in touch very soon!");
                },
                error: function(xhr, desc, err){
                    console.log(err);
                    alert(err); 
                    alert(desc); 
                }
            });
        }
    });
});

/* Go to the passed URL. */
function goto(page) {
    window.location = page;
}

/* Go to the category page for the passed category name. */
function gotoCategory(categoryName) {
    const url = "flavorsincategory.php?category_name=" + categoryName;
    goto(url);
}

/* Go to the flavor page for the passed flavor name - not yet implemented. */
function gotoFlavor(flavorName) {
    const msg = 'flavor/' + flavorName  + ' page not yet implemented';
    alert(msg);
}