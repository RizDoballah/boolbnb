require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});



// Jquery code


$(document).ready(function() {

  $('#address').on('blur', function() {

    var addressVal =  $('#address').val();

    var url = 'https://api.tomtom.com/search/2/geocode/' + addressVal + '.json?key=HjM5IazrxAoZztEZSlruNaZ2aoTR498X';
    $.ajax({
      'url': url,
      'data': {'limit':1},
      'method': 'GET',
      'success': function(data) {
        // console.log(data);
        var results = data.results;
        // console.log(results[0].position.lat);
        var lat = results[0].position.lat;
        var lon = results[0].position.lon;
        // console.log(lat, lon);

        $('#lat').val(lat);
        $('#lon').val(lon);


      },
      'error': function(request, state, error) {
        alert('Errore' + error);
      }
    });
  });
});
