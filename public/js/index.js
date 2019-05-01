
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    if (screen.width >= 768) {
        document.getElementById("mySidenav").style.width = "350px";
    }
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function openProfile() {
    document.getElementById("profile-sidebar").style.width = "250px";
    if (screen.width >= 768) {
        document.getElementById("profile-sidebar").style.width = "0";
    }
}
function closeProfile() {
    document.getElementById("profile-sidebar").style.width = "0";
}

$.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });


// const searchAjax = (searchVal = '') => {
//     $.ajax({
//         type: 'GET',
//         url: '/search',
//         dataType: 'json',
//         data: { 'searchVal': searchVal },
//         success: function (data) {
//             $('#results').html(data.data);

//             let slug = data.slug.map(function (e) {
//                 return data[e];
//             })
//             console.log(slug)
//             $('.searchLinks').each(function (index) {
//                 $location = "{{url('')}}"
//                 $(this).attr("href", window.location.origin + '/search/' + slug);
//             })
//         },
//         error: function (data) {
//             console.log(data)
//         }
//     })
// }
// $('#search').keyup(function () {
//     var searchVal = $(this).val();
//     if (searchVal == '') {
//         $('#results').empty();
//     }
//     searchAjax(searchVal)
// })


// algolia 
var client = algoliasearch("Q716B4W30P", "125d51cdc595a5d478233698beab1401")
var products = client.initIndex('products');
(function () {
    autocomplete('#aa-search-input', {}, [
        {
            source: autocomplete.sources.hits(products, { hitsPerPage: 10 }),
            displayKey: 'name',
            templates: {
                header: '<div class="aa-suggestions-category">Products</div>',
                suggestion: function (suggestion) {
                    return '<span>' +
                        suggestion._highlightResult.title.value + '</span>';
                },
                empty: function(result){
                    return "There are no results for " + result.query + "*"
                }
            }
        }, 
    ]).on('autocomplete:selected', function (event, suggestion, dataset) {
        window.location.href = window.location.origin + '/search/' + suggestion.slug;
    });    
})();
