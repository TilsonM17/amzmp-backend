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

### Levantar os containers

Execute o comando abaixo para levantar e preparar todo o ambiente.

```sh 
make setup
```
## Considerações Finais

Qualquer duvida fico ao dispor para ajudar.