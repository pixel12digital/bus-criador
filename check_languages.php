<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== IDIOMAS DISPONÍVEIS ===\n";
$languages = \App\Models\Language::all(['id', 'name', 'code', 'is_default']);
foreach($languages as $lang) {
    echo $lang->id . ' - ' . $lang->name . ' (' . $lang->code . ') - Default: ' . $lang->is_default . "\n";
}

echo "\n=== CONFIGURANDO PORTUGUÊS (ID 176) COMO PADRÃO ===\n";

// Primeiro, remover o padrão de todos os idiomas
\App\Models\Language::query()->update(['is_default' => 0]);

// Definir português brasileiro (ID 176) como padrão
$portugueseLanguage = \App\Models\Language::find(176);

if (!$portugueseLanguage) {
    echo "ERRO: Idioma com ID 176 não encontrado!\n";
    exit(1);
}

$portugueseLanguage->is_default = 1;
$portugueseLanguage->save();

echo "Português brasileiro (ID 176) definido como idioma padrão!\n";

// Verificar se foi definido corretamente
$defaultLang = \App\Models\Language::where('is_default', 1)->first();
if ($defaultLang) {
    echo "Idioma padrão atual: {$defaultLang->name} ({$defaultLang->code}) - ID: {$defaultLang->id}\n";
}

echo "\n=== CONFIGURAÇÃO CONCLUÍDA ===\n";
