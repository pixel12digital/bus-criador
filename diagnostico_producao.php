<?php

// =====================================================
// SCRIPT DE DIAGNÓSTICO PARA PRODUÇÃO
// =====================================================
// Execute este script na produção para identificar problemas

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 DIAGNÓSTICO DE PRODUÇÃO - PROBLEMA DE CARREGAMENTO\n";
echo "====================================================\n\n";

// 1. Verificar configuração de idioma
echo "1️⃣ VERIFICANDO CONFIGURAÇÃO DE IDIOMA:\n";
echo "----------------------------------------\n";

$defaultLang = \App\Models\Language::where('is_default', 1)->first();
if ($defaultLang) {
    echo "✅ Idioma padrão encontrado: {$defaultLang->name} ({$defaultLang->code})\n";
    echo "   ID: {$defaultLang->id}\n";
    echo "   RTL: " . ($defaultLang->rtl ? 'Sim' : 'Não') . "\n";
} else {
    echo "❌ ERRO: Nenhum idioma padrão encontrado!\n";
}

echo "\nLocale atual da aplicação: " . app()->getLocale() . "\n";

// 2. Verificar configurações básicas
echo "\n2️⃣ VERIFICANDO CONFIGURAÇÕES BÁSICAS:\n";
echo "------------------------------------\n";

if ($defaultLang) {
    $bs = $defaultLang->basic_setting;
    $be = $defaultLang->basic_extended;
    
    if ($bs) {
        echo "✅ BasicSetting encontrado para idioma {$defaultLang->name}\n";
        echo "   Website Title: " . ($bs->website_title ?? 'N/A') . "\n";
        echo "   Timezone: " . ($bs->timezone ?? 'N/A') . "\n";
    } else {
        echo "❌ ERRO: BasicSetting não encontrado para idioma {$defaultLang->name}\n";
    }
    
    if ($be) {
        echo "✅ BasicExtended encontrado para idioma {$defaultLang->name}\n";
    } else {
        echo "❌ ERRO: BasicExtended não encontrado para idioma {$defaultLang->name}\n";
    }
}

// 3. Verificar conteúdo da página inicial
echo "\n3️⃣ VERIFICANDO CONTEÚDO DA PÁGINA INICIAL:\n";
echo "-----------------------------------------\n";

if ($defaultLang) {
    $lang_id = $defaultLang->id;
    
    // Verificar processos
    $processes = \App\Models\Process::where('language_id', $lang_id)->count();
    echo "Processos encontrados: {$processes}\n";
    
    // Verificar features
    $features = \App\Models\Feature::where('language_id', $lang_id)->count();
    echo "Features encontradas: {$features}\n";
    
    // Verificar usuários em destaque
    $featuredUsers = \App\Models\User::where([
        ['featured', 1],
        ['status', 1]
    ])->count();
    echo "Usuários em destaque: {$featuredUsers}\n";
    
    // Verificar templates
    $templates = \App\Models\User::where([
        ['preview_template', 1],
        ['show_home', 1],
        ['status', 1],
        ['online_status', 1]
    ])->count();
    echo "Templates encontrados: {$templates}\n";
    
    // Verificar depoimentos
    $testimonials = \App\Models\Testimonial::where('language_id', $lang_id)->count();
    echo "Depoimentos encontrados: {$testimonials}\n";
    
    // Verificar blogs
    $blogs = \App\Models\Blog::where('language_id', $lang_id)->count();
    echo "Blogs encontrados: {$blogs}\n";
    
    // Verificar parceiros
    $partners = \App\Models\Partner::where('language_id', $lang_id)->count();
    echo "Parceiros encontrados: {$partners}\n";
}

// 4. Verificar arquivos de tradução
echo "\n4️⃣ VERIFICANDO ARQUIVOS DE TRADUÇÃO:\n";
echo "-----------------------------------\n";

$translationFile = resource_path('lang/pt-BR.json');
if (file_exists($translationFile)) {
    echo "✅ Arquivo de tradução pt-BR.json existe\n";
    $translations = json_decode(file_get_contents($translationFile), true);
    echo "   Total de traduções: " . count($translations) . "\n";
    
    // Testar algumas traduções
    $testKeys = ['Dashboard', 'Settings', 'Home', 'Contact'];
    foreach ($testKeys as $key) {
        if (isset($translations[$key])) {
            echo "   ✅ {$key}: {$translations[$key]}\n";
        } else {
            echo "   ❌ {$key}: NÃO ENCONTRADO\n";
        }
    }
} else {
    echo "❌ ERRO: Arquivo de tradução pt-BR.json não encontrado!\n";
}

// 5. Verificar configurações de ambiente
echo "\n5️⃣ VERIFICANDO CONFIGURAÇÕES DE AMBIENTE:\n";
echo "----------------------------------------\n";

echo "APP_ENV: " . env('APP_ENV', 'N/A') . "\n";
echo "APP_DEBUG: " . (env('APP_DEBUG') ? 'true' : 'false') . "\n";
echo "APP_URL: " . env('APP_URL', 'N/A') . "\n";
echo "APP_LOCALE: " . env('APP_LOCALE', 'N/A') . "\n";

// 6. Verificar permissões de arquivos
echo "\n6️⃣ VERIFICANDO PERMISSÕES DE ARQUIVOS:\n";
echo "-------------------------------------\n";

$storagePath = storage_path();
$publicPath = public_path();

echo "Storage path: {$storagePath}\n";
echo "Public path: {$publicPath}\n";

if (is_writable($storagePath)) {
    echo "✅ Storage é gravável\n";
} else {
    echo "❌ ERRO: Storage não é gravável\n";
}

if (is_writable($publicPath)) {
    echo "✅ Public é gravável\n";
} else {
    echo "❌ ERRO: Public não é gravável\n";
}

// 7. Verificar logs de erro
echo "\n7️⃣ VERIFICANDO LOGS DE ERRO:\n";
echo "----------------------------\n";

$logFile = storage_path('logs/laravel.log');
if (file_exists($logFile)) {
    echo "✅ Arquivo de log existe\n";
    $logSize = filesize($logFile);
    echo "   Tamanho do log: " . number_format($logSize / 1024, 2) . " KB\n";
    
    if ($logSize > 0) {
        $lastLines = shell_exec("tail -20 {$logFile}");
        echo "   Últimas 20 linhas do log:\n";
        echo "   " . str_replace("\n", "\n   ", trim($lastLines)) . "\n";
    }
} else {
    echo "❌ Arquivo de log não encontrado\n";
}

// 8. Teste de tradução
echo "\n8️⃣ TESTE DE TRADUÇÃO:\n";
echo "--------------------\n";

try {
    app()->setLocale('pt-BR');
    $testTranslation = __('Dashboard');
    echo "✅ Tradução funcionando: Dashboard = {$testTranslation}\n";
} catch (Exception $e) {
    echo "❌ ERRO na tradução: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "🎯 DIAGNÓSTICO CONCLUÍDO\n";
echo "Se houver erros acima, eles podem estar causando o problema de carregamento.\n";
echo str_repeat("=", 50) . "\n";
