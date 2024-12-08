# OWASP *Top 10 Vulnerabilities*

Este projeto foi desenvolvido no âmbito da Unidade Curricular **Segurança de Redes (SR)** do 1º semestre do 1º ano do **Mestrado em Segurança Informática (MSI)** da **Faculdade de Ciências da Universidade do Porto (FCUP)**, no ano letivo 2024/2025.

**Autores:** Turma CC4031_TP2 - Grupo TP2_2
- Manuel Ramos Leite Carvalho Neto - up202108744 - [up202108744@up.pt](mailto:up202108744@up.pt)
- Maria Sousa Carreira - up202408787 - [up20248787@up.pt](mailto:up20248787@up.pt)
- Matilde Isabel da Silva Simões - up202108782 - [up202108782@up.pt](mailto:up202108782@up.pt)

## Instruções de Execução

**Requisito:** [Docker](https://www.docker.com/)

```
cd code
chmod 777 start.sh
./start.sh
```

O *script* `start.sh` inicializa os ficheiros necessários e lança dois *containers* com os servidores.

| Servidor       | Porto | URL                   | Administrador | Palavra-Passe |
|----------------| ----- |-----------------------| ------------- | ------------- |
| **Vulnerável** | 8000 | http://localhost:8000 | vulnerable | vulnerable |
| **Mitigado**   | 8001 | https://localhost:8001 | mitigated | mitigated |

O *script* `end.sh` para os *containers*, elimina-os e limpa os ficheiros criados durante a execução.

**Nota:** para evitar conflitos por causa da cache do *browser*, pode ser recomendável aceder a um dos servidores em navegação anónima.
