<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row mt-4">

        <div class="col-md-6">
            <p class="h2">Lista de Clientes</p>
        </div>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">

                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <p class="h3">
                        <?= $error ?>
                    </p>
                <?php endforeach; ?>

            </div>
        <?php endif ?>

        <div class="col-md-6">
            <p class="text-end">
                <a href="<?= url_to('create_client') ?>" class="text-end btn btn-outline-primary">
                    <i class="fa-sharp fa-solid fa-circle-plus"></i>
                </a>
            </p>
        </div>
        <div class="mt-4 col-md-12">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">#Update</th>
                        <th scope="col">#Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!is_null($clients) && is_array($clients)) : ?>
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <th scope="row"><?= $client['id'] ?></th>
                                <td><?= $client['nome'] ?></td>
                                <td><?= $client['email'] ?></td>
                                <td><?= $client['telefone'] ?></td>
                                <td><?= $client['localidade'] ?? $client['cep'] ?? 'Unknow' ?></td>
                                <td>
                                    <a class="btn btn-outline-primary" href="<?= route_to('update_client', $client['id']) ?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger" type="button" class="btn btn-primary" data-bs-nome="<?= $client['nome'] ?>" data-bs-id="<?= $client['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div>
                            <p class="h5">Não existem registros!</p>
                        </div>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="modal-desc">
                                Tem a certeza que dejesa eliminar este registro?
                                </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="#" id="delete_register" class="btn btn-danger">Apagar</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')
            const nome = button.getAttribute('data-bs-nome')

            const modalTitle = exampleModal.querySelector('.modal-desc')
            exampleModal.querySelector('#delete_register').href = "<?= base_url('admin/delete_client') ?>/" + id

            modalTitle.textContent = `Tem a certeza que deseja eliminar o registro de ${nome}? `

        })
    }
</script>


<?= $this->endSection() ?>