<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;

class SetPortugueseAsDefault extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:set-portuguese-default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Define o português brasileiro como idioma padrão';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Primeiro, remover o padrão de todos os idiomas
        Language::query()->update(['is_default' => 0]);
        
        // Definir português brasileiro como padrão
        $portugueseLanguage = Language::where('code', 'pt-BR')->first();
        
        if (!$portugueseLanguage) {
            $this->error('Idioma português brasileiro (pt-BR) não encontrado!');
            $this->info('Execute primeiro: php artisan language:add-portuguese');
            return 1;
        }
        
        $portugueseLanguage->is_default = 1;
        $portugueseLanguage->save();
        
        $this->info('Português brasileiro (pt-BR) definido como idioma padrão!');
        
        // Verificar se foi definido corretamente
        $defaultLang = Language::where('is_default', 1)->first();
        if ($defaultLang) {
            $this->info("Idioma padrão atual: {$defaultLang->name} ({$defaultLang->code})");
        }
        
        $this->info('');
        $this->info('Agora você precisa:');
        $this->line('1. Limpar o cache do navegador');
        $this->line('2. Recarregar a página do painel administrativo');
        $this->line('3. Os termos devem aparecer em português');
        
        return 0;
    }
}
