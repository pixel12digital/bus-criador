<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $segments = [
            [
                'name' => 'Agência de Marketing',
                'slug' => 'agencia',
                'description' => 'Segmento voltado para agências de marketing digital que precisam de sites otimizados para conversão.',
                'status' => 1,
                'serial_number' => 1,
                'hero_section_title' => 'Transforme Buscas em Vendas',
                'hero_section_subtitle' => 'Sites otimizados para conversão com foco em ROI',
                'hero_section_text' => 'Crie sites que convertem visitantes em clientes com nossa plataforma otimizada para marketing digital. Ferramentas profissionais para agências que buscam resultados.',
                'hero_section_button_text' => 'Começar Agora',
                'hero_section_button_url' => '/registration/step-1/0/0',
                'hero_section_secound_button_text' => 'Ver Modelos',
                'hero_section_secound_button_url' => '/templates',
                'custom_css' => '/* CSS personalizado para agências */',
                'custom_js' => '/* JS personalizado para agências */',
            ],
            [
                'name' => 'Consultor',
                'slug' => 'consultor',
                'description' => 'Segmento ideal para consultores e profissionais liberais que precisam de credibilidade digital.',
                'status' => 1,
                'serial_number' => 2,
                'hero_section_title' => 'Credibilidade Digital Profissional',
                'hero_section_subtitle' => 'Sites que transmitem expertise e confiança',
                'hero_section_text' => 'Construa sua presença digital profissional com sites que destacam sua expertise e conquistam a confiança dos clientes.',
                'hero_section_button_text' => 'Criar Meu Site',
                'hero_section_button_url' => '/registration/step-1/0/0',
                'hero_section_secound_button_text' => 'Ver Exemplos',
                'hero_section_secound_button_url' => '/templates',
                'custom_css' => '/* CSS personalizado para consultores */',
                'custom_js' => '/* JS personalizado para consultores */',
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'ecommerce',
                'description' => 'Segmento especializado em lojas virtuais e vendas online.',
                'status' => 1,
                'serial_number' => 3,
                'hero_section_title' => 'Vendas Online que Convertem',
                'hero_section_subtitle' => 'Lojas virtuais otimizadas para máxima conversão',
                'hero_section_text' => 'Monte sua loja virtual com ferramentas profissionais que maximizam suas vendas online. Integração completa com gateways de pagamento.',
                'hero_section_button_text' => 'Criar Loja',
                'hero_section_button_url' => '/registration/step-1/0/0',
                'hero_section_secound_button_text' => 'Ver Lojas',
                'hero_section_secound_button_url' => '/templates',
                'custom_css' => '/* CSS personalizado para e-commerce */',
                'custom_js' => '/* JS personalizado para e-commerce */',
            ],
            [
                'name' => 'Serviços',
                'slug' => 'servicos',
                'description' => 'Segmento para empresas de serviços que precisam destacar qualidade e atendimento.',
                'status' => 1,
                'serial_number' => 4,
                'hero_section_title' => 'Qualidade em Primeiro Lugar',
                'hero_section_subtitle' => 'Sites que destacam a excelência do seu serviço',
                'hero_section_text' => 'Apresente seus serviços de forma profissional e conquiste mais clientes com sites que destacam qualidade e confiabilidade.',
                'hero_section_button_text' => 'Começar',
                'hero_section_button_url' => '/registration/step-1/0/0',
                'hero_section_secound_button_text' => 'Ver Sites',
                'hero_section_secound_button_url' => '/templates',
                'custom_css' => '/* CSS personalizado para serviços */',
                'custom_js' => '/* JS personalizado para serviços */',
            ],
        ];

        foreach ($segments as $segmentData) {
            Segment::create($segmentData);
        }
    }
}