require('./bootstrap');

// window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });



// Jquery code
$(document).ready(function () {

    // var key = 'HjM5IazrxAoZztEZSlruNaZ2aoTR498X';
    var key = 'yNUDSdr4fVsAu1CGpXrd74mh8D8UE2Ze';

    // Chiamata Ajax address Create & Edit

    $('#address').on('blur', function () {
        var addressVal = $('#address').val();
        var url = 'https://api.tomtom.com/search/2/geocode/' + addressVal + '.json';
        $.ajax({
            'url': url,
            'data': {
                'limit': 1,
                'key': key
            },
            'method': 'GET',
            'success': function (data) {
                var results = data.results;
                var lat = results[0].position.lat;
                var lon = results[0].position.lon;
                $('#lat').val(lat);
                $('#lon').val(lon);
            },
            'error': function (request, state, error) {
                // alert('Errore' + error);
            }
        });
    });

    // Chiamata Ajax input Index
    $(document).on('keyup', '#search_input', delay(function () {
        var searchVal = $('#search_input').val();
        if (searchVal.length > 1) {
            var url = 'https://api.tomtom.com/search/2/geocode/' + searchVal + '.json';
            $.ajax({
                'url': url,
                'data': {
                    'limit': 1,
                    'key': key
                },
                'method': 'GET',
                'success': function (data) {
                    var results = data.results;
                    var lat = results[0].position.lat;
                    var lon = results[0].position.lon;
                    $('#lat').val(lat);
                    $('#lon').val(lon);
                },
                'error': function (request, state, error) {
                    // alert('Errore' + error);
                }
            });
        }
    }, 500));



    // Autocomplete

    $(document).on('keyup', '#search_input', delay(function () {
        // alert('ok');
        var searchVal = $('#search_input').val();
        if (searchVal.length > 1) {
            var url = 'https://api.tomtom.com/search/2/geocode/' + searchVal + '.json';
            $.ajax({
                'url': url,
                'data': {
                    'limit': 5,
                    'key': key,
                    'countrySet': 'IT'
                },
                'method': 'GET',
                'success': function (data) {
                    $('#search_autocomplete').html('');
                    var results = data.results;
                    console.log(results);

                    results.forEach(element => {
                        let lat = element.position.lat;
                        let lon = element.position.lon;
                        console.log(lat, lon);
                        var region = element.address.countrySubdivision;
                        var address = element.address.freeformAddress;
                        var autoComplete = address + ', ' + region;
                        $('#search_autocomplete').append(`<li data-lat="${lat}" data-lon="${lon}" class="listElement">${autoComplete}</li>`);
                    });
                },
                'error': function (request, state, error) {
                    // alert('Errore' + error);
                }

            });
        }
    }, 500));

    function delay(fn, ms) {
      let timer = 0
      return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
      }
    }



    // Selezionare un result della lista
    $(document).on('click', '.listElement', function (event) {
        // event.stopPropagation();
        var valInput = $('#search_input').val();
        var elementValue = $(this).html();
        // console.log(elementValue);
        $('#search_input').val(elementValue);
        $('#search_autocomplete').html('');
        if (valInput.length = 0) {
            $('#search_autocomplete').html('');
        }
        let lat = $(this).attr('data-lat');
        let lon = $(this).attr('data-lon');
        $('#lat').val(lat);
        $('#lon').val(lon);
    })

    $(document).on('click', '#search_input', function () {
        $('.listElement').show();
    });

    // $(document).on('click', '#input_search', function (event) {
    //     event.stopPropagation();
    // });

    $('#app').click(function () {
        $('.listElement').hide();
    });



    // Display tomtom map

    if ($('#map').length) {

        var latData = $('.coord').attr('data-lat');
        var lonData = $('.coord').attr('data-lon');
        console.log(latData);

        // Inizialize map
        var map = tt.map({
            key: 'yNUDSdr4fVsAu1CGpXrd74mh8D8UE2Ze',
            container: "map",
            style: "tomtom://vector/1/basic-main",
            center: [lonData, latData],
            zoom: 10
        });
        // Add navigation control
        map.addControl(new tt.NavigationControl());

        // Add a marker for every apartment
        $('.apartment_img').each(function () {
            let lat = $(this).attr('data-lat');
            let lon = $(this).attr('data-lon');
            var marker = new tt.Marker().setLngLat([lon, lat]).addTo(map);
            marker.setPopup(new tt.Popup().setHTML("boh"));
        });
    }




});
