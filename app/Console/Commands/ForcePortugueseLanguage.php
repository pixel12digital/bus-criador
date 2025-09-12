<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;

class ForcePortugueseLanguage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:force-portuguese';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Força o uso do português brasileiro no sistema';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Definir português como padrão no banco
        Language::query()->update(['is_default' => 0]);
        $portugueseLanguage = Language::where('code', 'pt-BR')->first();
        
        if ($portugueseLanguage) {
            $portugueseLanguage->is_default = 1;
            $portugueseLanguage->save();
            $this->info('Português brasileiro definido como padrão no banco de dados.');
        }
        
        // Forçar o locale na aplicação
        app()->setLocale('pt-BR');
        $this->info('Locale da aplicação definido como pt-BR.');
        
        // Verificar se as traduções estão funcionando
        $this->info('Testando traduções:');
        $this->line('Dashboard: ' . __('Dashboard'));
        $this->line('Settings: ' . __('Settings'));
        $this->line('User Management: ' . __('User Management'));
        
        // Limpar todos os caches
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('route:clear');
        
        $this->info('');
        $this->info('✅ Configuração concluída!');
        $this->info('Agora recarregue a página do painel administrativo.');
        
        return 0;
    }
}
