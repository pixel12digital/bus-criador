# Script para Backup Completo

# 1. Backup completo do banco
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" u819562010_buscriador > backup_completo.sql

# 2. Backup apenas estrutura (sem dados)
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" --no-data u819562010_buscriador > estrutura.sql

# 3. Backup apenas dados (sem estrutura)
mysqldump -h localhost -u u819562010_buscriador -p"Los@ngo#081081" --no-create-info u819562010_buscriador > dados.sql
