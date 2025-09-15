@extends('user-front.layout')

@section('tab-title')
    Entrar
@endsection
@section('meta-description', !empty($userSeo) ? $userSeo->meta_description_login : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->meta_keyword_login : '')

@section('page-name')
    Entrar
@endsection
@section('br-name')
    Entrar
@endsection

@section('content')

    <!--====== SING IN PART START ======-->
    <div class="user-area-section section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="user-form">
                        <div class="title mb-3">
                            <h4>
                                Entrar
                            </h4>
                        </div>
                        <form action="{{ route('customer.login_submit', getParam()) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="form_group">
                                <label>Email *</label>
                                <input type="email" placeholder="Digite seu Email"
                                    class="form_control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form_group">
                                <label>Senha *</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                    placeholder="Digite sua Senha">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form_group form_inline">
                                <div>
                                    {{-- <input type="checkbox" name="checkbox1" id="checkbox1"> --}}
                                    <label for="checkbox1"></label>
                                    {{-- <label class="cursor-pointer"
                                        for="checkbox1"><span></span>{{ $keywords['Remember_Me'] ?? 'Remember Me' }}</label> --}}
                                </div>
                                <a
                                    href="{{ route('customer.forget_password', getParam()) }}">Esqueceu sua senha?</a>
                            </div>
                            <div class="form_group">
                                @if ($userBs->is_recaptcha == 1)
                                    <div class="d-block mb-4">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            @php
                                                $errmsg = $errors->first('g-recaptcha-response');
                                            @endphp
                                            <p class="text-danger mb-0 mt-2">{{ __("$errmsg") }}</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="form_group">
                                <button type="submit"
                                    class="btn">ENTRAR AGORA</button>
                            </div>
                            <div class="new-user text-center">
                                <p class="text">Novo usuário? <a
                                        href="{{ route('customer.signup', getParam()) }}">Não tem uma conta?</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== SING IN PART ENDS ======-->
@endsection
