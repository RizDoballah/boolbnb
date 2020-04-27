<!doctype html>
<html lang='{{ app()->getLocale() }}'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Braintree-Demo</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js'></script>
    <link href="{{ asset('css/app.css') }}" rel='stylesheet'>
</head>
@include('layouts.partials._menu')

<body>
    <div class='container mt-5'>
        <div class='row pt-5'>
            <div class='col-md-6' id="container_checkout">
                <div id="checkout-message"></div>
                <div id='dropin-container'></div>
                <button id='submit-button'>Paga</button>
            </div>
            <div class="col-md-6" id="order_summary">
              <h4 class="mt-5">Riepilogo ordine</h4>
              <h5>Sponsorizza il tuo alloggio per {{$duration}} ore</h5>
              <h6>Totale: €{{$price}}</h6>
            </div>
        </div>
    </div>
    <script>
        // // braintree-heading 
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
                authorization: 'sandbox_ndtvsb9p_2rx4vw7qxr2bfrhc',
                container: '#dropin-container'
            },
            function (createErr, instance) {
                button.addEventListener('click', function () {
                    $('#submit-button').hide();
                    $('#order_summary').hide();
                    instance.requestPaymentMethod(function (err, payload) {
                        $.get('{{ route('payment.process', $price)}}', {payload}, function (response) {
                                if (response.success) {
                                    console.log(response.transaction.amount);
                                    $('#container_checkout').append('<div class = "alert alert-success">Il tuo pagamento è andato a buon fine</div>');

                                    saveSponsorship();

                                    // Redirect
                                    // setTimeout(function() {
                                    //     window.location.href = "{{ route('sponsorships.index')}}";
                                    // }, 3000);

                                } else {
                                    alert('Payment failed');
                                    $('#container_checkout').append('<div class = "alert alert-danger">Pagamento non effettuato</div>');
                                    $('#order_summary').show();
                                }
                            },'json');
                    });
                });
            });

            function saveSponsorship() {
                $.ajax({
                    'url': '{{ route('payment.done', $price)}}',
                    'method': 'GET',
                    'success': function (data) {
                        console.log(data);
                    },
                    'error': function (request, state, error) {
                        alert('Errore' + error);
                    }
                });
            }    

    </script>
</body>

</html>
