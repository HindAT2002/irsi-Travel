@extends('layouts.layoutregister')

@section('title')
    regestration
@endsection

@section('form')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
    </div>

    <div>
        <label for="phone">{{ __('Phone') }}</label>
        <input id="phone" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone">
    </div>

    <div>
        <label for="adress">{{ __('Adress') }}</label>
        <input id="adress" type="text" name="adress" :value="old('adress')" required autofocus autocomplete="adress">
    </div>

    <div>
        <label for="email">{{ __('Email') }}</label>
        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username">
    </div>

    <div>
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
    </div>

    <div>
        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div>
            <label for="terms">
                <input type="checkbox" name="terms" id="terms" required>
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                ]) !!}
            </label>
        </div>
    @endif

    <div>
        <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        <button type="submit">{{ __('Register') }}</button>
    </div>
</form>
@endsection
