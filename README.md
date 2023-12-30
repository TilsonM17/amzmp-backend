## Introdução

Este projeto usa as seguintes tecnologias

- CI4
- Bootstrap
- PHP8.1
- Docker
- Make (Opcional)

Usei o Docker para que tivesse facilidade e unificação de ambientes no momento de avaliar a aplicação. Mas ele pode ser testado sem o docker. **Mas incentivo-lhe fortemente a usar o docker**

Caso decida usar a Aplicação sem o Docker, os passos são os mesmos:

- Criar o arquivo **.env** tendo como modelo o .env.example

- Definir no arquivo .env a conexão com o banco de dados

- Rodar as Migrations

- Rodar o Seed da aplicação

Mas volto a reforçar: **Incentivo-lhe fortemente a usar o docker**

> Utilizei o Make para facilitar a execução dos comandos, se não tiver o make, basta executar os comandos do arquivo Makefile, que estão no arquivo Makefile na raiz do projeto, caso queira executar os comandos manualmente, basta abrir o arquivo Makefile e executar os comandos que estão dentro dele.
        Caso queira instalar o make, basta seguir esse breve artigo: [Instalando o make](https://linuxhint.com/install-make-ubuntu/)

## Instalação

Clone o projeto e entre na pasta do projeto.

### Levantar os containers

Execute o comando abaixo para levantar e preparar todo o ambiente.

```sh 
make setup
```

Acesse o seu [localhost](http://localhost) e comece a testar a aplicação.

Para fazer login use as credenciais: 

- Email: **admin@admin.com** 
- Senha: **admin**


## Considerações Finais

Para cadastrar um endereço use um CEP, como exemplo pode usar o seguinte CEP: **01001000**

Qualquer duvida fico ao dispor para ajudar.
