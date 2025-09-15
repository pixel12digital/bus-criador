@extends('user.layout')
@php
     Config::set('app.timezone', $userBs->timezoneinfo->timezone);
@endphp
@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Cupons') }}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('user-dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Gerenciamento de Loja') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Cupons') }}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title d-inline-block">{{ __('Cupons') }}</div>
                        </div>
                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i> {{ __('Adicionar Novo') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($coupons) == 0)
                                <h3 class="text-center">{{ __('NENHUM CUPOM ENCONTRADO') }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('Nome') }}</th>
                                                <th scope="col">{{ __('Código') }}</th>
                                                <th scope="col">{{ __('Desconto') }}</th>
                                                <th scope="col">{{ __('Status') }}</th>
                                                <th scope="col">{{ __('Criado') }}</th>
                                                <th scope="col">{{ __('Ações') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $coupon)
                                                <tr>
                                                    <td>{{ $coupon->name }}</td>
                                                    <td>{{ $coupon->code }}</td>
                                                    <td>{{ $coupon->type == 'fixed' && $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}{{ $coupon->value }}{{ $coupon->type == 'percentage' ? '%' : '' }}{{ $coupon->type == 'fixed' && $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $end = Carbon\Carbon::parse($coupon->end_date);
                                                            $start = Carbon\Carbon::parse($coupon->start_date);
                                                            $now = Carbon\Carbon::now();
                                                            $diff = $end->diffInDays($now);
                                                        @endphp
                                                        @if ($start->greaterThan($now))
                                                            <h3 class="d-inline-block badge badge-warning">{{ __('Pendente') }}</h3>
                                                        @else
                                                            @if ($now->lessThan($end))
                                                                <h3 class="d-inline-block badge badge-success">{{ __('Ativo') }}</h3>
                                                            @else
                                                                <h3 class="d-inline-block badge badge-danger">{{ __('Expirado') }}</h3>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $created = Carbon\Carbon::parse($coupon->created_at);
                                                            $diff = $created->diffInDays($now);
                                                        @endphp
                                                        {{ $created->subDays($diff)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('user.coupon.edit', $coupon->id) }}"
                                                            class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                                        <form class="d-inline-block deleteform"
                                                            action="{{ route('user.coupon.delete') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="coupon_id"
                                                                value="{{ $coupon->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm deletebtn">{{ __('Excluir') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            {{ $coupons->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create Service Category Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Adicionar Cupom') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="ajaxForm" class="modal-form" action="{{ route('user.coupon.store') }}" method="POST">
                        @csrf
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Nome') }} **</label>
                                    <input type="text" class="form-control" name="name" value="" placeholder="{{ __('Digite o nome') }}">
                                    <p id="errname" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Código') }} **</label>
                                    <input type="text" class="form-control" name="code" value="" placeholder="{{ __('Digite o código') }}">
                                    <p id="errcode" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Tipo') }} **</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="percentage">{{ __('Porcentagem') }}</option>
                                        <option value="fixed">{{ __('Fixo') }}</option>
                                    </select>
                                    <p id="errtype" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Valor') }} **</label>
                                    <input type="text" class="form-control" name="value" value=""
                                        placeholder="{{ __('Digite o valor') }}" autocomplete="off">
                                    <p id="errvalue" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Data de Início') }} **</label>
                                    <input type="text" class="form-control datepicker" name="start_date" value=""
                                        placeholder="{{ __('Digite a data de início') }}" autocomplete="off">
                                    <p id="errstart_date" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Data de Fim') }} **</label>
                                    <input type="text" class="form-control datepicker" name="end_date" value=""
                                        placeholder="{{ __('Digite a data de fim') }}" autocomplete="off">
                                    <p id="errend_date" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">{{ __('Gasto Mínimo') }} ({{ $userBs->base_currency_text }}) **</label>
                                    <input type="text" class="form-control" name="minimum_spend" value=""
                                        placeholder="{{ __('Digite o gasto mínimo') }}" autocomplete="off">
                                    <p class="mb-0 text-warning">{{ __('Deixe em branco, se você não quiser manter nenhum limite de gasto mínimo') }}</p>
                                    <p id="errminimum_spend" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Fechar') }}</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">{{ __('Enviar') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection
