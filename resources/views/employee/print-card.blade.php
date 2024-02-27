
<div class="card-print">
    <img class="img" src="{{ $cardData['photo'] }}">
    <p class="name">{{ $cardData['name'] }}</p>
    <div class="body" style="color:white">
        <p>{{ $cardData['card_No'] }}</p>
        <p>{{ $cardData['name'] }}</p>
        <p>{{ $cardData['create_date'] }}</p>
    </div>
    <div class="qr">
        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($cardData['id'], 'C128', 1.5) }}" alt="barcode" />
    </div>
</div>
