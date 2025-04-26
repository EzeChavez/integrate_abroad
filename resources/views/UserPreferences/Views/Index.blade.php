@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Preferencias de Usuario') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user-preferences.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Theme Selection -->
                        <div class="mb-4">
                            <label class="form-label">{{ __('Tema') }}</label>
                            <div class="btn-group w-100" role="group">
                                @foreach($availableThemes as $theme)
                                    <input type="radio" 
                                           class="btn-check" 
                                           name="theme" 
                                           id="theme_{{ $theme }}" 
                                           value="{{ $theme }}"
                                           {{ $preferences['theme'] === $theme ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="theme_{{ $theme }}">
                                        {{ $theme === 'light' ? __('Claro') : __('Oscuro') }}
                                    </label>
                                @endforeach
                            </div>
                            @error('theme')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Language Selection -->
                        <div class="mb-4">
                            <label class="form-label">{{ __('Idioma') }}</label>
                            <div class="btn-group w-100" role="group">
                                @foreach($availableLanguages as $lang)
                                    <input type="radio" 
                                           class="btn-check" 
                                           name="language" 
                                           id="lang_{{ $lang }}" 
                                           value="{{ $lang }}"
                                           {{ $preferences['language'] === $lang ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="lang_{{ $lang }}">
                                        {{ $lang === 'es' ? 'Español' : 'English' }}
                                    </label>
                                @endforeach
                            </div>
                            @error('language')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar Cambios') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 