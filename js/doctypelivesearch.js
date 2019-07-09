function doctypesearch(text) {
    var name = text.value;
    if (name == "") {
        $(".display").html("");
    }
    else {
        $.ajax({
        type: "POST",
        url: "../engine/searchDocType.php",
        data: {
            search: name
            },
        success: function(html) {
            $(".display").last().html(html).show();
            }
        });
    }
};

function fill(Value) {
    $('.doctype').last().val(Value);
    $('.display').hide();

    var docSelect = $('.doctype').last().val();
    //console.log(docSelect);
    $.ajax({
        type: "POST",
        url: "../engine/searchDocPrice.php",
        data: {
            docname: docSelect
        },
        success: function(response){ $('.docprice').last().val(response);}
    });    
        
}