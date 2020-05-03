require('./bootstrap');


$('.collapse').collapse();


// Jquery code
$(document).ready(function () {

  // Plus minus counter input
  $(document).on('click', '.up_count', function () {
     $(this).prev().val(+$(this).prev().val() + 1);
  });
  $(document).on('click', '.down_count', function () {
     if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
  });

  // Carica foto input
  $("#file-upload").change(function(){
    $("#file-name").text(this.files[0].name);
  });


    // var key = 'HjM5IazrxAoZztEZSlruNaZ2aoTR498X';
    var key = 'yNUDSdr4fVsAu1CGpXrd74mh8D8UE2Ze';
    // var key = 'LbMZ7czn7WGWFrpGsjzcCu1JmYZLiH0Q';
    // A8p4RHYLPVFkmdSk3a0acLxVQKvCJNzhIs

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
                var city = results[0].address.municipality;
                $('#lat').val(lat);
                $('#lon').val(lon);
                $('#city_address').val(city);
            },
            'error': function (request, state, error) {
                alert('Errore' + error);
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
                    $('#city').text(searchVal);

                    var results = data.results;
                    var lat = results[0].position.lat;
                    var lon = results[0].position.lon;
                    var city = results[0].address.municipality;
                    $('#lat').val(lat);
                    $('#lon').val(lon);
                    $('#city').val(city);

                },
                'error': function (request, state, error) {
                    // alert('Errore' + error);
                }
            });
        }
    }, 300));


    // Autocomplete

    $(document).on('keyup', '#search_input', delay(function () {
        // alert('ok');
        var searchVal = $('#search_input').val();
        if (searchVal.length >= 1) {
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

                    results.forEach(element => {
                        let lat = element.position.lat;
                        let lon = element.position.lon;
                        let city = element.address.municipality;
                        var region = element.address.countrySubdivision;
                        var address = element.address.freeformAddress;
                        var autoComplete = address + ', ' + region;
                        
                        $('#search_autocomplete').append(`<li data-lat="${lat}" data-lon="${lon}" data-city="${city}" class="listElement"><i class="fas fa-map-marker-alt mr-2"></i> <span class="autocompleteVal">${autoComplete}</span></li>`);
                        if ($('#search_input') == '') {
                            $('#search_autocomplete').hide();
                        }
                    });
                },
                'error': function (request, state, error) {
                    alert('Errore' + error);
                }

            });
        }
    }, 300));

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
        var elementValue = $(this).find('.autocompleteVal').html();
        $('#search_input').val(elementValue);
        $('#search_autocomplete').hide();
        if (valInput.length = 0) {
            $('#search_autocomplete').html('');
        }
        let lat = $(this).attr('data-lat');
        let lon = $(this).attr('data-lon');
        let city = $(this).attr('data-city');
        $('#lat').val(lat);
        $('#lon').val(lon);
        $('#city').val(city);
    });

    $(document).on('click', '#search_input', function () {
        $('.listElement').show();
        $('#search_autocomplete').show();
    });


    $('#app').click(function () {
        $('.listElement').hide();
    });



    // Display tomtom map

    if ($('#map').length) {

        var latData = $('.coord').attr('data-lat');
        var lonData = $('.coord').attr('data-lon');

        // Inizialize map
        var map = tt.map({
            key: key,
            container: "map",
            style: "tomtom://vector/1/basic-main",
            center: [lonData, latData],
            zoom: 8
        });
        // Add navigation control
        map.addControl(new tt.NavigationControl());

        // Add a marker for every apartment
        $('.addPin').each(function () {
            let lat = $(this).attr('data-lat');
            let lon = $(this).attr('data-lon');
            let title = $(this).parent().parent().parent().children('.col-7').find('h4').html();
            let image = $(this).attr('src');
            var element = document.createElement('i');
            element.class = 'fas fa-home';
            $(element).addClass('fas fa-home');
            
            
            var marker = new tt.Marker({element: element}).setLngLat([lon, lat]).addTo(map);
            marker.setPopup(new tt.Popup().setHTML('<img class="w-100" src="' + image + '" alt="">' + title + ''));
        })
    }

    // Slider km
    if ($('#distanza_km').length) {
        var slider = document.getElementById("km");
        var output = document.getElementById("distanza_km");
        output.innerHTML = slider.value;
        slider.oninput = function() {
        output.innerHTML = this.value;
        }
    }


    // Invio messaggio

    $('#send').on('click', function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var body = $('#body').val();
        var id = $('#id-apt').val();
        var url =  window.location.protocol + '//' + window.location.host + "/api/sendmessage";

        $.ajax({
            'url': url,
            'method': 'POST',
            'data': {
                '_token': $("#csrf").val(),
                'name': name,
                'email': email,
                'body': body,
                'apartment_id': id
            },
            'success': function(message){

                if(message.sent) {
                    $('#modal').html('Il messaggio è stato inviato');
                    $('#send').hide();
                } else {
                    $('#errors').html('Tutti i campi devono essere compilati');
                }
            },
            'error': function(error,state){
                console.log(error);
            }
        });
    });

    // Scroll navbar backround
    $(function () {
        $(document).scroll(function () {
          var $nav = $(".navbar-expand");
          $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height() );
        });
      });


      // Sponsorships index getId

      $(document).on('click', '.sponsorship', function() {
        var apartmentId = $(this).siblings('h6').attr('data-id');
        $('#aptId').val(apartmentId);
      })


    //   Rounds distance apartment search page
      $('.dist_km').each(function() {
        var distKm = $(this).html();
        var dist = parseInt(distKm).toFixed();
        $(this).html(dist);
    });

});
