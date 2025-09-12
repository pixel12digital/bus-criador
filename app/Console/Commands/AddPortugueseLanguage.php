<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;
use Illuminate\Support\Facades\File;

class AddPortugueseLanguage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:add-portuguese';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adiciona o idioma português brasileiro ao sistema';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Verificar se o idioma já existe
        $existingLanguage = Language::where('code', 'pt-BR')->first();
        
        if ($existingLanguage) {
            $this->info('O idioma português brasileiro (pt-BR) já existe no sistema.');
            return 0;
        }

        // Criar o registro do idioma no banco de dados
        $language = new Language();
        $language->name = 'Português (Brasil)';
        $language->code = 'pt-BR';
        $language->is_default = 0;
        $language->rtl = 0;
        $language->save();

        $this->info('Idioma português brasileiro (pt-BR) adicionado com sucesso ao sistema!');
        
        // Verificar se os arquivos de tradução existem
        $translationFiles = [
            'pt-BR.json',
            'pt-BR/auth.php',
            'pt-BR/pagination.php',
            'pt-BR/passwords.php',
            'pt-BR/validation.php',
            'pt-BR/installer_messages.php'
        ];

        $this->info('Arquivos de tradução criados:');
        foreach ($translationFiles as $file) {
            $filePath = resource_path('lang/' . $file);
            if (File::exists($filePath)) {
                $this->line('✓ ' . $file);
            } else {
                $this->error('✗ ' . $file . ' (não encontrado)');
            }
        }

        $this->info('');
        $this->info('Para usar o português brasileiro:');
        $this->line('1. Acesse o painel administrativo');
        $this->line('2. Vá em "Gerenciamento de Idiomas"');
        $this->line('3. Selecione "Português (Brasil)" como idioma padrão');
        $this->line('4. Ou use o código "pt-BR" nas configurações');

        return 0;
    }
}
