
# Contribuindo para o Projeto

Obrigado por querer contribuir para o nosso projeto! Este guia irá detalhar como configurar o ambiente de desenvolvimento, criar branches, fazer commits, abrir pull requests, e acompanhar tarefas no backlog.

---

## Objetivo

Garantir que todos os contribuidores sigam um fluxo de trabalho organizado e consistente, mantendo controle eficiente sobre as tarefas e versões do projeto.

---

## Configurando o Ambiente

1. Clone o repositório para o seu computador:
```bash
 git clone <URL_DO_REPOSITORIO>
```

2. Entre na pasta do projeto:
```bash
 cd <NOME_DA_PASTA>
```

3. Instale as dependências necessárias (se houver):
```bash
 # Exemplo para projetos Node.js
 npm install

 # Exemplo para projetos Python
 pip install -r requirements.txt
```

4. Crie um arquivo de configuração `.env` (se necessário) baseado no `.env.example` disponível no projeto.

---

## Trabalhando no Projeto

### 1. Acessar o Backlog

- Acompanhe as tarefas atribuídas no backlog do projeto (Jira, Trello, GitHub Projects, etc.).
- Escolha uma tarefa para trabalhar e mude seu status para "Em Progresso".
- Certifique-se de entender todos os requisitos da tarefa antes de iniciar.

### 2. Criar e Trabalhar em uma Branch

Sempre trabalhe em uma branch separada para facilitar o controle de versões e evitar conflitos na `main`.

1. Crie uma nova branch com nome descritivo referente à tarefa do backlog:
```bash
 git checkout -b nome-da-sua-branch
```

2. Faça suas alterações e commit nelas:
```bash
 git add .
 git commit -m "Descrição clara e objetiva do que foi feito"
```

3. Mantenha sua branch atualizada com a `main`:
```bash
 git pull origin main
```

---

## Enviando as Mudanças (Push)

1. Envie sua branch para o repositório remoto:
```bash
 git push origin nome-da-sua-branch
```

---

## Criando um Pull Request

### No GitHub:

1. Acesse o repositório no GitHub e clique em "Pull requests".
2. Clique em "New Pull Request".
3. Escolha a sua branch e compare com a `main`.
4. Preencha o título e a descrição do Pull Request com informações detalhadas sobre o que foi alterado.
5. Associe a tarefa correspondente do backlog ao Pull Request, se possível.
6. Clique em "Create Pull Request".

---

## Revisão e Merge

1. Espere a revisão do código por parte dos administradores ou colegas.
2. Realize ajustes se necessário e atualize o Pull Request.
3. Quando aprovado, o Merge será feito na `main`.
4. Marque a tarefa correspondente no backlog como "Concluído".

---

## Boas Práticas

- Sempre crie branches com nomes claros e descritivos (ex.: `feature/login-page`, `bugfix/corrige-erro-x`).
- Faça commits pequenos e frequentes, com mensagens que expliquem bem as alterações.
- Sempre mantenha sua branch atualizada com a `main` antes de criar um Pull Request.
- Faça revisões de código com atenção e forneça feedbacks construtivos.
- Acompanhe regularmente as tarefas no backlog e atualize o status adequadamente.

---

Qualquer dúvida, consulte o backlog ou entre em contato com o time.
