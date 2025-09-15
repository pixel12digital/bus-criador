<?php

// =====================================================
// CORREÇÃO ESPECÍFICA PARA HOMEPAGE
// =====================================================
// Execute este script para corrigir problemas da homepage

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 CORREÇÃO ESPECÍFICA PARA HOMEPAGE\n";
echo "====================================\n\n";

// 1. Garantir que português seja o idioma padrão
echo "1️⃣ CONFIGURANDO IDIOMA PADRÃO:\n";
echo "-------------------------------\n";

\App\Models\Language::query()->update(['is_default' => 0]);
$portugueseLang = \App\Models\Language::where('code', 'pt-BR')->first();

if (!$portugueseLang) {
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

$lang_id = $portugueseLang->id;

// 2. Criar conteúdo básico se não existir
echo "\n2️⃣ CRIANDO CONTEÚDO BÁSICO:\n";
echo "----------------------------\n";

// Criar processos se não existirem
$processesCount = \App\Models\Process::where('language_id', $lang_id)->count();
if ($processesCount == 0) {
    echo "⚠️  Criando processos exemplo...\n";
    
    $processes = [
        ['title' => 'Análise', 'text' => 'Analisamos suas necessidades e objetivos'],
        ['title' => 'Desenvolvimento', 'text' => 'Desenvolvemos a solução ideal para você'],
        ['title' => 'Entrega', 'text' => 'Entregamos o projeto finalizado'],
        ['title' => 'Suporte', 'text' => 'Oferecemos suporte contínuo']
    ];
    
    foreach ($processes as $index => $process) {
        $newProcess = new \App\Models\Process();
        $newProcess->language_id = $lang_id;
        $newProcess->title = $process['title'];
        $newProcess->text = $process['text'];
        $newProcess->serial_number = $index + 1;
        $newProcess->save();
    }
    echo "✅ {$processesCount} processos criados\n";
} else {
    echo "✅ {$processesCount} processos já existem\n";
}

// Criar features se não existirem
$featuresCount = \App\Models\Feature::where('language_id', $lang_id)->count();
if ($featuresCount == 0) {
    echo "⚠️  Criando features exemplo...\n";
    
    $features = [
        ['title' => 'Design Responsivo', 'text' => 'Sites que funcionam em todos os dispositivos'],
        ['title' => 'SEO Otimizado', 'text' => 'Otimização para mecanismos de busca'],
        ['title' => 'Alta Performance', 'text' => 'Sites rápidos e eficientes'],
        ['title' => 'Suporte 24/7', 'text' => 'Suporte técnico disponível sempre']
    ];
    
    foreach ($features as $index => $feature) {
        $newFeature = new \App\Models\Feature();
        $newFeature->language_id = $lang_id;
        $newFeature->title = $feature['title'];
        $newFeature->text = $feature['text'];
        $newFeature->serial_number = $index + 1;
        $newFeature->save();
    }
    echo "✅ {$featuresCount} features criadas\n";
} else {
    echo "✅ {$featuresCount} features já existem\n";
}

// Criar depoimentos se não existirem
$testimonialsCount = \App\Models\Testimonial::where('language_id', $lang_id)->count();
if ($testimonialsCount == 0) {
    echo "⚠️  Criando depoimentos exemplo...\n";
    
    $testimonials = [
        [
            'name' => 'João Silva',
            'comment' => 'Excelente trabalho! O site ficou exatamente como esperávamos.',
            'occupation' => 'Empresário',
            'rating' => 5
        ],
        [
            'name' => 'Maria Santos',
            'comment' => 'Profissionais muito competentes e atenciosos.',
            'occupation' => 'Diretora',
            'rating' => 5
        ],
        [
            'name' => 'Pedro Costa',
            'comment' => 'Recomendo para quem busca qualidade e eficiência.',
            'occupation' => 'Gerente',
            'rating' => 5
        ]
    ];
    
    foreach ($testimonials as $index => $testimonial) {
        $newTestimonial = new \App\Models\Testimonial();
        $newTestimonial->language_id = $lang_id;
        $newTestimonial->name = $testimonial['name'];
        $newTestimonial->comment = $testimonial['comment'];
        $newTestimonial->occupation = $testimonial['occupation'];
        $newTestimonial->rating = $testimonial['rating'];
        $newTestimonial->serial_number = $index + 1;
        $newTestimonial->save();
    }
    echo "✅ {$testimonialsCount} depoimentos criados\n";
} else {
    echo "✅ {$testimonialsCount} depoimentos já existem\n";
}

// 3. Verificar e criar menu se necessário
echo "\n3️⃣ VERIFICANDO MENU:\n";
echo "--------------------\n";

$menu = \App\Models\Menu::where('language_id', $lang_id)->first();
if (!$menu) {
    echo "⚠️  Criando menu padrão...\n";
    
    $defaultMenu = [
        [
            'text' => 'Início',
            'href' => '',
            'icon' => 'empty',
            'target' => '_self',
            'title' => '',
            'type' => 'home'
        ],
        [
            'text' => 'Sobre',
            'href' => '',
            'icon' => 'empty',
            'target' => '_self',
            'title' => '',
            'type' => 'about'
        ],
        [
            'text' => 'Serviços',
            'href' => '',
            'icon' => 'empty',
            'target' => '_self',
            'title' => '',
            'type' => 'services'
        ],
        [
            'text' => 'Contato',
            'href' => '',
            'icon' => 'empty',
            'target' => '_self',
            'title' => '',
            'type' => 'contact'
        ]
    ];
    
    $newMenu = new \App\Models\Menu();
    $newMenu->language_id = $lang_id;
    $newMenu->menus = json_encode($defaultMenu);
    $newMenu->save();
    
    echo "✅ Menu padrão criado\n";
} else {
    echo "✅ Menu já existe\n";
}

// 4. Limpar todos os caches
echo "\n4️⃣ LIMPANDO CACHES:\n";
echo "-------------------\n";

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

// 5. Teste final
echo "\n5️⃣ TESTE FINAL:\n";
echo "---------------\n";

try {
    app()->setLocale('pt-BR');
    echo "✅ Locale definido como pt-BR\n";
    
    // Testar algumas traduções
    $testKeys = ['Home', 'About', 'Services', 'Contact'];
    foreach ($testKeys as $key) {
        $translation = __($key);
        echo "   ✅ {$key}: {$translation}\n";
    }
    
    // Verificar conteúdo da homepage
    $processes = \App\Models\Process::where('language_id', $lang_id)->count();
    $features = \App\Models\Feature::where('language_id', $lang_id)->count();
    $testimonials = \App\Models\Testimonial::where('language_id', $lang_id)->count();
    
    echo "\nConteúdo da homepage:\n";
    echo "   - Processos: {$processes}\n";
    echo "   - Features: {$features}\n";
    echo "   - Depoimentos: {$testimonials}\n";
    
} catch (Exception $e) {
    echo "❌ Erro no teste final: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "🎉 CORREÇÃO DA HOMEPAGE CONCLUÍDA!\n";
echo "Agora acesse o site e verifique se os textos aparecem.\n";
echo str_repeat("=", 50) . "\n";
