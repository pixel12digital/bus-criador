<?php

// =====================================================
// DEBUG ESPECÍFICO PARA PÁGINA INICIAL
// =====================================================
// Execute este script para debugar especificamente a homepage

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 DEBUG PÁGINA INICIAL - PROBLEMA DE TEXTO\n";
echo "===========================================\n\n";

// 1. Simular o que o FrontendController faz
echo "1️⃣ SIMULANDO FRONTENDCONTROLLER:\n";
echo "--------------------------------\n";

// Verificar idioma atual
if (session()->has('lang')) {
    $currentLang = \App\Models\Language::where('code', session()->get('lang'))->first();
    echo "Idioma da sessão: " . session()->get('lang') . "\n";
} else {
    $currentLang = \App\Models\Language::where('is_default', 1)->first();
    echo "Usando idioma padrão\n";
}

if ($currentLang) {
    echo "✅ Idioma encontrado: {$currentLang->name} ({$currentLang->code})\n";
    $lang_id = $currentLang->id;
} else {
    echo "❌ ERRO: Nenhum idioma encontrado!\n";
    exit;
}

// 2. Verificar configurações básicas
echo "\n2️⃣ VERIFICANDO CONFIGURAÇÕES BÁSICAS:\n";
echo "------------------------------------\n";

$bs = $currentLang->basic_setting;
$be = $currentLang->basic_extended;

if ($bs) {
    echo "✅ BasicSetting encontrado\n";
    echo "   Website Title: " . ($bs->website_title ?? 'N/A') . "\n";
    echo "   Timezone: " . ($bs->timezone ?? 'N/A') . "\n";
} else {
    echo "❌ ERRO: BasicSetting não encontrado!\n";
    $bs = (object) ['website_title' => 'Website', 'timezone' => 'America/Sao_Paulo'];
    echo "⚠️  Usando BasicSetting padrão\n";
}

if ($be) {
    echo "✅ BasicExtended encontrado\n";
} else {
    echo "❌ ERRO: BasicExtended não encontrado!\n";
    $be = (object) [];
    echo "⚠️  Usando BasicExtended padrão\n";
}

// 3. Verificar conteúdo específico da homepage
echo "\n3️⃣ VERIFICANDO CONTEÚDO DA HOMEPAGE:\n";
echo "------------------------------------\n";

// Processos
$processes = \App\Models\Process::where('language_id', $lang_id)->orderBy('serial_number', 'ASC')->get();
echo "Processos encontrados: " . $processes->count() . "\n";
foreach ($processes as $process) {
    echo "   - {$process->title}: " . substr($process->text, 0, 50) . "...\n";
}

// Features
$features = \App\Models\Feature::where('language_id', $lang_id)->orderBy('serial_number', 'ASC')->get();
echo "Features encontradas: " . $features->count() . "\n";
foreach ($features as $feature) {
    echo "   - {$feature->title}: " . substr($feature->text, 0, 50) . "...\n";
}

// Usuários em destaque
$featured_users = \App\Models\User::where([
    ['featured', 1],
    ['status', 1]
])->get();
echo "Usuários em destaque: " . $featured_users->count() . "\n";

// Templates
$templates = \App\Models\User::where([
    ['preview_template', 1],
    ['show_home', 1],
    ['status', 1],
    ['online_status', 1]
])->get();
echo "Templates encontrados: " . $templates->count() . "\n";

// Depoimentos
$testimonials = \App\Models\Testimonial::where('language_id', $lang_id)->get();
echo "Depoimentos encontrados: " . $testimonials->count() . "\n";
foreach ($testimonials as $testimonial) {
    echo "   - {$testimonial->name}: " . substr($testimonial->comment, 0, 50) . "...\n";
}

// Blogs
$blogs = \App\Models\Blog::where('language_id', $lang_id)->take(3)->get();
echo "Blogs encontrados: " . $blogs->count() . "\n";
foreach ($blogs as $blog) {
    echo "   - {$blog->title}\n";
}

// Parceiros
$partners = \App\Models\Partner::where('language_id', $lang_id)->get();
echo "Parceiros encontrados: " . $partners->count() . "\n";

// 4. Verificar se há conteúdo vazio
echo "\n4️⃣ VERIFICANDO CONTEÚDO VAZIO:\n";
echo "------------------------------\n";

if ($processes->count() == 0) {
    echo "⚠️  PROBLEMA: Nenhum processo encontrado!\n";
}
if ($features->count() == 0) {
    echo "⚠️  PROBLEMA: Nenhuma feature encontrada!\n";
}
if ($testimonials->count() == 0) {
    echo "⚠️  PROBLEMA: Nenhum depoimento encontrado!\n";
}
if ($blogs->count() == 0) {
    echo "⚠️  PROBLEMA: Nenhum blog encontrado!\n";
}

// 5. Verificar se o problema é de tradução
echo "\n5️⃣ TESTANDO TRADUÇÕES:\n";
echo "----------------------\n";

try {
    app()->setLocale($currentLang->code);
    echo "Locale definido como: " . app()->getLocale() . "\n";
    
    $testKeys = ['Home', 'About', 'Services', 'Contact', 'Dashboard'];
    foreach ($testKeys as $key) {
        try {
            $translation = __($key);
            echo "   ✅ {$key}: {$translation}\n";
        } catch (Exception $e) {
            echo "   ❌ {$key}: ERRO - " . $e->getMessage() . "\n";
        }
    }
} catch (Exception $e) {
    echo "❌ ERRO ao definir locale: " . $e->getMessage() . "\n";
}

// 6. Verificar menus
echo "\n6️⃣ VERIFICANDO MENUS:\n";
echo "---------------------\n";

$menu = \App\Models\Menu::where('language_id', $lang_id)->first();
if ($menu) {
    echo "✅ Menu encontrado\n";
    $menuData = json_decode($menu->menus, true);
    if ($menuData) {
        echo "   Itens do menu: " . count($menuData) . "\n";
        foreach ($menuData as $item) {
            echo "   - {$item['text']}\n";
        }
    } else {
        echo "   ❌ Menu JSON inválido\n";
    }
} else {
    echo "❌ ERRO: Nenhum menu encontrado!\n";
}

// 7. Verificar se há erros no log
echo "\n7️⃣ VERIFICANDO LOGS RECENTES:\n";
echo "-----------------------------\n";

$logFile = storage_path('logs/laravel.log');
if (file_exists($logFile)) {
    $logContent = file_get_contents($logFile);
    $recentErrors = [];
    
    // Buscar erros recentes (últimas 100 linhas)
    $lines = explode("\n", $logContent);
    $recentLines = array_slice($lines, -100);
    
    foreach ($recentLines as $line) {
        if (strpos($line, 'ERROR') !== false || strpos($line, 'Exception') !== false) {
            $recentErrors[] = $line;
        }
    }
    
    if (count($recentErrors) > 0) {
        echo "⚠️  Erros recentes encontrados:\n";
        foreach (array_slice($recentErrors, -5) as $error) {
            echo "   " . $error . "\n";
        }
    } else {
        echo "✅ Nenhum erro recente encontrado\n";
    }
} else {
    echo "❌ Arquivo de log não encontrado\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "🎯 DEBUG CONCLUÍDO\n";
echo "Verifique os problemas identificados acima.\n";
echo str_repeat("=", 50) . "\n";
