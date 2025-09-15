#!/bin/bash

# =====================================================
# SCRIPT PARA LIMPAR CACHE EM PRODUÇÃO
# =====================================================
# Execute este script após executar os SQLs

echo "🧹 Limpando cache da aplicação..."

# Limpar cache da aplicação
php artisan cache:clear
echo "✅ Cache da aplicação limpo"

# Limpar cache de configuração
php artisan config:clear
echo "✅ Cache de configuração limpo"

# Limpar cache de views
php artisan view:clear
echo "✅ Cache de views limpo"

# Limpar cache de rotas
php artisan route:clear
echo "✅ Cache de rotas limpo"

# Limpar cache de sessões (se necessário)
# php artisan session:clear

echo ""
echo "🎉 Todos os caches foram limpos com sucesso!"
echo "📝 Agora recarregue a página do painel administrativo"
echo ""

# Verificar se as traduções estão funcionando
echo "🔍 Testando traduções:"
php artisan tinker --execute="
echo 'Dashboard: ' . __('Dashboard') . PHP_EOL;
echo 'Settings: ' . __('Settings') . PHP_EOL;
echo 'User Management: ' . __('User Management') . PHP_EOL;
"
