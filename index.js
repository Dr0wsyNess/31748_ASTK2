// $(document).ready(function(){

// })

var carTags = [];
$.ajax({
    url: "cars.json",
    type: "get",
    dataType: "JSON",
    success: function (response) {

    }
});

$("#searchBar").autocomplete({
    source: availableTags,
});