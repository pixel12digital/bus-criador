<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => config('installer.item_name') . ' Instalador',
    'next' => 'Próximo Passo',
    'back' => 'Anterior',
    'finish' => 'Instalar',
    'forms' => [
        'errorTitle' => 'Os seguintes erros ocorreram:',
    ],

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Bem-vindo',
        'title'   => config('installer.item_name') . ' Instalador',
        'message' => 'Assistente de Instalação e Configuração Fácil.',
        'next'    => 'Verificar Requisitos',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Passo 1 | Requisitos do Servidor',
        'title' => 'Requisitos do Servidor',
        'next'    => 'Verificar Permissões',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Passo 2 | Permissões',
        'title' => 'Permissões',
        'next' => 'Configurar Ambiente',
    ],

    /*
     *
     * License page translations.
     *
     */
    'license' => [
        'templateTitle' => 'Passo 3 | Verificação de Licença',
        'title' => 'Verificações de Licença',
        'next' => 'Verificar',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Passo 3 | Configurações do Ambiente',
            'title' => 'Configurações do Ambiente',
            'desc' => 'Por favor, selecione como você quer configurar o arquivo <code>.env</code> do aplicativo.',
            'wizard-button' => 'Configuração do Assistente de Formulário',
            'classic-button' => 'Editor de Texto Clássico',
        ],
        'wizard' => [
            'templateTitle' => 'Passo 4 | Configuração do Ambiente e Banco de Dados',
            'title' => 'Configuração do Ambiente e Banco de Dados',
            'tabs' => [
                'environment' => 'Ambiente',
                'database' => 'Banco de Dados',
                'application' => 'Aplicativo',
            ],
            'form' => [
                'name_required' => 'Um nome de ambiente é obrigatório.',
                'app_name_label' => 'Nome do App',
                'app_name_placeholder' => 'Nome do App',
                'app_environment_label' => 'Ambiente do App',
                'app_environment_label_local' => 'Local',
                'app_environment_label_developement' => 'Desenvolvimento',
                'app_environment_label_qa' => 'QA',
                'app_environment_label_production' => 'Produção',
                'app_environment_label_other' => 'Outro',
                'app_environment_placeholder_other' => 'Digite seu ambiente...',
                'app_debug_label' => 'Debug do App',
                'app_debug_label_true' => 'Verdadeiro',
                'app_debug_label_false' => 'Falso',
                'app_log_level_label' => 'Nível de Log do App',
                'app_log_level_label_debug' => 'debug',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notice',
                'app_log_level_label_warning' => 'warning',
                'app_log_level_label_error' => 'error',
                'app_log_level_label_critical' => 'critical',
                'app_log_level_label_alert' => 'alert',
                'app_log_level_label_emergency' => 'emergency',
                'app_url_label' => 'URL do App',
                'app_url_placeholder' => 'URL do App',
                'website_host_label' => 'Host do Site',
                'website_host_placeholder' => 'Host do Site',
                'db_connection_failed' => 'Não foi possível conectar ao banco de dados.',
                'db_connection_label' => 'Conexão do Banco de Dados',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Host do Banco de Dados',
                'db_host_placeholder' => 'Host do Banco de Dados',
                'db_port_label' => 'Porta do Banco de Dados',
                'db_port_placeholder' => 'Porta do Banco de Dados',
                'db_name_label' => 'Nome do Banco de Dados',
                'db_name_placeholder' => 'Nome do Banco de Dados',
                'db_username_label' => 'Nome de Usuário do Banco de Dados',
                'db_username_placeholder' => 'Nome de Usuário do Banco de Dados',
                'db_password_label' => 'Senha do Banco de Dados',
                'db_password_placeholder' => 'Senha do Banco de Dados',

                'app_tabs' => [
                    'more_info' => 'Mais Informações',
                    'broadcasting_title' => 'Broadcasting, Cache, Sessão e Fila',
                    'broadcasting_label' => 'Driver de Broadcast',
                    'broadcasting_placeholder' => 'Driver de Broadcast',
                    'cache_label' => 'Driver de Cache',
                    'cache_placeholder' => 'Driver de Cache',
                    'session_label' => 'Driver de Sessão',
                    'session_placeholder' => 'Driver de Sessão',
                    'queue_label' => 'Driver de Fila',
                    'queue_placeholder' => 'Driver de Fila',
                    'redis_label' => 'Driver Redis',
                    'redis_host' => 'Host Redis',
                    'redis_password' => 'Senha Redis',
                    'redis_port' => 'Porta Redis',

                    'mail_label' => 'Email',
                    'mail_driver_label' => 'Driver de Email',
                    'mail_driver_placeholder' => 'Driver de Email',
                    'mail_host_label' => 'Host de Email',
                    'mail_host_placeholder' => 'Host de Email',
                    'mail_port_label' => 'Porta de Email',
                    'mail_port_placeholder' => 'Porta de Email',
                    'mail_username_label' => 'Nome de Usuário de Email',
                    'mail_username_placeholder' => 'Nome de Usuário de Email',
                    'mail_password_label' => 'Senha de Email',
                    'mail_password_placeholder' => 'Senha de Email',
                    'mail_encryption_label' => 'Criptografia de Email',
                    'mail_encryption_placeholder' => 'Criptografia de Email',

                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'ID do App Pusher',
                    'pusher_app_id_palceholder' => 'ID do App Pusher',
                    'pusher_app_key_label' => 'Chave do App Pusher',
                    'pusher_app_key_palceholder' => 'Chave do App Pusher',
                    'pusher_app_secret_label' => 'Segredo do App Pusher',
                    'pusher_app_secret_palceholder' => 'Segredo do App Pusher',
                ],
                'buttons' => [
                    'setup_database' => 'Configurar Banco de Dados e Ambiente',
                    'setup_application' => 'Configurar Aplicativo',
                    'install' => 'Instalar',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Passo 3 | Configurações do Ambiente | Editor Clássico',
            'title' => 'Editor de Ambiente Clássico',
            'save' => 'Salvar .env',
            'back' => 'Usar Assistente de Formulário',
            'install' => 'Salvar e Instalar',
        ],
        'success' => 'As configurações do seu arquivo .env foram salvas.',
        'errors' => 'Não foi possível salvar o arquivo .env, por favor, crie-o manualmente.',
    ],

    'install' => 'Instalar',

    /*
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => config('installer.item_name') . ' INSTALADO com sucesso em ',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Instalação Finalizada',
        'templateTitle' => 'Instalação Finalizada',
        'finished' => 'O aplicativo foi instalado com sucesso.',
        'migration' => 'Saída do Console de Migração e Seed:',
        'console' => 'Saída do Console do Aplicativo:',
        'log' => 'Entrada do Log de Instalação:',
        'env' => 'Arquivo .env Final:',
        'exit' => 'Clique aqui para sair',
    ],

    /*
     *
     * Update specific translations
     *
     */
    'updater' => [
        /*
         *
         * Shared translations.
         *
         */
        'title' => 'Atualizador Laravel',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Bem-vindo ao Atualizador',
            'message' => 'Bem-vindo ao assistente de atualização.',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Visão Geral',
            'message' => 'Há 1 atualização.|Há :number atualizações.',
            'install_updates' => 'Instalar Atualizações',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finalizado',
            'finished' => 'O banco de dados do aplicativo foi atualizado com sucesso.',
            'exit' => 'Clique aqui para sair',
        ],

        'log' => [
            'success_message' => 'Instalador Laravel ATUALIZADO com sucesso em ',
        ],
    ],
];
