// $(document).ready(function () {
//     var carTags = [];
//     $.ajax({
//         url: "car_display.php",
//         type: "get",
//         // data: { term: term },
//         dataType: "JSON",
//         success: function (response) {
//             for (var i = 0; i < response.length; i++) {
//                 carTags.push(response[i].carType);
//                 carTags.push(response[i].brand);
//                 carTags.push(response[i].carModel);
//                 carTags.push(response[i].description);
                
//             }
//         },
//     });

//     //use the id tag to autocomplete the search bar from the suggestions in carTags
//     $("#searchBar").autocomplete({
//         source: carTags,
//     });

//     // $("#searchBar").on("keyup", function () {
//     //     var searchedValue = $(this).val().toLowerCase();

//     // })
// });


