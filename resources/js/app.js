require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});



// Jquery code
$(document).ready(function () {

    var key = 'HjM5IazrxAoZztEZSlruNaZ2aoTR498X';

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
                alert('Errore' + error);
            }
        });
    });

    // Chiamata Ajax input Index




    $(document).on('keyup', '#search_input', function () {
        var searchVal = $('#search_input').val();
        if (searchVal.length >= 3) {
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
                    console.log(lat);
                    console.log(lon);
                },
                'error': function (request, state, error) {
                    alert('Errore' + error);
                }
            });
        }
    });


    // Display tomtom map

    // var latValue = $('#latValue').text();
    // var lonValue = $('#lonValue').text();

    var latData = $('.apartment_img').first().attr('data-lat');
    var lonData = $('.apartment_img').first().attr('data-lon');
    console.log(latData);
    console.log(lonData);

            var map = tt.map({
            key: "yNUDSdr4fVsAu1CGpXrd74mh8D8UE2Ze",
            container: "map",
            style: "tomtom://vector/1/basic-main",
            center: [lonData, latData],
            zoom: 10
        });
        map.addControl(new tt.NavigationControl());

        $('.apartment_img').each(function() {

            let lat = $(this).attr('data-lat');
            let lon = $(this).attr('data-lon');

            var marker = new tt.Marker().setLngLat([lon, lat]).addTo(map);
            marker.setPopup(new tt.Popup().setHTML("boh"));
            
           


            // $.each(this.attributes, function() {
            //   // this.attributes is not a plain object, but an array
            //   // of attribute nodes, which contain both the name and value
            //   if(this.specified) {
            //     console.log(this.name, this.value);
            //   }
            // });
          });


   



});
