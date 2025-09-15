# =====================================================
# SCRIPT PARA LIMPAR CACHE EM PRODUÇÃO (WINDOWS)
# =====================================================
# Execute este script após executar os SQLs

Write-Host "🧹 Limpando cache da aplicação..." -ForegroundColor Green

# Limpar cache da aplicação
php artisan cache:clear
Write-Host "✅ Cache da aplicação limpo" -ForegroundColor Green

# Limpar cache de configuração
php artisan config:clear
Write-Host "✅ Cache de configuração limpo" -ForegroundColor Green

# Limpar cache de views
php artisan view:clear
Write-Host "✅ Cache de views limpo" -ForegroundColor Green

# Limpar cache de rotas
php artisan route:clear
Write-Host "✅ Cache de rotas limpo" -ForegroundColor Green

Write-Host ""
Write-Host "🎉 Todos os caches foram limpos com sucesso!" -ForegroundColor Yellow
Write-Host "📝 Agora recarregue a página do painel administrativo" -ForegroundColor Cyan
Write-Host ""

# Verificar se as traduções estão funcionando
Write-Host "🔍 Testando traduções:" -ForegroundColor Blue
php artisan tinker --execute="echo 'Dashboard: ' . __('Dashboard') . PHP_EOL; echo 'Settings: ' . __('Settings') . PHP_EOL; echo 'User Management: ' . __('User Management') . PHP_EOL;"
