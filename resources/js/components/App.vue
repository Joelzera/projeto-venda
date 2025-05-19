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
        <div class="card" style="width: 20rem">
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
              <button
                type="reset"
                style="width: 140px"
                class="btn btn-secondary"
              >
                Limpar
              </button>
            </div>
          </div>
        </div>
      </form>

      <!-- Cadastro de Produtos -->
      <form @submit.prevent="enviarFormulario('produto')">
        <div class="card" style="width: 20rem">
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
              <button
                type="reset"
                class="btn btn-secondary"
                style="width: 140px"
              >
                Limpar
              </button>
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
              <button
                type="reset"
                class="btn btn-secondary"
                style="width: 140px"
              >
                Limpar
              </button>
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
              <option v-for="customer in customers" :key="customer.id" :value="customer.id">
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
                <option v-for="product in products" :key="product.id" :value="product.id">
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
              type="submit"
              class="btn btn-primary mt-3"
              style="width: 285px"
            >
              Adicionar Produto
            </button>

            <div class="mt-3 d-flex justify-content-between">
              <button
                type="submit"
                class="btn btn-primary"
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
    };
  },

  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/marcas")
      .then((res) => {
        this.brands = res.data;
      })
      .catch((err) => {
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
      return this.products.find(p => p.id === this.formSale.product) || null;
    },
    // calcula automaticamente o total
    calculatedTotal() {
      if (!this.selectedProduct) return 0;
      // multiplica qty pelo valor unitário
      return (this.selectedProduct.value * this.formSale.qty).toFixed(2);
    }
  },

  watch: {
    // sempre que mudar produto ou qty, atualiza formSale.total
    'formSale.product'() {
      this.formSale.total = this.calculatedTotal;
    },
    'formSale.qty'() {
      this.formSale.total = this.calculatedTotal;
    }
  },

  methods: {
    enviarFormulario(tipo) {
      if (tipo === "cliente") {
        axios
          .post("http://127.0.0.1:8000/api/clientes", this.formCostumer)
          .then((response) => {
            console.log("Cliente Cadastrado:", response.data);
            this.customers.push(response.data);
          })

          .catch((error) => {
            console.error("Erro ao cadastrar cliente:", error);
          });
      } else if (tipo === "produto") {
        axios
          .post("http://127.0.0.1:8000/api/produtos", this.formProducts)
          .then((response) => {
            console.log("Produto Cadastrado:", response.data);
            this.products.push(response.data);
          })
          .catch((error) => {
            console.error("Erro ao cadastrar cliente:", error);
          });
      } else if (tipo === "marca") {
        axios
          .post("http://127.0.0.1:8000/api/marcas", this.formBrands)
          .then((response) => {
            console.log("Marca Cadastrada:", response.data);
            this.brands.push(response.data);
          })
          .catch((error) => {
            console.error("Erro ao cadastrar marca:", error);
          });
      } else if (tipo === "venda") {
        axios
          .post("http://127.0.0.1:8000/api/vendas", this.formSale)
          .then((response) => {
            console.log("Produto de Venda registrado:", response.data);
            this.sales.push(response.data);
          })
          .catch((error) => {
            console.error("Erro ao cadastrar cliente:", error);
          });
      }
    },
  },
};
</script>

