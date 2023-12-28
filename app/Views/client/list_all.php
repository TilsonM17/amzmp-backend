<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row mt-4">

        <div class="col-md-6">
            <p class="h2">Lista de Clientes</p>
        </div>


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
                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <th scope="row"><?= $client['id'] ?></th>
                            <td><?= $client['nome'] ?></td>
                            <td><?= $client['email'] ?></td>
                            <td><?= $client['telefone'] ?></td>
                            <td><?= $client['localidade'] ?? $client['cep'] ?? $client['bairro'] ?? 'Unknow' ?></td>
                            <td>
                                <a class="btn btn-outline-primary">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>