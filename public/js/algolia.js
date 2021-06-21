(function() {
    var client = algoliasearch('QYMBZHS36T', '86b911d503a5b88befa306ae31a721a9');
    var index = client.initIndex('products');
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'title',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function (suggestion) {
                    const route = "/proizvodi/" + suggestion._highlightResult.id.value;

                    const markup = `
                        <a class="algolia-result" href="`+ route + `">
                            <span>
                                ${suggestion._highlightResult.title.value}
                            </span>
                            <span>${(suggestion.price)}</span>
                        </div>
                        <div class="algolia-details">
                           
                        </a>
                    `;

                    return markup;
                },
                empty: function (result) {
                    return 'Žao nam je,traženi unos nije nađen "' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            enterPressed = true;
        }).on('keyup', function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                //window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input').value;
            }
        });
})();