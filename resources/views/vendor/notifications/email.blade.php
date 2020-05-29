@component('mail::message')

{{ $greeting }}

@lang(
    "To enable your account, please click in the following link or copy it into the address bar of your favorite browser.\n\n".
    '[:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)

@endcomponent
