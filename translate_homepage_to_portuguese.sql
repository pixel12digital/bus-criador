-- Script SQL para traduzir textos da homepage para português
-- Execute estes comandos no banco de dados remoto

-- 1. Atualizar textos na tabela basic_settings para o idioma português (language_id = 177)
UPDATE basic_settings 
SET 
    intro_subtitle = 'Site de Serviços Digitais #01',
    intro_title = 'Construa Seu Site dos Sonhos Com Businesso',
    intro_text = 'Somos autores de elite no Envato, ajudamos você a construir seu próprio site de reservas de forma fácil',
    intro_button_name = 'Começar Agora',
    team_section_title = 'Nossa Grande Conquista Nos Comprovaram!',
    team_section_subtitle = 'Completamos 500+ Projetos Com Satisfação dos Clientes',
    partners_section_title = 'Patrocinadores',
    partners_section_subtitle = 'Nossos Parceiros Confiáveis',
    vcard_section_title = 'Cartão de Identidade Digital Para Seu Excelente Negócio',
    vcard_section_subtitle = 'É um fato estabelecido há muito tempo que um leitor será escolhido pelo conteúdo legível de uma página ao olhar.',
    footer_text = 'Somos uma empresa multinacional premiada. Acreditamos em qualidade e padrão mundial.',
    copyright_text = 'Copyright © 2023. Todos os direitos reservados por Businesso.'
WHERE language_id = 177;

-- 2. Atualizar textos na tabela user_home_page_texts para o idioma português (language_id = 177)
UPDATE user_home_page_texts 
SET 
    about_title = 'Sobre Nós',
    about_keyword = 'Sobre',
    technical_title = 'Como Configurar o Site',
    technical_keyword = 'Processo',
    technical_content = 'Fornecemos serviços de design gráfico e identidade visual.',
    service_title = 'Nossos Serviços',
    service_keyword = 'Serviços',
    experience_title = 'Nossa Experiência',
    experience_keyword = 'Experiência',
    achievement_title = 'Nossas Conquistas',
    achievement_keyword = 'Conquistas',
    portfolio_title = 'Nossos Portfólios',
    portfolio_keyword = 'Portfólios',
    view_all_portfolio_text = 'Ver Todos',
    testimonial_title = 'Depoimento de Nossos Clientes',
    testimonial_keyword = 'Depoimentos',
    blog_title = 'Nosso Blog Mais Recente',
    blog_keyword = 'Blog',
    view_all_blog_text = 'Ver Todos',
    contact_title = 'Entre em Contato',
    contact_subtitle = 'Construa Seu Relacionamento Conosco',
    contact_button_text = 'Enviar Mensagem',
    video_section_title = 'Design Criativo e Amigável',
    video_section_subtitle = 'Veja Nosso Modelo Moderno',
    video_section_text = 'É um fato estabelecido há muito tempo que um leitor será escolhido pelo conteúdo legível de uma página ao olhar.',
    video_section_button_text = 'Ver Demonstração',
    why_choose_us_section_title = 'Por Que Escolher Nosso Modelo',
    why_choose_us_section_subtitle = 'Traga Mais Lucros Com Recursos Mais Valiosos',
    why_choose_us_section_text = 'É um fato estabelecido há muito tempo que um leitor será escolhido pelo conteúdo legível de uma página ao olhar.',
    why_choose_us_section_button_text = 'Saiba Mais',
    work_process_section_title = 'Como Funciona',
    work_process_section_subtitle = 'Processo Simples em 4 Etapas',
    work_process_section_text = 'Fornecemos serviços de design gráfico e identidade visual.',
    quote_section_title = 'Solicitar Orçamento',
    quote_section_subtitle = 'Entre em Contato Para Um Orçamento Personalizado'
WHERE language_id = 177;

-- 3. Atualizar textos de recursos/features (se existirem na tabela features)
UPDATE features 
SET 
    title = 'Domínio Personalizado',
    subtitle = 'É um fato estabelecido há muito tempo que um leitor será distraído pelo conteúdo legível de uma página'
WHERE language_id = 177 AND title LIKE '%Custom Domain%';

UPDATE features 
SET 
    title = 'Idioma Ilimitado',
    subtitle = 'Lorem Ipsum é simplesmente um texto fictício da indústria de impressão e composição.'
WHERE language_id = 177 AND title LIKE '%Unlimited Language%';

UPDATE features 
SET 
    title = 'Temas Atrativos',
    subtitle = 'Existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu'
WHERE language_id = 177 AND title LIKE '%Attractive Themes%';

UPDATE features 
SET 
    title = 'Construtor de Formulários',
    subtitle = 'Lorem Ipsum é simplesmente um texto fictício da indústria de impressão e composição.'
WHERE language_id = 177 AND title LIKE '%Form Builder%';

UPDATE features 
SET 
    title = 'Construtor QR',
    subtitle = 'É um fato estabelecido há muito tempo que um leitor será distraído pelo conteúdo legível de uma página'
WHERE language_id = 177 AND title LIKE '%QR Builder%';

UPDATE features 
SET 
    title = 'vCard',
    subtitle = 'Existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu'
WHERE language_id = 177 AND title LIKE '%vCard%';

-- 4. Atualizar textos de processos (se existirem na tabela processes)
UPDATE processes 
SET 
    title = 'Comprar Modelo',
    subtitle = 'Fornecemos serviços de design gráfico e identidade visual.'
WHERE language_id = 177 AND title LIKE '%Purchase Template%';

UPDATE processes 
SET 
    title = 'Adicionar Serviços',
    subtitle = 'Fornecemos serviços de design gráfico e identidade visual.'
WHERE language_id = 177 AND title LIKE '%Add Services%';

UPDATE processes 
SET 
    title = 'Configurar Site',
    subtitle = 'Fornecemos serviços de design gráfico e identidade visual.'
WHERE language_id = 177 AND title LIKE '%Setup Website%';

UPDATE processes 
SET 
    title = 'Lançar Site',
    subtitle = 'Fornecemos serviços de design gráfico e identidade visual.'
WHERE language_id = 177 AND title LIKE '%Launch Website%';

-- 5. Atualizar textos de templates (se existirem)
UPDATE templates 
SET 
    title = 'Agência',
    subtitle = 'Modelo profissional para agências'
WHERE language_id = 177 AND title LIKE '%Agency%';

UPDATE templates 
SET 
    title = 'TI (Escuro)',
    subtitle = 'Modelo escuro para empresas de tecnologia'
WHERE language_id = 177 AND title LIKE '%IT (Dark)%';

UPDATE templates 
SET 
    title = 'E-commerce',
    subtitle = 'Modelo completo para lojas online'
WHERE language_id = 177 AND title LIKE '%E-commerce%';

UPDATE templates 
SET 
    title = 'Curso',
    subtitle = 'Modelo ideal para plataformas de ensino'
WHERE language_id = 177 AND title LIKE '%Course%';

UPDATE templates 
SET 
    title = 'Hotel',
    subtitle = 'Modelo especializado para hotéis'
WHERE language_id = 177 AND title LIKE '%Hotel%';

UPDATE templates 
SET 
    title = 'Caridade',
    subtitle = 'Modelo para organizações sem fins lucrativos'
WHERE language_id = 177 AND title LIKE '%Charity%';

-- 6. Atualizar textos de preços (se existirem na tabela packages)
UPDATE packages 
SET 
    title = 'Inicial',
    subtitle = 'Perfeito para começar'
WHERE language_id = 177 AND title LIKE '%Startup%';

UPDATE packages 
SET 
    title = 'Crescimento',
    subtitle = 'Ideal para empresas em expansão'
WHERE language_id = 177 AND title LIKE '%Growth%';

UPDATE packages 
SET 
    title = 'Maturidade',
    subtitle = 'Para empresas estabelecidas'
WHERE language_id = 177 AND title LIKE '%Maturity%';

-- 7. Atualizar textos de depoimentos (se existirem na tabela testimonials)
UPDATE testimonials 
SET 
    comment = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
    name = 'Banega',
    occupation = 'Chef, Jastiford'
WHERE language_id = 177 AND name LIKE '%Banega%';

UPDATE testimonials 
SET 
    comment = 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum',
    name = 'Barella',
    occupation = 'Gerente de Banco'
WHERE language_id = 177 AND name LIKE '%Barella%';

UPDATE testimonials 
SET 
    comment = 'evita o prazer em si, porque é prazer, mas porque aqueles que não sabem como',
    name = 'Jorginho',
    occupation = 'CEO, Malao'
WHERE language_id = 177 AND name LIKE '%Jorginho%';

UPDATE testimonials 
SET 
    comment = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
    name = 'Insigne',
    occupation = 'Treinador, Raoland'
WHERE language_id = 177 AND name LIKE '%Insigne%';

-- 8. Atualizar textos de blogs (se existirem na tabela blogs)
UPDATE blogs 
SET 
    title = 'consectetur, adipisci velit, sed quia non numquam eius',
    content = 'Existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu...',
    category = 'Tecnologia'
WHERE language_id = 177 AND title LIKE '%consectetur%';

UPDATE blogs 
SET 
    title = 'Por outro lado, denunciamos com indignação justa',
    content = 'Por outro lado, denunciamos com indignação justa e desgostamos dos homens que são tão begui...',
    category = 'Internacional'
WHERE language_id = 177 AND title LIKE '%On the other hand%';

UPDATE blogs 
SET 
    title = 'At vero eos et accusamus et iusto odio dignissimos ducimus',
    content = 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volu...',
    category = 'Estilo de Vida'
WHERE language_id = 177 AND title LIKE '%At vero eos%';

-- 9. Atualizar textos de páginas (se existirem na tabela pages)
UPDATE pages 
SET 
    title = 'Links Úteis',
    content = 'Links importantes para navegação'
WHERE language_id = 177 AND title LIKE '%Useful Links%';

UPDATE pages 
SET 
    title = 'Nossos Blogs',
    content = 'Acesse todos os nossos artigos'
WHERE language_id = 177 AND title LIKE '%Our Blogs%';

UPDATE pages 
SET 
    title = 'Entre em Contato',
    content = 'Entre em contato conosco'
WHERE language_id = 177 AND title LIKE '%Contact Us%';

UPDATE pages 
SET 
    title = 'Política de Privacidade',
    content = 'Nossa política de privacidade'
WHERE language_id = 177 AND title LIKE '%Privacy Policy%';

UPDATE pages 
SET 
    title = 'Termos e Condições',
    content = 'Nossos termos e condições'
WHERE language_id = 177 AND title LIKE '%Terms & Conditions%';

UPDATE pages 
SET 
    title = 'Sobre Nós',
    content = 'Conheça mais sobre nossa empresa'
WHERE language_id = 177 AND title LIKE '%About Us%';

-- 10. Atualizar textos de FAQ (se existirem na tabela faqs)
UPDATE faqs 
SET 
    question = 'Como posso começar?',
    answer = 'Você pode começar escolhendo um de nossos modelos e personalizando-o conforme suas necessidades.'
WHERE language_id = 177 AND question LIKE '%How can I start%';

UPDATE faqs 
SET 
    question = 'Vocês oferecem suporte?',
    answer = 'Sim, oferecemos suporte completo para todos os nossos clientes.'
WHERE language_id = 177 AND question LIKE '%Do you offer support%';

UPDATE faqs 
SET 
    question = 'Posso personalizar o modelo?',
    answer = 'Sim, todos os nossos modelos são totalmente personalizáveis.'
WHERE language_id = 177 AND question LIKE '%Can I customize%';

-- Verificar se as atualizações foram aplicadas
SELECT 'Verificação das atualizações:' as status;
SELECT COUNT(*) as basic_settings_updated FROM basic_settings WHERE language_id = 177 AND intro_title LIKE '%Construa%';
SELECT COUNT(*) as home_page_texts_updated FROM user_home_page_texts WHERE language_id = 177 AND about_title LIKE '%Sobre%';
SELECT COUNT(*) as features_updated FROM features WHERE language_id = 177 AND title LIKE '%Personalizado%';
SELECT COUNT(*) as processes_updated FROM processes WHERE language_id = 177 AND title LIKE '%Modelo%';
SELECT COUNT(*) as templates_updated FROM templates WHERE language_id = 177 AND title LIKE '%Agência%';
SELECT COUNT(*) as packages_updated FROM packages WHERE language_id = 177 AND title LIKE '%Inicial%';
SELECT COUNT(*) as testimonials_updated FROM testimonials WHERE language_id = 177 AND name LIKE '%Banega%';
SELECT COUNT(*) as blogs_updated FROM blogs WHERE language_id = 177 AND title LIKE '%consectetur%';
SELECT COUNT(*) as pages_updated FROM pages WHERE language_id = 177 AND title LIKE '%Links%';
SELECT COUNT(*) as faqs_updated FROM faqs WHERE language_id = 177 AND question LIKE '%começar%';
