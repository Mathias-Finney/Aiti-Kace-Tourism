<x-mail::message>
    # Hello {{ $user['username'] }},
    

<x-mail::panel>
@component('mail::button',['url' => url('verify/'.$token)])
    Verify
@endcomponent


        
</x-mail::panel>

    # In case you have an issue please contact us.


</x-mail::message>