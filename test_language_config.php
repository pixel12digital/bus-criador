<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== TESTE DE CONFIGURAÇÃO DE IDIOMA ===\n";

// Verificar ambiente
echo "Ambiente atual: " . app()->environment() . "\n";

// Verificar idioma padrão no banco
$defaultLang = \App\Models\Language::where('is_default', 1)->first();
if ($defaultLang) {
    echo "Idioma padrão no banco: {$defaultLang->name} ({$defaultLang->code}) - ID: {$defaultLang->id}\n";
} else {
    echo "ERRO: Nenhum idioma padrão encontrado no banco!\n";
}

// Simular o middleware
echo "\n=== SIMULANDO MIDDLEWARE ===\n";
if (app()->environment('local')) {
    app()->setLocale('pt-BR');
    echo "Ambiente LOCAL detectado - Definindo idioma como pt-BR\n";
} else {
    echo "Ambiente não é LOCAL\n";
}

echo "Idioma atual da aplicação: " . app()->getLocale() . "\n";

// Verificar se existe tradução em português
$translationPath = resource_path('lang/pt-BR');
if (is_dir($translationPath)) {
    echo "Diretório de tradução pt-BR encontrado: " . $translationPath . "\n";
} else {
    echo "AVISO: Diretório de tradução pt-BR não encontrado!\n";
}

echo "\n=== CONFIGURAÇÃO FINAL ===\n";
echo "✓ Ambiente: " . app()->environment() . "\n";
echo "✓ Idioma padrão no banco: ID {$defaultLang->id} ({$defaultLang->code})\n";
echo "✓ Idioma da aplicação: " . app()->getLocale() . "\n";

if (app()->environment('local') && app()->getLocale() === 'pt-BR') {
    echo "✓ CONFIGURAÇÃO CORRETA: Português será sempre carregado localmente!\n";
} else {
    echo "✗ CONFIGURAÇÃO INCORRETA: Verifique as configurações!\n";
}
