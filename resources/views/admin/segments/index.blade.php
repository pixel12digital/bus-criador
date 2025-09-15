@extends('admin.layout')

@section('title')
    {{ __('Gerenciar Segmentos') }}
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('Segmentos') }}</h3>
                <p class="text-subtitle text-muted">{{ __('Gerencie os segmentos da home page') }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Segmentos') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Lista de Segmentos') }}</h4>
                <a href="{{ route('admin.segments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> {{ __('Novo Segmento') }}
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Ordem') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($segments as $segment)
                                <tr>
                                    <td>{{ $segment->name }}</td>
                                    <td>
                                        <code>{{ $segment->slug }}</code>
                                    </td>
                                    <td>
                                        @if($segment->status == 1)
                                            <span class="badge bg-success">{{ __('Ativo') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('Inativo') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $segment->serial_number }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.segments.edit', $segment->id) }}" 
                                               class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.segments.destroy', $segment->id) }}" 
                                                  method="POST" 
                                                  style="display: inline-block;"
                                                  onsubmit="return confirm('{{ __('Tem certeza que deseja deletar este segmento?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@endsection
