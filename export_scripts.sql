# Script para Exportar Dados Específicos

# 1. Exportar apenas os templates Genex e Boutique
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" u819562010_buscriador users --where="username IN ('Genex','Boutique')" > templates_export.sql

# 2. Exportar configurações básicas
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" u819562010_buscriador basic_settings basic_extendeds > config_export.sql

# 3. Exportar dados de usuários (se necessário)
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" u819562010_buscriador users --where="id IN (175,230)" > users_export.sql
