<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== CORRIGINDO CÓDIGO DO IDIOMA PORTUGUÊS ===\n";

// Encontrar o idioma português (ID 176)
$portugueseLanguage = \App\Models\Language::find(176);

if (!$portugueseLanguage) {
    echo "ERRO: Idioma com ID 176 não encontrado!\n";
    exit(1);
}

echo "Idioma atual: {$portugueseLanguage->name} ({$portugueseLanguage->code})\n";

// Corrigir o código para pt-BR
$portugueseLanguage->code = 'pt-BR';
$portugueseLanguage->save();

echo "Código corrigido para: {$portugueseLanguage->code}\n";

// Verificar se foi salvo corretamente
$updatedLang = \App\Models\Language::find(176);
echo "Verificação: {$updatedLang->name} ({$updatedLang->code}) - Default: {$updatedLang->is_default}\n";

echo "\n=== CONFIGURAÇÃO CONCLUÍDA ===\n";
