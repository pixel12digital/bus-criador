@extends('admin.layout')

@section('title')
    {{ __('Editar Segmento') }}
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('Editar Segmento') }}</h3>
                <p class="text-subtitle text-muted">{{ __('Edite as informações do segmento') }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.segments.index') }}">{{ __('Segmentos') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Editar') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Informações do Segmento') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.segments.update', $segment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('Nome do Segmento') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $segment->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                       id="slug" name="slug" value="{{ old('slug', $segment->slug) }}" required>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{ __('URL amigável para o segmento') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="1" {{ old('status', $segment->status) == '1' ? 'selected' : '' }}>{{ __('Ativo') }}</option>
                                    <option value="0" {{ old('status', $segment->status) == '0' ? 'selected' : '' }}>{{ __('Inativo') }}</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serial_number">{{ __('Ordem de Exibição') }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('serial_number') is-invalid @enderror" 
                                       id="serial_number" name="serial_number" value="{{ old('serial_number', $segment->serial_number) }}" required>
                                @error('serial_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Descrição') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3">{{ old('description', $segment->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <h5>{{ __('Seção Hero') }}</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_title">{{ __('Título') }}</label>
                                <input type="text" class="form-control @error('hero_section_title') is-invalid @enderror" 
                                       id="hero_section_title" name="hero_section_title" value="{{ old('hero_section_title', $segment->hero_section_title) }}">
                                @error('hero_section_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_subtitle">{{ __('Subtítulo') }}</label>
                                <input type="text" class="form-control @error('hero_section_subtitle') is-invalid @enderror" 
                                       id="hero_section_subtitle" name="hero_section_subtitle" value="{{ old('hero_section_subtitle', $segment->hero_section_subtitle) }}">
                                @error('hero_section_subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hero_section_text">{{ __('Texto') }}</label>
                        <textarea class="form-control @error('hero_section_text') is-invalid @enderror" 
                                  id="hero_section_text" name="hero_section_text" rows="3">{{ old('hero_section_text', $segment->hero_section_text) }}</textarea>
                        @error('hero_section_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_button_text">{{ __('Texto do Botão Principal') }}</label>
                                <input type="text" class="form-control @error('hero_section_button_text') is-invalid @enderror" 
                                       id="hero_section_button_text" name="hero_section_button_text" value="{{ old('hero_section_button_text', $segment->hero_section_button_text) }}">
                                @error('hero_section_button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_button_url">{{ __('URL do Botão Principal') }}</label>
                                <input type="text" class="form-control @error('hero_section_button_url') is-invalid @enderror" 
                                       id="hero_section_button_url" name="hero_section_button_url" value="{{ old('hero_section_button_url', $segment->hero_section_button_url) }}">
                                @error('hero_section_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_secound_button_text">{{ __('Texto do Botão Secundário') }}</label>
                                <input type="text" class="form-control @error('hero_section_secound_button_text') is-invalid @enderror" 
                                       id="hero_section_secound_button_text" name="hero_section_secound_button_text" value="{{ old('hero_section_secound_button_text', $segment->hero_section_secound_button_text) }}">
                                @error('hero_section_secound_button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_section_secound_button_url">{{ __('URL do Botão Secundário') }}</label>
                                <input type="text" class="form-control @error('hero_section_secound_button_url') is-invalid @enderror" 
                                       id="hero_section_secound_button_url" name="hero_section_secound_button_url" value="{{ old('hero_section_secound_button_url', $segment->hero_section_secound_button_url) }}">
                                @error('hero_section_secound_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>{{ __('Imagens') }}</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_img">{{ __('Imagem Principal') }}</label>
                                @if($segment->hero_img)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/front/img/' . $segment->hero_img) }}" alt="Imagem atual" style="max-width: 200px; max-height: 150px;">
                                        <br><small class="text-muted">{{ __('Imagem atual') }}</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_img') is-invalid @enderror" 
                                       id="hero_img" name="hero_img" accept="image/*">
                                @error('hero_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hero_img2">{{ __('Imagem Secundária 1') }}</label>
                                @if($segment->hero_img2)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/front/img/' . $segment->hero_img2) }}" alt="Imagem atual" style="max-width: 200px; max-height: 150px;">
                                        <br><small class="text-muted">{{ __('Imagem atual') }}</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_img2') is-invalid @enderror" 
                                       id="hero_img2" name="hero_img2" accept="image/*">
                                @error('hero_img2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hero_img3">{{ __('Imagem Secundária 2') }}</label>
                                @if($segment->hero_img3)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/front/img/' . $segment->hero_img3) }}" alt="Imagem atual" style="max-width: 150px; max-height: 100px;">
                                        <br><small class="text-muted">{{ __('Imagem atual') }}</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_img3') is-invalid @enderror" 
                                       id="hero_img3" name="hero_img3" accept="image/*">
                                @error('hero_img3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hero_img4">{{ __('Imagem Secundária 3') }}</label>
                                @if($segment->hero_img4)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/front/img/' . $segment->hero_img4) }}" alt="Imagem atual" style="max-width: 150px; max-height: 100px;">
                                        <br><small class="text-muted">{{ __('Imagem atual') }}</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_img4') is-invalid @enderror" 
                                       id="hero_img4" name="hero_img4" accept="image/*">
                                @error('hero_img4')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hero_img5">{{ __('Imagem Secundária 4') }}</label>
                                @if($segment->hero_img5)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/front/img/' . $segment->hero_img5) }}" alt="Imagem atual" style="max-width: 150px; max-height: 100px;">
                                        <br><small class="text-muted">{{ __('Imagem atual') }}</small>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_img5') is-invalid @enderror" 
                                       id="hero_img5" name="hero_img5" accept="image/*">
                                @error('hero_img5')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>{{ __('Personalização') }}</h5>

                    <div class="form-group">
                        <label for="custom_css">{{ __('CSS Personalizado') }}</label>
                        <textarea class="form-control @error('custom_css') is-invalid @enderror" 
                                  id="custom_css" name="custom_css" rows="5">{{ old('custom_css', $segment->custom_css) }}</textarea>
                        @error('custom_css')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="custom_js">{{ __('JavaScript Personalizado') }}</label>
                        <textarea class="form-control @error('custom_js') is-invalid @enderror" 
                                  id="custom_js" name="custom_js" rows="5">{{ old('custom_js', $segment->custom_js) }}</textarea>
                        @error('custom_js')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Atualizar Segmento') }}
                        </button>
                        <a href="{{ route('admin.segments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> {{ __('Cancelar') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
