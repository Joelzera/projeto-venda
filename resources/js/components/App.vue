<template>
  <div
    style="
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 2rem;
      padding: 2rem;
      flex-wrap: wrap;
    "
  >
    <!-- Coluna 1 -->
    <div style="display: flex; flex-direction: column; gap: 2rem">
      <!-- Cadastro do Cliente -->
      <form class="row g-3" @submit.prevent="enviarFormulario('cliente')">
        <div class="card" style="width: 40rem">
          <div class="card-body">
            <h5 class="card-title">Cadastro do Cliente</h5>

            <label for="nome" class="form-label">Nome</label>
            <input
              type="text"
              class="form-control"
              id="nome"
              v-model="formCostumer.name"
            />

            <div class="row">
              <div class="col-md-6">
                <label for="cpf" class="form-label">CPF/CNPJ</label>
                <input
                  type="text"
                  class="form-control"
                  id="cpf"
                  v-model="formCostumer.cpf"
                />
              </div>
              <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input
                  type="text"
                  class="form-control"
                  id="telefone"
                  v-model="formCostumer.telefone"
                />
              </div>
            </div>

            <label for="email" class="form-label mt-2">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              v-model="formCostumer.email"
            />

            <div class="mt-3 d-flex justify-content-between">
              <button
                type="submit"
                style="width: 140px"
                class="btn btn-primary"
              >
                Salvar
              </button>
            </div>

            <!-- ⬇ Tabela dentro do card-body com rolagem horizontal opcional -->
            <div style="overflow-x: auto; margin-top: 1rem">
              <table
                class="table table-bordered"
                style="width: 100%; box-sizing: border-box"
              >
                <thead class="table-light">
                  <tr>
                    <td>Nome</td>
                    <td>CPF/CNPJ</td>
                    <td>Telefone</td>
                    <td>Email</td>
                    <td>Ações</td>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.cpf }}</td>
                    <td>{{ customer.telefone }}</td>
                    <td>{{ customer.email }}</td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-warning btn-sm mb-2"
                        @click="editarCliente(customer)"
                      >
                        Editar
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deletarCliente(customer.id)"
                      >
                        Excluir
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>

      <!-- Cadastro de Produtos -->
      <form @submit.prevent="enviarFormulario('produto')">
        <div class="card" style="width: 40rem">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

            <label for="nome-produto" class="form-label">Nome do Produto</label>
            <input
              type="text"
              class="form-control"
              id="nome-produto"
              v-model="formProducts.name"
            />

            <label for="marca" class="form-label mt-2">Marca</label>
            <select class="form-select" id="marca" v-model="formProducts.mark">
              <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                {{ brand.name }}
              </option>
            </select>

            <label for="descricao" class="form-label mt-2">Descrição</label>
            <input
              type="text"
              class="form-control"
              id="descricao"
              v-model="formProducts.description"
            />

            <label for="valor" class="form-label mt-2">Valor</label>
            <input
              type="text"
              class="form-control"
              id="valor"
              v-model="formProducts.value"
            />

            <div class="mt-3 d-flex justify-content-between">
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 140px"
              >
                Salvar
              </button>
            </div>
            <div style="overflow-x: auto; margin-top: 1rem">
              <table
                class="table table-bordered"
                style="width: 100%; box-sizing: border-box"
              >
                <thead class="table-light">
                  <tr>
                    <td>Produto</td>
                    <td>Marca</td>
                    <td>Descrição</td>
                    <td>Valor</td>
                    <td>Ações</td>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product in products" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.mark }}</td>
                    <td>{{ product.description }}</td>
                    <td>R$ {{ product.value }}</td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-warning btn-sm me-1"
                        @click="editarProduto(product)"
                      >
                        Editar
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm "
                        @click="deletarProduto(product.id)"
                      >
                        Excluir
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Coluna 2 -->
    <div style="display: flex; flex-direction: column; gap: 2rem">
      <!-- Cadastro de Marcas -->
      <form @submit.prevent="enviarFormulario('marca')">
        <div class="card" style="width: 20rem">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Marcas</h5>

            <label for="marca-nome" class="form-label">Nome da Marca</label>
            <input
              type="text"
              class="form-control"
              id="marca-nome"
              v-model="formBrands.name"
            />

            <div class="mt-3 d-flex justify-content-between">
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 140px"
              >
                Salvar
              </button>
            </div>
            <div style="overflow-x: auto; margin-top: 1rem">
              <table
                class="table table-bordered"
                style="width: 100%; box-sizing: border-box"
              >
                <thead class="table-light">
                  <tr>
                    <td>Marca</td>
                    <td>Ações</td>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="brand in brands" :key="brand.id">
                    <td>{{ brand.name }}</td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-warning btn-sm me-2"
                        @click="editarMarca(brand)"
                      >
                        Editar
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deletarMarca(brand.id)"
                      >
                        Excluir
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>

      <!-- Vendas -->
      <form @submit.prevent="enviarFormulario('venda')">
        <div class="card" style="width: 20rem">
          <div class="card-body">
            <h5 class="card-title">Venda</h5>

            <label for="venda-cliente" class="form-label">Cliente</label>
            <select
              class="form-select"
              id="venda-cliente"
              v-model="formSale.customer"
            >
              <option
                v-for="customer in customers"
                :key="customer.id"
                :value="customer.id"
              >
                {{ customer.name }}
              </option>
            </select>

            <div class="row">
              <div class="col-md-4">
                <label for="venda-produto" class="form-label mt-2"
                  >Produto</label
                >
                <select
                  class="form-select"
                  id="venda-produto"
                  v-model="formSale.product"
                >
                  <option
                    v-for="product in products"
                    :key="product.id"
                    :value="product.id"
                  >
                    {{ product.name }}
                  </option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="quantidade" class="form-label mt-2"
                  >Quantidade</label
                >
                <input
                  type="number"
                  class="form-control"
                  id="quantidade"
                  v-model="formSale.qty"
                />
              </div>
              <div class="col-md-4">
                <label for="valor-total" class="form-label mt-2"
                  >Valor Total</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="valor-total"
                  v-model="formSale.total"
                  readonly
                />
              </div>
            </div>

            <button
              type="button"
              class="btn btn-primary mt-3"
              style="width: 285px"
              @click="adicionarItemVenda"
            >
              Adicionar Produto
            </button>
            <div style="overflow-x: auto; margin-top: 1rem">
              <table
                class="table table-bordered"
                style="width: 100%; box-sizing: border-box"
              >
                <thead class="table-light">
                  <tr>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Total</td>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in itensVenda" :key="index">
                    <td>{{ item.name }}</td>
                    <td>{{ item.qty }}</td>
                    <td>{{ item.total }}</td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-bordered"
                style="width: 100%; box-sizing: border-box"
              >
                <thead class="table-light">
                  <tr>
                    <td>Valor total</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <strong>R$ {{ totalGeralVenda }}</strong>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="mt-3 d-flex justify-content-between">
              <button
                type="submit"
                class="btn btn-success"
                style="width: 500px"
              >
                Finalizar Venda
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
   //Função principal, define os dados (estado) do componente
  data() {
    return {
      formCostumer: {
        name: "",
        cpf: "",
        telefone: "",
        email: "",
      },
      formProducts: {
        name: "",
        mark: "",
        description: "",
        value: "",
      },
      formBrands: {
        name: "",
      },
      formSale: {
        customer: "",
        product: "",
        qty: "",
        total: 0,
      },
      brands: [],
      customers: [],
      products: [],
      sales: [],
      
      // Lista temporária de itens da venda atual (antes de salvar)
      itensVenda: [],

      // Listas que armazenam os dados vindos da API
      clienteEmEdicao: null,
      ProdutoEmEdicao: null,
      MarcaEmEdicao: null,
    };
  },

  mounted() {
      // Faz uma requisição GET para buscar todas as marcas cadastradas no banco
    axios
      .get("http://127.0.0.1:8000/api/marcas")
      .then((res) => {
         // Se a requisição for bem-sucedida, armazena os dados na propriedade brands
        this.brands = res.data;
      })
      .catch((err) => {
         // Caso ocorra um erro, exibe no console
        console.error("Erro ao carregar marcas:", err);
      });

    axios
      .get("http://127.0.0.1:8000/api/clientes")
      .then((res) => {
        this.customers = res.data;
      })
      .catch((err) => {
        console.error("Erro ao carregar clientes:", err);
      });

    axios
      .get("http://127.0.0.1:8000/api/produtos")
      .then((res) => {
        this.products = res.data;
      })
      .catch((err) => {
        console.error("Erro ao carregar os produtos:", err);
      });

    axios
      .get("http://127.0.0.1:8000/api/vendas")
      .then((res) => {
        this.sales = res.data;
      })
      .catch((err) => {
        console.error("Erro ao carregar vendas:", err);
      });
  },

  computed: {
    // retorna o objeto do produto selecionado (ou null)
    selectedProduct() {
      return this.products.find((p) => p.id === this.formSale.product) || null;
    },
    // calcula automaticamente o total
    calculatedTotal() {
      if (!this.selectedProduct) return 0;
      // multiplica qty pelo valor unitário
      return (this.selectedProduct.value * this.formSale.qty).toFixed(2);
    },

    totalGeralVenda() {
      return this.itensVenda
        .reduce((total, item) => {
          const valor = parseFloat(item.total) || 0;
          return total + valor;
        }, 0)
        .toFixed(2);
    },
  },

  watch: {
    // sempre que mudar produto ou qty, atualiza formSale.total
    "formSale.product"() {
      this.formSale.total = this.calculatedTotal;
    },
    "formSale.qty"() {
      this.formSale.total = this.calculatedTotal;
    },
  },

  methods: {
    // Função principal para envio de formulários, baseada no tipo de entidade
    enviarFormulario(tipo) {
       // Se for cliente
      if (tipo === "cliente") {
        if (this.clienteEmEdicao) {
          // Requisição PUT para atualizar o cliente
          axios
            .put(
              `http://127.0.0.1:8000/api/clientes/atualizar/${this.clienteEmEdicao.id}`,
              this.formCostumer
            )
            .then((res) => {
              // Atualiza o cliente na lista local
              const index = this.customers.findIndex(
                (c) => c.id === this.clienteEmEdicao.id
              );
              if (index !== -1) {
                this.customers[index] = res.data;
              }
              // Limpa os dados do formulário e o estado de edição
              this.clienteEmEdicao = null;
              this.formCostumer = {
                name: "",
                cpf: "",
                telefone: "",
                email: "",
              };
            })
            .catch((err) => {
              console.error("Erro ao atualizar cliente:", err);
            });
        } else {
          // Criação de novo cliente
          axios
            .post("http://127.0.0.1:8000/api/clientes", this.formCostumer)
            .then((response) => {
              this.customers.push(response.data); // Adiciona à lista
              this.formCostumer = { // Limpa o formulário
                name: "",
                cpf: "",
                telefone: "",
                email: "",
              };
            })
            .catch((error) => {
              console.error("Erro ao cadastrar cliente:", error);
            });
        }
      } else if (tipo === "produto") {
        // Encontra o nome da marca pelo id selecionado
        const marcaSelecionada = this.brands.find(
          (b) => b.id === this.formProducts.mark
        );
          // Prepara os dados do produto com o nome da marca
        const payload = {
          ...this.formProducts,
          mark: marcaSelecionada ? marcaSelecionada.name : "",
        };

        if (this.ProdutoEmEdicao) {
          // Atualizar produto
          axios
            .put(
              `http://127.0.0.1:8000/api/produtos/atualizar/${this.ProdutoEmEdicao.id}`,
              payload
            )
            .then((res) => {
              const index = this.products.findIndex(
                (p) => p.id === this.ProdutoEmEdicao.id
              );
              if (index !== -1) {
                this.products[index] = res.data;
              }
              this.ProdutoEmEdicao = null;
              this.formProducts = {
                name: "",
                mark: "",
                description: "",
                value: "",
              };
            })
            .catch((err) => {
              console.error("Erro ao atualizar produto:", err);
            });
        } else {
          // Cadastrar novo produto
          axios
            .post("http://127.0.0.1:8000/api/produtos", payload)
            .then((response) => {
              console.log("Produto Cadastrado:", response.data);
              this.products.push(response.data);
              this.formProducts = {
                name: "",
                mark: "",
                description: "",
                value: "",
              };
            })
            .catch((error) => {
              console.error("Erro ao cadastrar produto:", error);
            });
        }
      } else if (tipo === "marca") {
        if (this.MarcaEmEdicao) {
          // Atualizar marca existente
          axios
            .put(
              `http://127.0.0.1:8000/api/marcas/atualizar/${this.MarcaEmEdicao.id}`,
              this.formBrands
            )
            .then((res) => {
              const index = this.brands.findIndex(
                (b) => b.id === this.MarcaEmEdicao.id
              );
              if (index !== -1) {
                this.brands[index] = res.data;
              }
              this.MarcaEmEdicao = null;
              this.formBrands = { name: "" };
            })
            .catch((err) => {
              console.error("Erro ao atualizar marca:", err);
            });
        } else {
          // Criar nova marca
          axios
            .post("http://127.0.0.1:8000/api/marcas", this.formBrands)
            .then((response) => {
              console.log("Marca Cadastrada:", response.data);
              this.brands.push(response.data);
              this.formBrands = { name: "" };
            })
            .catch((error) => {
              console.error("Erro ao cadastrar marca:", error);
            });
        }
      } else if (tipo === "venda") {
         // Validações mínimas
        if (!this.formSale.customer || this.itensVenda.length === 0) return;

         // Monta o payload com os dados da venda
        const payload = {
          customer: this.formSale.customer,
          items: this.itensVenda.map((item) => ({
            product_id: item.product_id,
            qty: item.qty,
            total: item.total,
          })),
        };

        axios
          .post("http://127.0.0.1:8000/api/vendas", payload)
          .then((response) => {
            console.log("Venda finalizada:", response.data);
            this.sales.push(response.data);
            this.formSale.customer = "";
            this.itensVenda = [];
          })
          .catch((error) => {
            console.error("Erro ao finalizar venda:", error);
          });
      }
    },
    // Adiciona um item à lista de itens da venda atual
    adicionarItemVenda() {
      if (!this.formSale.product || !this.formSale.qty) return;

      const produto = this.products.find((p) => p.id === this.formSale.product);
      if (!produto) return;

      this.itensVenda.push({
        product_id: produto.id,
        name: produto.name,
        qty: this.formSale.qty,
        total: this.calculatedTotal, // valor calculado com base no produto e quantidade
      });

      // limpa os campos de produto
      this.formSale.product = "";
      this.formSale.qty = "";
      this.formSale.total = 0;
    },
     // Carrega os dados do cliente no formulário para edição
    editarCliente(cliente) {
      this.formCostumer = { ...cliente };
      this.clienteEmEdicao = cliente;
    },
    editarProduto(produto) {
      // Transforma mark de nome para id, se necessário
      const marca = this.brands.find((b) => b.name === produto.mark);
      this.formProducts = {
        ...produto,
        mark: marca ? marca.id : "", // para preencher o <select>
      };
      this.ProdutoEmEdicao = produto;
    },
    editarMarca(marca) {
      this.formBrands = { ...marca };
      this.MarcaEmEdicao = marca;
    },
  // Deleta cliente pelo ID e remove da lista local
    deletarCliente(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/clientes/deletar/${id}`)
        .then((res) => {
          console.log("Deletado com sucesso", res);
          this.customers = this.customers.filter((c) => c.id !== id);
        })
        .catch((err) => {
          console.error("Erro ao deletar:", err);
        });
    },
  // Deleta produto pelo ID e remove da lista local
    deletarProduto(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/produtos/deletar/${id}`)
        .then((res) => {
          console.log("Deletado com sucesso", res);
          this.products = this.products.filter((p) => p.id !== id);
        })
        .catch((err) => {
          console.error("Erro ao deletar:", err);
        });
    },

    // Deleta marca pelo ID e remove da lista local
    deletarMarca(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/marcas/deletar/${id}`)
        .then((res) => {
          console.log("Deletado com sucesso", res);
          this.brands = this.brands.filter((b) => b.id !== id);
        })
        .catch((err) => {
          console.error("Erro ao deletar:", err);
        });
    },
  },
};
</script>

