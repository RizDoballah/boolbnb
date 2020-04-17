require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});



// Jquery code
$(document).ready(function() {

  var key = 'HjM5IazrxAoZztEZSlruNaZ2aoTR498X';

  // Chiamata Ajax address Create & Edit

  $('#address').on('blur', function() {
    var addressVal =  $('#address').val();
    var url = 'https://api.tomtom.com/search/2/geocode/' + addressVal + '.json';
    $.ajax({
      'url': url,
      'data': {
        'limit':1,
        'key': key
      },
      'method': 'GET',
      'success': function(data) {
        var results = data.results;
        var lat = results[0].position.lat;
        var lon = results[0].position.lon;
        $('#lat').val(lat);
        $('#lon').val(lon);
      },
      'error': function(request, state, error) {
        alert('Errore' + error);
      }
    });
  });

  // Chiamata Ajax input Index

  $(document).on('keyup', '#search_input', function() {
    var searchVal =  $('#search_input').val();
    console.log(searchVal);
    var url = 'https://api.tomtom.com/search/2/geocode/' + searchVal + '.json';
    console.log(url);

    $.ajax({
      'url': url,
      'data': {
        'limit':1,
        'key': key
      },
      'method': 'GET',
      'success': function(data) {
        console.log(data);

        var results = data.results;
        var lat = results[0].position.lat;
        var lon = results[0].position.lon;
        $('#lat').val(lat);
        $('#lon').val(lon);
      },
      'error': function(request, state, error) {
        alert('Errore' + error);
      }
    });
  });





});
