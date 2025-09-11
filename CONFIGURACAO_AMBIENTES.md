# Configuração para Ambiente LOCAL vs PRODUÇÃO

## ✅ CONFIGURAÇÃO ATUAL (LOCAL)
```
APP_URL=http://bus.local
WEBSITE_HOST=bus.local
```

## 🔄 CONFIGURAÇÃO PARA PRODUÇÃO (HOSTINGER)

### 1. Variáveis que DEVEM ser alteradas na Hostinger:

```env
# Ambiente
APP_ENV=production
APP_DEBUG=false

# URLs - SUBSTITUIR pelo domínio real
APP_URL=https://seudominio.com
WEBSITE_HOST=seudominio.com

# Banco de dados - SUBSTITUIR pelas credenciais da Hostinger
DB_HOST=localhost
DB_DATABASE=nome_do_banco_hostinger
DB_USERNAME=usuario_hostinger
DB_PASSWORD=senha_hostinger
```

### 2. Comandos para aplicar na Hostinger:

```bash
# 1. Fazer backup do .env atual
cp .env .env.backup

# 2. Editar o .env com as configurações de produção
nano .env

# 3. Limpar cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# 4. Gerar nova chave se necessário
php artisan key:generate
```

### 3. Verificações importantes:

```bash
# Verificar se os templates existem
php artisan tinker --execute="App\Models\User::whereIn('username', ['genex', 'boutique'])->get(['username', 'status']);"

# Testar URLs dos templates
echo "Genex: //" . env('WEBSITE_HOST') . "/Genex"
echo "Boutique: //" . env('WEBSITE_HOST') . "/Boutique"
```

## ⚠️ PONTOS CRÍTICOS:

1. **WEBSITE_HOST** é a variável mais importante - deve apontar para o domínio correto
2. **APP_URL** deve corresponder ao domínio principal
3. **Banco de dados** deve ter os mesmos dados (usuários, templates)
4. **Virtual Hosts** na Hostinger devem estar configurados corretamente

## 🎯 RESULTADO ESPERADO:

- **Local**: `http://bus.local/Genex` e `http://bus.local/Boutique`
- **Produção**: `https://seudominio.com/Genex` e `https://seudominio.com/Boutique`
