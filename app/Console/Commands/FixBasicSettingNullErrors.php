<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;
use App\Models\User\BasicSetting;
use App\Models\User\BasicExtended;

class FixBasicSettingNullErrors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:basic-setting-null-errors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix basic_setting null errors by creating missing basic settings for all languages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🔧 Fixing basic_setting null errors...');

        // Get all languages
        $languages = Language::all();

        foreach ($languages as $language) {
            $this->info("Processing language: {$language->name} ({$language->code})");

            // Check if basic_setting exists
            if (!$language->basic_setting) {
                $this->warn("  ❌ Missing basic_setting for {$language->name}");
                
                // Create basic_setting
                BasicSetting::create([
                    'language_id' => $language->id,
                    'website_title' => $language->name . ' Website',
                    'timezone' => 'America/Sao_Paulo',
                    'is_recaptcha' => 0,
                    'google_recaptcha_site_key' => '',
                    'google_recaptcha_secret_key' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
                $this->info("  ✅ Created basic_setting for {$language->name}");
            } else {
                $this->info("  ✅ basic_setting exists for {$language->name}");
            }

            // Check if basic_extended exists
            if (!$language->basic_extended) {
                $this->warn("  ❌ Missing basic_extended for {$language->name}");
                
                // Create basic_extended
                BasicExtended::create([
                    'language_id' => $language->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
                $this->info("  ✅ Created basic_extended for {$language->name}");
            } else {
                $this->info("  ✅ basic_extended exists for {$language->name}");
            }
        }

        $this->info('🎉 All basic_setting null errors have been fixed!');
        
        return Command::SUCCESS;
    }
}
