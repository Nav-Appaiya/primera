<div class="row marketing">

    <div class="col-lg-12">

        <h3>
            {{--<strong>{{ $user->voorletters }} {{  $user->achternaam }}</strong>--}}
            {{--<small>Betaald met {{ $payment->method }} op {{ date('F d, Y', strtotime($payment->paidDatetime)) }}</small>--}}
        </h3>
        <hr />

        <div>
            <center>
                <h4>Success - je bestelling is betaald en ontvangen!</h4>
                {{--<h5>Order number: #{{ $order->id }}</h5>--}}
                <hr />
        </div>
        </center>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Verzendadres:</strong><br>
                        {{--{{ $user->voornaam }} {{ $user->achternaam }}<br>--}}
                        {{--{{ $user->email }}<br>--}}
{{--                        {{ $user->telMobiel }}<br>--}}
                        {{--{{ $user->adres }}<br>--}}
                        {{--{{ $user->postcode }} {{ $user->woonplaats }}, Nederland--}}
                    </address>

                </div>
                <div class="col-xs-6 text-right">
                    {{--Betaald op <strong>{{ date('F d, Y', strtotime($payment->paidDatetime)) }}</strong> met <strong>{{ $payment->method }}</strong>.--}}
                    {{--<br><i>Rekeninghouder: <strong>{{ $payment->details->consumerName }}</strong></i><br>--}}
                    {{--Rekeningnummer: {{ substr_replace($payment->details->consumerAccount, 'xxx', -5) }}--}}
                    {{--<br>--}}
                    {{--Onder vermelding van: <br>{{ $payment->description }}--}}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><p><span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                            <strong>Je bestelling is betaald en zal binnen 5 werkdagen bij jouw geleverd worden.</strong></p> </center>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Product</strong></td>
                                <td class="text-right"><strong>Beschrijving</strong></td>
                                <td class="text-right"><strong>Aantal</strong></td>
                                <td class="text-right"><strong>Prijs</strong></td>

                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            {{--@foreach($items as $item)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $item->name }}</td>--}}
                                    {{--<td class="text-right">{{ $item->item_info }}</td>--}}
                                    {{--<td class="text-right">{{ $item->quantity }}</td>--}}
                                    {{--<td class="text-right">{{ $item->price }}</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach()--}}
                            <tr class="hidden">
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-right"><strong>Verzendkosten</strong></td>
                                {{--<td class="no-line text-right">{{ '' }}</td>--}}
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-right"><strong>Totaal bedrag</strong></td>
                                {{--<td class="no-line text-right">&euro;{{number_format($total, 2, '.', ',')}}</td>--}}
                            </tr>

                            <tr>
                                {{--<td class="no-line text-right" colspan="2"><strong>Betaling:</strong></td>--}}
                                {{--<td class="no-line text-right" colspan="3">status is {{ $payment->status }} met {{ $payment->method }} op {{ date('F d, Y', strtotime($payment->paidDatetime)) }}</td>--}}
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>