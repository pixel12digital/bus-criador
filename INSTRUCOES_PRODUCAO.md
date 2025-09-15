# 🚀 Instruções para Corrigir Idioma em Produção

## 📋 **Scripts Gerados:**

1. `fix_production_language.sql` - Corrige o idioma padrão
2. `create_portuguese_menus.sql` - Cria menus em português
3. `clear_cache_production.sh` - Limpa cache (Linux/Mac)
4. `clear_cache_production.ps1` - Limpa cache (Windows)

---

## 🔧 **Passos para Executar:**

### **1. Execute o SQL Principal**
```sql
-- Execute no phpMyAdmin ou cliente MySQL:
fix_production_language.sql
```

**O que faz:**
- ✅ Define português (ID 176) como idioma padrão único
- ✅ Corrige o código para pt-BR se necessário
- ✅ Mostra verificações e confirmações

### **2. Execute o SQL de Menus (Opcional)**
```sql
-- Execute se alguns usuários não tiverem menus em português:
create_portuguese_menus.sql
```

**O que faz:**
- ✅ Cria menus em português para usuários sem menu
- ✅ Garante que todos tenham navegação em português

### **3. Limpe o Cache**

**Para Windows:**
```powershell
.\clear_cache_production.ps1
```

**Para Linux/Mac:**
```bash
chmod +x clear_cache_production.sh
./clear_cache_production.sh
```

**Ou manualmente:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

---

## ✅ **Verificações Finais:**

### **1. No Banco de Dados:**
```sql
-- Deve mostrar apenas 1 idioma como padrão
SELECT id, name, code, is_default 
FROM languages 
WHERE is_default = 1;
```

### **2. No Site:**
- 🌐 Acesse o painel administrativo
- 🔄 Recarregue a página
- ✅ Verifique se os textos aparecem em português

### **3. Teste as Traduções:**
```bash
php artisan tinker --execute="echo __('Dashboard'); echo __('Settings');"
```

---

## 🚨 **Problemas Comuns:**

### **Se os textos e imagens não carregarem:**

#### **🔍 DIAGNÓSTICO RÁPIDO:**
```bash
# Execute na produção para identificar o problema:
php diagnostico_producao.php
```

#### **🔧 CORREÇÃO AUTOMÁTICA:**
```bash
# Execute na produção para corrigir automaticamente:
php correcao_producao.php
```

#### **📋 CORREÇÃO MANUAL:**

1. **Execute o SQL de correção:**
   ```sql
   -- Cole o conteúdo de correcao_producao.sql no phpMyAdmin
   ```

2. **Verifique o arquivo .env:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_LOCALE=pt-BR
   APP_URL=https://seudominio.com
   ```

3. **Verifique permissões de diretórios:**
   ```bash
   chmod -R 755 storage/
   chmod -R 755 public/assets/
   ```

4. **Limpe todos os caches:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   php artisan route:clear
   ```

#### **🎯 PROBLEMAS ESPECÍFICOS:**

**Se as imagens não carregam:**
- Verifique se a pasta `public/assets/` existe
- Confirme permissões de leitura
- Verifique se as imagens foram enviadas para produção

**Se os textos não aparecem:**
- Confirme que existe `resources/lang/pt-BR.json`
- Verifique se o idioma padrão está correto no banco
- Execute o script de diagnóstico

---

## 📞 **Suporte:**

Se ainda houver problemas:
1. Verifique os logs: `storage/logs/laravel.log`
2. Confirme que o arquivo `resources/lang/pt-BR.json` existe
3. Teste com: `php artisan route:list | grep language`

---

## 🎯 **Resultado Esperado:**

Após executar todos os scripts:
- ✅ Português como idioma padrão único
- ✅ Todos os textos em português
- ✅ Menus traduzidos
- ✅ Interface completamente em português
