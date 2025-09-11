# 🔄 GUIA COMPLETO: Sincronização Banco Local ↔ Produção

## 📊 **Situação Atual:**
- **Banco Local:** u819562010_buscriador (Hostinger)
- **Banco Produção:** u819562010_buscriador (Hostinger)
- **Status:** Ambos usando o mesmo banco remoto

## ⚠️ **PROBLEMA IDENTIFICADO:**
Erro de conexão: `Access denied for user 'u819562010_buscriador'@'localhost'`

## 🔧 **SOLUÇÕES:**

### **Solução 1: Corrigir Conexão Local**
```bash
# 1. Verificar se o XAMPP está rodando
# 2. Testar conexão MySQL
mysql -h localhost -u u819562010_buscriador -p"Los@ngo#081081"

# 3. Se não conectar, usar IP da Hostinger
mysql -h 127.0.0.1 -u u819562010_buscriador -p"Los@ngo#081081"
```

### **Solução 2: Usar Banco Local Separado**
```bash
# 1. Criar banco local
mysql -u root -p
CREATE DATABASE bus_local;

# 2. Alterar .env para local
DB_HOST=127.0.0.1
DB_DATABASE=bus_local
DB_USERNAME=root
DB_PASSWORD=

# 3. Executar migrações
php artisan migrate

# 4. Importar dados da Hostinger
mysql -u root -p bus_local < backup_hostinger.sql
```

### **Solução 3: Sincronização via Hostinger**
```bash
# 1. Acessar phpMyAdmin da Hostinger
# 2. Exportar dados necessários
# 3. Importar no ambiente local

# Ou via SSH:
ssh usuario@hostinger.com
mysqldump -u u819562010_buscriador -p u819562010_buscriador > backup.sql
scp backup.sql usuario@localhost:/path/
```

## 🎯 **RECOMENDAÇÃO:**

### **Para Desenvolvimento Local:**
1. **Criar banco local separado**
2. **Manter .env local diferente**
3. **Sincronizar apenas quando necessário**

### **Para Produção:**
1. **Manter banco da Hostinger**
2. **Fazer backups regulares**
3. **Testar em staging primeiro**

## 📋 **COMANDOS ÚTEIS:**

```bash
# Verificar conexão
php artisan migrate:status

# Backup específico
mysqldump -h localhost -u u819562010_buscriador -p u819562010_buscriador users --where="username IN ('Genex','Boutique')" > templates.sql

# Restaurar backup
mysql -h localhost -u u819562010_buscriador -p u819562010_buscriador < backup.sql

# Verificar dados
php artisan tinker --execute="App\Models\User::whereIn('username', ['genex', 'boutique'])->get(['username', 'status']);"
```

## ⚡ **PRÓXIMOS PASSOS:**
1. Escolher uma das soluções acima
2. Testar conexão
3. Fazer backup de segurança
4. Executar sincronização
