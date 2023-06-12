<x-mail::message>
    # An enquiry has been sent to you by {{ $info['name'] }} , {{ $info['email'] }}.

    {{ $info['message'] }}


    Email : {{ $info['email'] }}
    From : {{ config('app.name') }}

</x-mail::message>
