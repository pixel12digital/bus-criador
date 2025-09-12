<?php
/**
 * Script para corrigir o idioma padrão na produção
 * Execute este script no servidor de produção via SSH
 */

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Language;
use Illuminate\Support\Facades\DB;

try {
    echo "🔍 Verificando configuração atual dos idiomas...\n\n";
    
    $languages = Language::all(['id', 'name', 'code', 'is_default']);
    
    foreach ($languages as $lang) {
        $status = $lang->is_default ? '✅ PADRÃO' : '❌ Não padrão';
        echo "ID: {$lang->id} - Nome: {$lang->name} - Código: {$lang->code} - {$status}\n";
    }
    
    echo "\n🔄 Alterando idioma padrão...\n";
    
    DB::beginTransaction();
    
    // Remover padrão atual
    Language::where('is_default', 1)->update(['is_default' => 0]);
    echo "✅ Removido padrão atual\n";
    
    // Definir "Português" (ID 176) como padrão
    $result = Language::where('id', 176)->update(['is_default' => 1]);
    
    if ($result) {
        echo "✅ Idioma 'Português' definido como padrão\n";
    } else {
        echo "❌ Erro: Idioma com ID 176 não encontrado\n";
        DB::rollback();
        exit(1);
    }
    
    DB::commit();
    
    echo "\n🎉 Alteração concluída com sucesso!\n\n";
    
    // Verificar resultado
    echo "📋 Configuração final:\n";
    $languages = Language::all(['id', 'name', 'code', 'is_default']);
    
    foreach ($languages as $lang) {
        $status = $lang->is_default ? '✅ PADRÃO' : '❌ Não padrão';
        echo "ID: {$lang->id} - Nome: {$lang->name} - Código: {$lang->code} - {$status}\n";
    }
    
    echo "\n💡 Próximos passos:\n";
    echo "1. Execute: php artisan config:clear\n";
    echo "2. Execute: php artisan cache:clear\n";
    echo "3. Teste o site\n";
    
} catch (Exception $e) {
    DB::rollback();
    echo "❌ Erro: " . $e->getMessage() . "\n";
    exit(1);
}
