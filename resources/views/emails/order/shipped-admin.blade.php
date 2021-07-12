@component('mail::message')
# Nova narudžba

Imate novu narudžbu od {{ $first_name }}.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/order/' .$orderId, 'color' => 'success'])
Detalji
@endcomponent

@endcomponent
