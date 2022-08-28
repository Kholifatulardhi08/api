@component('mail::message')
<img src="{{asset('assets/telkomsigma.jpg')}}" style="width:30%" alt="App Logo">
<br />
<br />

# Hi {{ $name }},

Booking meeting room has been successfully created, these are your booking details:
@component('mail::table')
| | |
| ------------- |-------------|
| Agenda :      | {{ $booking->agenda }} |
| Ruangan :      | {{ $room->name }} ({{ $room->code }})|
| Unit pemakai :      | {{ $unit->name }} ({{ $unit->code }})|
| Tanggal :   | {{ date("d F Y", strtotime(date($booking->start))) }} |
| Pukul :   | {{ date("H:i", strtotime(date($booking->start)))}} - {{ date("H:i", strtotime(date($booking->end))) }} WIB |
| Jumlah orang :   | {{ $booking->person }} |
@endcomponent
@endcomponent

