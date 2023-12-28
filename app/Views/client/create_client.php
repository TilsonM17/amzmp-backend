<?= $this->extend('default') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
            <h2 class="h5 mb-3 mb-lg-0">Novo Cliente</h2>
        </div>

        <!-- Main content -->
        <div class="row">
            <!-- Left side -->
            <div class="col-lg-8">
                <!-- Basic information -->
                <div class="card mb-4">
                    <form id="login-form" class="form" action="<?= url_to('create_client_submit') ?>" method="post">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Informações Basicas</h3>
                            <div class="hstack gap-3">
                                <a href="<?= url_to('list_all') ?>" class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></a>
                                <button class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button>
                            </div>

                            <hr>
                            <div class="mt-5 row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" required>
                                        <span class="text text-danger"><?= session()->getFlashdata('errors')['nome'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                        <span class="text text-danger"><?= session()->getFlashdata('errors')['email'] ?? '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Telefone</label>
                                        <input type="tel" name="telefone" class="form-control" required>
                                        <span class="text text-danger"><?= session()->getFlashdata('errors')['telefone'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Endereço(CEP)</label>
                                        <input type="number" name="endereco" id="endereco_cep" class="form-control" required>
                                        <input type="hidden" name="endereco_info[]" id="endereco_hidden">
                                        <span class="text text-danger"><?= session()->getFlashdata('errors')['endereco'] ?? '' ?></span>
                                    </div>

                                    <p class="text-success" id="resposta_cep"></p>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <!-- Right side -->
            <div class="col-lg-4">

            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#endereco_cep').keyup(function(value) {
            $.ajax({
                type: 'GET',
                dataType: 'jsonp',
                jsonp: 'callback',
                crossDomain: true,
                url: "https://viacep.com.br/ws/" + $('#endereco_cep').val() + "/json/",
                beforeSend: function() {
                    $('#resposta_cep')
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text('Pesquisando......');
                },
                success: function(result) {
                    $('#resposta_cep')
                        .removeClass('text-danger')
                        .removeClass('text-success')
                        .addClass('text-success')
                        .text("Encontrei:" + result.localidade + "(" + result.uf + ") " + result.logradouro);

                    $('#endereco_hidden').val(JSON.stringify(result));

                    console.log($('#endereco_hidden').val());

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#resposta_cep')
                        .removeClass('text-success')
                        .addClass('text-danger')
                        .text('CEP invalido, tente outro....');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>