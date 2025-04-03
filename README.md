# Calculadora de Preços
![image](https://github.com/user-attachments/assets/57670fe0-3222-4b5c-868a-360b4d3b34c5)

## Descrição
Projeto para simulação de preços. Esta é a primeira versão do projeto, focada na criação de um dashboard para cálculo de margem de lucro.

## Arquitetura
O projeto utiliza a arquitetura MVC (Model-View-Controller) para organizar o código. Atualmente, está implementado com PHP puro, JavaScript, MySQL, HTML e CSS.

## Estrutura do Projeto
- **Model**: Gerencia a lógica dos dados e a interação com o banco de dados.
- **View**: Renderiza a interface do usuário, exibindo os dados, vale salientar que não implementei as heuristicas de usabilidade propostas por Nielsen.
- **Controller**: Interage com ambos, Model e View, para processar as entradas do usuário e retornar os resultados.

## Tecnologias Utilizadas
- **PHP**: Linguagem de programação principal.
- **JavaScript**: Para manipulação e interatividade do frontend.
- **MySQL**: Banco de dados para armazenar os dados da aplicação.
- **HTML**: Estruturação das páginas web.
- **CSS**: Estilização das páginas web.

## Telas do Projeto

### Tela de Cadastro e Login
A tela de cadastro e login permitem que os usuários insiram dados necessários para a simulação de preços. Não criei uma verificação muito robusta ainda devido ao projeto ser pequeno, mas pretendo implementar melhores verificações além do hash de senha.
Aqui está um exemplo de como as telas de cadastro e login são:

![image](https://github.com/user-attachments/assets/e1bf4f2d-6006-43cc-8319-81f36e7d1230)
![image](https://github.com/user-attachments/assets/1b63565a-51db-4289-ae56-68ec0ede1f36)



### Tela do Dashboard
O dashboard exibe os cálculos de margem de lucro e outras estatísticas importantes. Ele será aprimorado futuramente para incluir gráficos interativos e novos tipos de cálculos. Veja um exemplo da tela do dashboard:
![image](https://github.com/user-attachments/assets/c3b354d8-0b77-4cb6-818e-152b9a1ce55d)

## Fase Atual
Ainda estou testando algumas funcionalidades e corrigindo pequenos bugs no sistema, pretendo refatorar o css e colocar algumas mascaras para o calculo de preços pelo js.
Também estou com uma equipe implementando novos calculos para tornar o projeto mais robusto.

## Próximos Passos
- **Investir em um framework**: Planejamos migrar para um framework PHP para melhorar a organização e escalabilidade do projeto. - (A prioridade desse é mínima no momento)
- **Gráficos Interativos**: Implementação de gráficos interativos utilizando APIs para novos tipos de cálculo.  
- **Novas Tabelas no Banco de Dados**: Adicionar novas tabelas para suportar funcionalidades adicionais.
- **Cálculos Adicionais**: Além do cálculo de margem de lucro, planeja-se adicionar novos tipos de cálculos ao dashboard.
- **Taxa de Juros**: tela Adicional para calculo de taxa de juros com intervalo de tempos.
- **Calculo de inflação**: Usaremos API do Banco Central para trazer os dados corretos.  

## Contribuição
Se você deseja contribuir para este projeto, fique à vontade para abrir uma issue ou enviar um pull request.  
Para mais detalhes, acesse o [readmeContribuitor.md](./readmeContribuitor.md).

