# ApiGranatum

Biblioteca PHP com classes auxiliares para integração com Granatum Financeiro

> ## [Granatum](http://www.granatum.com.br) é um aplicativo WEB para gestão financeira de excelente qualidade
> Sua API (Restful) fornece várias funcionalidades que são acessadas por estas classes.  

 - Bancos *(Listagem)*
 - Categorias *(Listagem, Inclusão, Alteração, Deleção)*
 - Centros Custo Lucro *(Listagem, Inclusão, Alteração, Deleção)*
 - Cidades *(Listagem)*
 - Clientes *(Listagem, Inclusão, Alteração, Deleção)*
 - Cobranças *(Listagem, Inclusão, Alteração, Deleção)*
 - Contas *(Listagem, Inclusão, Alteração, Deleção)*
 - Estados *(Listagem)*
 - Formas de Pagamentos *(Listagem, Inclusão, Alteração, Deleção)*
 - Fornecedores *(Listagem, Inclusão, Alteração, Deleção)*
 - Lançamentos *(Listagem, Inclusão, Alteração, Deleção)*

## Créditos

Estas classes foram desenvolvidas com base no repositório das classes criadas por Lucas Nunes Pinto Pinheiro.

[lucasnpinheiro/granatum](https://github.com/lucasnpinheiro/granatum) Ao qual agradeço muito a disponibilização livre de suas classes de integração.

## Instalação

composer install robmachado/apigranatum

## Dependências

- "php" : ">=7.0",
- "ext-curl": "*",
- "ext-json": "*",
- "curl/curl": "^1.8"

## Formas de uso

- Instanciar Connector::class (faz a comunicação usando Curl\Curl)
- Carregar a classe desejada usando Granatum::class
- Estabelecer o método desejado all(), get(), edit(), add(), ou delete()
- Passar os parâmetros estabelecidos pela API (e pela operação)
- O retorno sempre será uma string (json) ou um booleano
- Em caso de erros será retornado uma \Exception

### Exemplo de uso

```php
use ApiGranatum\Granatum;
use ApiGranatum\Connector;

$token = 'lkjd786487648746jhjhe989389syhhhwuh9837398739hdskh';
$version = 'v1';
$uri = 'https://api.granatum.com.br';

try {
    $conn = new Connector($token, $version, $uri);
    $b = Granatum::bancos($conn);
    $resp = $b->all();
    if (is_bool($resp)) {
        if (!$resp) {
            echo "Fracasso. Falhou !";
        } else {
            echo "Sucesso!!";
        }
    } else {
        echo "<pre>";
        print_r($resp);
        echo "</pre>";
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

**MIT License**

Copyright (c) 2018 Roberto Leite Machado

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.