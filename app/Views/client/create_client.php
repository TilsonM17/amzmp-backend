<?= $this->extend('default') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
            <h2 class="h5 mb-3 mb-lg-0">Novo Cliente</h2>
            <div class="hstack gap-3">
                <a href="<?= url_to('list_all') ?>" class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></a>
                <button class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button>
            </div>
        </div>

        <!-- Main content -->
        <div class="row">
            <!-- Left side -->
            <div class="col-lg-8">
                <!-- Basic information -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6 mb-4">Informações Basicas</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Endereço</label>
                                    <input type="text" id="endereco_cep" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $('#endereco_cep').keyup(function(value){
            console.log($('#endereco_cep').val());
        });
    });
</script>

<?= $this->endSection() ?>