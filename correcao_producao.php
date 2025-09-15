<?php

// =====================================================
// SCRIPT DE CORREÇÃO PARA PRODUÇÃO
// =====================================================
// Execute este script para corrigir problemas comuns

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 CORREÇÃO DE PROBLEMAS EM PRODUÇÃO\n";
echo "====================================\n\n";

// 1. Garantir que português seja o idioma padrão
echo "1️⃣ CORRIGINDO IDIOMA PADRÃO:\n";
echo "----------------------------\n";

// Remover padrão de todos os idiomas
\App\Models\Language::query()->update(['is_default' => 0]);

// Definir português como padrão
$portugueseLang = \App\Models\Language::where('code', 'pt-BR')->first();
if (!$portugueseLang) {
    // Se não existir, criar
    $portugueseLang = \App\Models\Language::create([
        'name' => 'Português',
        'code' => 'pt-BR',
        'is_default' => 1,
        'rtl' => 0
    ]);
    echo "✅ Idioma português criado\n";
} else {
    $portugueseLang->is_default = 1;
    $portugueseLang->save();
    echo "✅ Idioma português definido como padrão\n";
}

// 2. Criar configurações básicas se não existirem
echo "\n2️⃣ VERIFICANDO CONFIGURAÇÕES BÁSICAS:\n";
echo "------------------------------------\n";

$bs = $portugueseLang->basic_setting;
if (!$bs) {
    echo "⚠️  BasicSetting não encontrado, criando...\n";
    
    // Criar BasicSetting padrão
    $bs = new \App\Models\BasicSetting();
    $bs->language_id = $portugueseLang->id;
    $bs->website_title = 'Pixel12Digital';
    $bs->timezone = 'America/Sao_Paulo';
    $bs->save();
    echo "✅ BasicSetting criado\n";
} else {
    echo "✅ BasicSetting já existe\n";
}

$be = $portugueseLang->basic_extended;
if (!$be) {
    echo "⚠️  BasicExtended não encontrado, criando...\n";
    
    // Criar BasicExtended padrão
    $be = new \App\Models\BasicExtended();
    $be->language_id = $portugueseLang->id;
    $be->save();
    echo "✅ BasicExtended criado\n";
} else {
    echo "✅ BasicExtended já existe\n";
}

// 3. Criar conteúdo básico se não existir
echo "\n3️⃣ VERIFICANDO CONTEÚDO BÁSICO:\n";
echo "-------------------------------\n";

// Verificar se há processos
$processesCount = \App\Models\Process::where('language_id', $portugueseLang->id)->count();
if ($processesCount == 0) {
    echo "⚠️  Nenhum processo encontrado, criando exemplo...\n";
    
    \App\Models\Process::create([
        'language_id' => $portugueseLang->id,
        'title' => 'Processo 1',
        'text' => 'Descrição do processo',
        'serial_number' => 1
    ]);
    echo "✅ Processo exemplo criado\n";
} else {
    echo "✅ {$processesCount} processos encontrados\n";
}

// Verificar se há features
$featuresCount = \App\Models\Feature::where('language_id', $portugueseLang->id)->count();
if ($featuresCount == 0) {
    echo "⚠️  Nenhuma feature encontrada, criando exemplo...\n";
    
    \App\Models\Feature::create([
        'language_id' => $portugueseLang->id,
        'title' => 'Feature 1',
        'text' => 'Descrição da feature',
        'serial_number' => 1
    ]);
    echo "✅ Feature exemplo criada\n";
} else {
    echo "✅ {$featuresCount} features encontradas\n";
}

// 4. Verificar e corrigir configurações de ambiente
echo "\n4️⃣ VERIFICANDO CONFIGURAÇÕES DE AMBIENTE:\n";
echo "----------------------------------------\n";

$envFile = base_path('.env');
if (file_exists($envFile)) {
    $envContent = file_get_contents($envFile);
    
    // Verificar se APP_LOCALE está definido
    if (strpos($envContent, 'APP_LOCALE') === false) {
        echo "⚠️  APP_LOCALE não definido, adicionando...\n";
        $envContent .= "\nAPP_LOCALE=pt-BR\n";
        file_put_contents($envFile, $envContent);
        echo "✅ APP_LOCALE adicionado\n";
    } else {
        echo "✅ APP_LOCALE já está definido\n";
    }
    
    // Verificar se APP_ENV está correto
    if (strpos($envContent, 'APP_ENV=production') === false) {
        echo "⚠️  APP_ENV não está como production\n";
    } else {
        echo "✅ APP_ENV está correto\n";
    }
} else {
    echo "❌ Arquivo .env não encontrado!\n";
}

// 5. Limpar todos os caches
echo "\n5️⃣ LIMPANDO CACHES:\n";
echo "------------------\n";

try {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    echo "✅ Cache da aplicação limpo\n";
    
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    echo "✅ Cache de configuração limpo\n";
    
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    echo "✅ Cache de views limpo\n";
    
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    echo "✅ Cache de rotas limpo\n";
} catch (Exception $e) {
    echo "❌ Erro ao limpar cache: " . $e->getMessage() . "\n";
}

// 6. Verificar permissões de diretórios
echo "\n6️⃣ VERIFICANDO PERMISSÕES:\n";
echo "-------------------------\n";

$directories = [
    storage_path(),
    storage_path('logs'),
    storage_path('framework'),
    storage_path('framework/cache'),
    storage_path('framework/sessions'),
    storage_path('framework/views'),
    public_path('assets'),
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "✅ Diretório criado: {$dir}\n";
    } elseif (is_writable($dir)) {
        echo "✅ Permissão OK: {$dir}\n";
    } else {
        echo "⚠️  Permissão problemática: {$dir}\n";
    }
}

// 7. Teste final
echo "\n7️⃣ TESTE FINAL:\n";
echo "--------------\n";

try {
    app()->setLocale('pt-BR');
    $testTranslation = __('Dashboard');
    echo "✅ Tradução funcionando: Dashboard = {$testTranslation}\n";
    
    // Verificar se o idioma padrão está correto
    $defaultLang = \App\Models\Language::where('is_default', 1)->first();
    if ($defaultLang && $defaultLang->code === 'pt-BR') {
        echo "✅ Idioma padrão correto: {$defaultLang->name}\n";
    } else {
        echo "❌ Problema com idioma padrão\n";
    }
    
} catch (Exception $e) {
    echo "❌ Erro no teste final: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "🎉 CORREÇÃO CONCLUÍDA!\n";
echo "Agora recarregue a página do site.\n";
echo str_repeat("=", 50) . "\n";
