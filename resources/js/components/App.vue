<template>
  <form class="row g-3">
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
      <div style="display: flex; flex-direction: column; gap: 2rem;">
        <!-- Cadastro do Cliente -->
        <div class="card" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Cadastro do Cliente</h5>

            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" />

            <div class="row">
              <div class="col-md-6">
                <label for="cpf" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control" id="cpf" />
              </div>
              <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" />
              </div>
            </div>

            <label for="email" class="form-label mt-2">Email</label>
            <input type="email" class="form-control" id="email" />

            <div class="mt-3 d-flex justify-content-between">
              <button type="submit" style="width: 140px" class="btn btn-primary">Salvar</button>
              <button type="reset" style="width: 140px" class="btn btn-secondary">Limpar</button>
            </div>
          </div>
        </div>

        <!-- Cadastro de Produtos -->
        <div class="card" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

            <label for="nome-produto" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome-produto" />

            <label for="marca" class="form-label mt-2">Marca</label>
            <select class="form-select" id="marca"></select>

            <label for="descricao" class="form-label mt-2">Descrição</label>
            <input type="text" class="form-control" id="descricao" />

            <label for="valor" class="form-label mt-2">Valor</label>
            <input type="text" class="form-control" id="valor" />

            <div class="mt-3 d-flex justify-content-between">
              <button type="submit" class="btn btn-primary" style="width: 140px" >Salvar</button>
              <button type="reset" class="btn btn-secondary" style="width: 140px" >Limpar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Coluna 2 -->
      <div style="display: flex; flex-direction: column; gap: 2rem;">
        <!-- Cadastro de Marcas -->
        <div class="card" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Marcas</h5>

            <label for="marca-nome" class="form-label">Nome da Marca</label>
            <input type="text" class="form-control" id="marca-nome" />

            <div class="mt-3 d-flex justify-content-between">
              <button type="submit" class="btn btn-primary" style="width: 140px" >Salvar</button>
              <button type="reset" class="btn btn-secondary" style="width: 140px" >Limpar</button>
            </div>
          </div>
        </div>

        <!-- Vendas -->
        <div class="card" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Venda</h5>

            <label for="venda-cliente" class="form-label">Cliente</label>
            <select class="form-select" id="venda-cliente"></select>
            
            <div class="row">
              <div class="col-md-4">
                <label for="venda-produto" class="form-label mt-2">Produto</label>
                <select class="form-select" id="venda-produto"></select>
              </div>
              <div class="col-md-4">
                <label for="quantidade" class="form-label mt-2">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" />
              </div>
              <div class="col-md-4">
                <label for="valor-total" class="form-label mt-2">Valor Total</label>
                <input type="text" class="form-control" id="valor-total" />
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3" style="width: 285px">Adicionar Produto</button>

            <div class="mt-3 d-flex justify-content-between">
              <button type="submit" class="btn btn-primary" style="width: 500px">Finalizar Venda</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

