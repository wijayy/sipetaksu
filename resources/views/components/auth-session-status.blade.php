@props(['status'])

@if ($status)
    @php
        $status = 'kami sudah mengirimkan email untuk permintaan reset password. silahkan cek email anda!';
    @endphp
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-mine-100']) }}>
        {{ $status }}
    </div>
@endif
