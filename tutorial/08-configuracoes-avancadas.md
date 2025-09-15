# 8. Configurações Avançadas

## 🎯 Visão Geral

Este capítulo aborda configurações avançadas que permitem personalizar ainda mais sua experiência no Businesso, incluindo integrações, APIs, e configurações técnicas.

## ⚙️ Configurações de Conta

### 👤 Perfil Avançado
**Acesse:** Configurações → Perfil Avançado

**Configurações disponíveis:**
```
👤 Informações Detalhadas:
├── 🏢 Dados da empresa
├── 📍 Endereço completo
├── 📞 Múltiplos telefones
├── 📧 Emails alternativos
├── 🌐 Websites relacionados
├── 🎯 Área de atuação
├── 📊 Tamanho da empresa
└── 🎨 Preferências visuais
```

### 🔐 Segurança Avançada
**Acesse:** Configurações → Segurança

**Opções de segurança:**
- **🔑 Autenticação 2FA**: Código SMS/Email
- **🔒 Senha forte**: Requisitos rigorosos
- **📱 Login por dispositivo**: Controle de acesso
- **⏰ Sessões**: Tempo limite automático
- **📊 Logs de acesso**: Histórico detalhado

### 🌍 Configurações Regionais
**Acesse:** Configurações → Regional

**Personalizações:**
```
🌍 Configurações Locais:
├── 🗣️ Idioma: Português, Inglês, Espanhol
├── 💰 Moeda: BRL, USD, EUR
├── 📅 Formato de data: DD/MM/AAAA
├── ⏰ Fuso horário: UTC-3 (Brasília)
├── 📏 Unidades: Métrico/Imperial
└── 🎯 Região: Brasil, América Latina
```

## 🔗 Integrações Disponíveis

### 📧 Email Marketing
**Plataformas suportadas:**

#### 📬 Mailchimp
**Configuração:**
1. **Acesse:** Integrações → Email Marketing
2. **Selecione Mailchimp**
3. **Insira API Key**
4. **Configure listas**
5. **Teste integração**

**Funcionalidades:**
- ✅ **Sincronização automática** de contatos
- ✅ **Segmentação** por comportamento
- ✅ **Campanhas** personalizadas
- ✅ **Relatórios** de entrega

#### 📧 ConvertKit
**Recursos disponíveis:**
- **🎯 Automação** de sequências
- **📊 Analytics** detalhados
- **🏷️ Tags** automáticas
- **📈 A/B Testing**

### 📊 Analytics e Tracking

#### 📈 Google Analytics
**Configuração:**
1. **Crie conta** no Google Analytics
2. **Obtenha Tracking ID**
3. **Configure no Businesso**
4. **Verifique dados** em 24h

**Métricas integradas:**
- **👀 Visitas** e usuários únicos
- **📱 Dispositivos** e navegadores
- **🌍 Localização** geográfica
- **📊 Comportamento** do usuário

#### 🔍 Google Search Console
**Benefícios:**
- **🔍 Posicionamento** nos resultados
- **📊 Impressões** e cliques
- **🚨 Problemas** de indexação
- **📈 Performance** de palavras-chave

### 💬 Chat e Comunicação

#### 💬 WhatsApp Business
**Integração:**
1. **Configure WhatsApp Business API**
2. **Adicione número** no Businesso
3. **Personalize mensagens**
4. **Ative notificações**

**Recursos:**
- **💬 Chat automático** no site
- **📱 Notificações** push
- **🎯 Mensagens** personalizadas
- **📊 Relatórios** de conversas

#### 📞 LiveChat
**Funcionalidades:**
- **👥 Atendimento** em tempo real
- **🎭 Agentes** personalizados
- **📱 App mobile** para atendentes
- **📊 Métricas** de performance

## 🔧 API e Desenvolvimento

### 🔑 Acesso à API
**Para desenvolvedores:**

#### 📋 Documentação
**Acesse:** Configurações → API

**Recursos disponíveis:**
```
🔧 Endpoints Principais:
├── 🌐 Sites: CRUD completo
├── 📇 vCards: Gerenciamento
├── 🔗 QR Codes: Geração
├── 📊 Analytics: Dados
├── 👤 Usuários: Gestão
└── 💳 Pagamentos: Status
```

#### 🔐 Autenticação
**Métodos suportados:**
- **🔑 API Key**: Simples e direto
- **🎫 OAuth 2.0**: Padrão moderno
- **🔒 JWT**: Tokens seguros
- **📱 Basic Auth**: Autenticação básica

#### 📝 Exemplo de Uso
```javascript
// Exemplo de integração com API
const api = {
  baseURL: 'https://api.businesso.com/v1',
  headers: {
    'Authorization': 'Bearer YOUR_API_KEY',
    'Content-Type': 'application/json'
  }
};

// Criar novo site
async function createSite(siteData) {
  const response = await fetch(`${api.baseURL}/sites`, {
    method: 'POST',
    headers: api.headers,
    body: JSON.stringify(siteData)
  });
  return response.json();
}
```

### 🛠️ Webhooks
**Para integrações em tempo real:**

#### 📡 Eventos Disponíveis
```
🎯 Eventos Suportados:
├── 👤 user.created: Novo usuário
├── 💳 payment.completed: Pagamento aprovado
├── 🌐 site.published: Site publicado
├── 📇 vcard.created: vCard criado
├── 🔗 qrcode.generated: QR Code gerado
└── 📊 analytics.updated: Dados atualizados
```

#### ⚙️ Configuração
1. **Acesse:** Configurações → Webhooks
2. **Adicione URL** de destino
3. **Selecione eventos** desejados
4. **Configure retry** e timeout
5. **Teste integração**

## 🎨 Personalização Avançada

### 🖼️ Upload de Assets
**Gerenciamento de arquivos:**

#### 📁 Tipos Suportados
```
🖼️ Imagens:
├── 📷 JPEG: Fotos e imagens
├── 🎨 PNG: Com transparência
├── 🎭 GIF: Animações
├── 📐 SVG: Vetores
└── 🌐 WebP: Otimizado

📄 Documentos:
├── 📋 PDF: Relatórios
├── 📊 Excel: Planilhas
├── 📝 Word: Documentos
└── 📊 PowerPoint: Apresentações
```

#### 📏 Limites e Otimização
**Especificações:**
- **📁 Tamanho máximo**: 50MB por arquivo
- **🖼️ Imagens**: Compressão automática
- **📊 Resolução**: Otimização para web
- **🗜️ Formato**: Conversão automática

### 🎭 Templates Personalizados
**Para usuários avançados:**

#### 🎨 CSS Customizado
**Acesse:** Configurações → CSS Avançado

**Exemplo de customização:**
```css
/* Personalização do header */
.header-custom {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Animação personalizada */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
```

#### 📱 JavaScript Personalizado
**Para funcionalidades extras:**
```javascript
// Exemplo de script personalizado
document.addEventListener('DOMContentLoaded', function() {
  // Animação suave para links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
});
```

## 📊 Configurações de Analytics

### 📈 Métricas Avançadas
**Acesse:** Configurações → Analytics

**Configurações disponíveis:**
```
📊 Opções de Tracking:
├── 👀 Google Analytics: ID de tracking
├── 📊 Facebook Pixel: Eventos personalizados
├── 🔍 Hotjar: Heatmaps e gravações
├── 📈 Mixpanel: Analytics avançado
├── 🎯 LinkedIn Insight: B2B tracking
└── 📱 Mobile Analytics: Apps específicos
```

### 🎯 Eventos Personalizados
**Configure eventos específicos:**
- **🛒 Conversões**: Objetivos de negócio
- **📞 Contatos**: Formulários preenchidos
- **🔗 Cliques**: Botões importantes
- **📱 Downloads**: Arquivos baixados

### 📊 Relatórios Personalizados
**Crie dashboards customizados:**
1. **Acesse:** Analytics → Relatórios
2. **Selecione métricas** desejadas
3. **Configure período** de análise
4. **Personalize visualização**
5. **Salve como template**

## 🔒 Configurações de Privacidade

### 🛡️ LGPD e Compliance
**Conformidade legal:**

#### 📋 Configurações LGPD
**Acesse:** Configurações → Privacidade

**Opções disponíveis:**
```
🛡️ Controles de Privacidade:
├── 🍪 Cookies: Gerenciamento
├── 📊 Analytics: Opt-in/opt-out
├── 📧 Marketing: Consentimento
├── 🔍 Tracking: Controle granular
├── 📱 Apps: Permissões
└── 🌍 Transferência: Dados internacionais
```

#### 📄 Termos e Políticas
**Documentos legais:**
- **📋 Termos de Uso**: Atualização automática
- **🔒 Política de Privacidade**: LGPD compliant
- **🍪 Política de Cookies**: Transparente
- **📧 Consentimento**: GDPR ready

### 🔐 Controle de Dados
**Gestão de informações:**

#### 📊 Exportação de Dados
**Para portabilidade:**
1. **Acesse:** Configurações → Dados
2. **Selecione tipo** de dados
3. **Configure período**
4. **Baixe arquivo** JSON/CSV

#### 🗑️ Exclusão de Dados
**Direito ao esquecimento:**
- **📊 Dados pessoais**: Remoção completa
- **📈 Analytics**: Anonimização
- **💳 Pagamentos**: Retenção legal
- **📧 Comunicações**: Arquivamento

## 🚀 Performance e Otimização

### ⚡ Configurações de Cache
**Para melhor performance:**

#### 🗄️ Cache de Conteúdo
```
⚡ Configurações de Cache:
├── 🌐 CDN: Distribuição global
├── 🖼️ Imagens: Compressão automática
├── 📄 HTML: Cache de páginas
├── 🎨 CSS/JS: Minificação
└── 📱 Mobile: Otimização específica
```

#### 🔄 Invalidação de Cache
**Controle manual:**
- **🔄 Limpeza global**: Todos os caches
- **📄 Página específica**: Cache seletivo
- **🖼️ Assets**: Imagens e arquivos
- **⏰ Agendamento**: Limpeza automática

### 📱 Otimização Mobile
**Configurações específicas:**

#### 📱 PWA (Progressive Web App)
**Recursos disponíveis:**
- **📱 Instalação**: App-like experience
- **🔄 Offline**: Funcionalidade básica
- **📱 Push**: Notificações nativas
- **⚡ Performance**: Carregamento rápido

#### 🎨 Mobile-First Design
**Princípios aplicados:**
- **📱 Touch-friendly**: Botões adequados
- **🔄 Gestos**: Swipe e pinch
- **📱 Orientação**: Portrait/landscape
- **⚡ Performance**: Otimização específica

---

## ➡️ Próximo Passo

Agora que você conhece as configurações avançadas, vamos aprender dicas e melhores práticas para otimizar seu uso da plataforma!

**Continue para:** [Dicas e Melhores Práticas →](09-dicas-melhores-praticas.md)

---

*💡 **Dica**: Sempre teste as configurações avançadas em ambiente de desenvolvimento antes de aplicar em produção. Isso evita problemas e garante a estabilidade do seu site.*
