<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;
use App\Models\BasicSetting;
use App\Models\BasicExtended;
use Illuminate\Support\Facades\DB;

class CreatePortugueseBasicSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:create-portuguese-settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria as configurações básicas necessárias para o idioma português brasileiro';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $portugueseLanguage = Language::where('code', 'pt-BR')->first();
        
        if (!$portugueseLanguage) {
            $this->error('Idioma português brasileiro (pt-BR) não encontrado!');
            return 1;
        }
        
        // Verificar se já existem configurações básicas
        $existingBs = BasicSetting::where('language_id', $portugueseLanguage->id)->first();
        $existingBe = BasicExtended::where('language_id', $portugueseLanguage->id)->first();
        
        if ($existingBs && $existingBe) {
            $this->info('Configurações básicas já existem para o português brasileiro.');
            return 0;
        }
        
        // Obter configurações do idioma inglês como base
        $englishLanguage = Language::where('code', 'en')->first();
        $englishBs = $englishLanguage ? $englishLanguage->basic_setting : null;
        $englishBe = $englishLanguage ? $englishLanguage->basic_extended : null;
        
        // Criar BasicSetting usando inserção direta no banco
        if (!$existingBs) {
            $basicSettingData = [
                'language_id' => $portugueseLanguage->id,
                'maintainance_mode' => 0,
                'maintainance_text' => 'Site em manutenção. Voltaremos em breve!',
                'footer_text' => 'Texto do rodapé em português',
                'copyright_text' => 'Copyright © 2023. Todos os direitos reservados por Businesso.',
            ];
            
            // Se existir configuração em inglês, copiar alguns campos
            if ($englishBs) {
                $basicSettingData['intro_subtitle'] = $englishBs->intro_subtitle ?? 'Subtítulo de Introdução';
                $basicSettingData['intro_title'] = $englishBs->intro_title ?? 'Título de Introdução';
                $basicSettingData['intro_text'] = $englishBs->intro_text ?? 'Texto de introdução em português.';
                $basicSettingData['intro_main_image'] = $englishBs->intro_main_image ?? null;
                $basicSettingData['maintainance_mode'] = $englishBs->maintainance_mode ?? 0;
                $basicSettingData['maintenance_img'] = $englishBs->maintenance_img ?? null;
                $basicSettingData['maintenance_status'] = $englishBs->maintenance_status ?? 0;
                $basicSettingData['secret_path'] = $englishBs->secret_path ?? null;
                $basicSettingData['testimonial_image'] = $englishBs->testimonial_image ?? null;
                $basicSettingData['footer_logo'] = $englishBs->footer_logo ?? null;
                $basicSettingData['adsense_publisher_id'] = $englishBs->adsense_publisher_id ?? null;
            }
            
            DB::table('basic_settings')->insert($basicSettingData);
            $this->info('BasicSetting criado para português brasileiro.');
        }
        
        // Criar BasicExtended usando inserção direta no banco
        if (!$existingBe) {
            $basicExtendedData = [
                'language_id' => $portugueseLanguage->id,
            ];
            
            DB::table('basic_extendeds')->insert($basicExtendedData);
            $this->info('BasicExtended criado para português brasileiro.');
        }
        
        $this->info('✅ Configurações básicas criadas com sucesso para português brasileiro!');
        $this->info('Agora o painel administrativo deve funcionar corretamente.');
        
        return 0;
    }
}