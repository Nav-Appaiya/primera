<div class="row marketing">

    <div class="container">

        <div class="col-lg-12">
            <center>
                <h4>Uw bestelling volgen!</h4>
                <h5>Bestelling: #{{ $order->id }}</h5>
                <p>
                    Beste {{ $order->name }},
                    <br><br>

                    Uw pakket is verzonden met PostNL. Hierbij ontvangt u de <a href="https://jouw.postnl.nl/#!/track-en-trace/{{$order->track_trace}}/NL/{{$order->postcode}}">Track & Trace</a> code van uw pakket bij www.esigareteindhoven.com.</p>

                    Kunt u niet op de link klikken? Kopieer en plak dan dit adres in uw favoriete browser:
                    https://jouw.postnl.nl/#!/track-en-trace/{{$order->track_trace}}/NL/{{$order->postcode}}
                    <br>
                    <br>

                    Gelieve niet te reageren op deze automatische mail. Vragen kunt u sturen naar info@esigareteindhoven.com.
                    <br>
                    <br>
                    Met vriendelijke groet,<br>
                    Esigaret Eindhoven
                <p>
            </center>

        </div>
    </div>

</div>