

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Painel Administrativo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Painel de administração da loja Felix Cat" name="description">
    <meta content="ecommerce, admin, dashboard" name="keywords">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Fontes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bibliotecas de Estilo -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Bootstrap Personalizado -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilo do Template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">

        <!-- Spinner -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Carregando...</span>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-paw me-2"></i>Felix Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="Foto do Admin" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Administrador</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="categorias.php" class="nav-item nav-link"><i class="fa fa-tags me-2"></i>Categorias</a>
                    <a href="produtos.php" class="nav-item nav-link"><i class="fa fa-box-open me-2"></i>Produtos</a>
                    <a href="lojas.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Unidades</a>
                    <a href="pedidos.php" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Pedidos</a>
                    <a href="clientes.php" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Clientes</a>
                    <a href="configuracoes.php" class="nav-item nav-link"><i class="fa fa-cogs me-2"></i>Configurações</a>
                    <a href="logout.php" class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>Sair</a>
                </div>
            </nav>
        </div>

        <!-- Conteúdo -->
        <div class="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Pesquisar...">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Mensagens</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item text-center">Nenhuma nova mensagem</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificações</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item text-center">Sem novas notificações</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="Admin" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Administrador</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="perfil.php" class="dropdown-item">Meu Perfil</a>
                            <a href="configuracoes.php" class="dropdown-item">Configurações</a>
                            <a href="logout.php" class="dropdown-item">Sair</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Conteúdo Principal -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <h4 class="mb-0">Bem-vindo ao painel administrativo da Felix Cat 🐾</h4>
                    <p class="mt-2 text-muted">Aqui você poderá gerenciar produtos, categorias, pedidos e clientes.</p>
                </div>
            </div>
            
            <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Venda Hoje</p>
                    <h6 class="mb-0">R$ 1234,56</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-shopping-cart fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Total de Vendas</p>
                    <h6 class="mb-0">R$ 12345,67</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-arrow-up fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Lucro Hoje</p>
                    <h6 class="mb-0">R$ 456,78</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-coins fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2">Lucro Total</p>
                    <h6 class="mb-0">R$ 4567,89</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Vendas por Região</h6>
                    <a href="">Mostrar Tudo</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Vendas & Lucro</h6>
                    <a href="">Mostrar Tudo</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Vendas Recentes</h6>
            <a href="">Mostrar Tudo</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Data</th>
                        <th scope="col">Nota Fiscal</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Abr 2025</td>
                        <td>NF-0001</td>
                        <td>Maria Silva</td>
                        <td>R$ 120,50</td>
                        <td>Pago</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>02 Abr 2025</td>
                        <td>NF-0002</td>
                        <td>João Pereira</td>
                        <td>R$ 85,99</td>
                        <td>Pendente</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>05 Abr 2025</td>
                        <td>NF-0003</td>
                        <td>Ana Souza</td>
                        <td>R$ 250,00</td>
                        <td>Pago</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>08 Abr 2025</td>
                        <td>NF-0004</td>
                        <td>Pedro Oliveira</td>
                        <td>R$ 55,75</td>
                        <td>Cancelado</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>10 Abr 2025</td>
                        <td>NF-0005</td>
                        <td>Carla Rodrigues</td>
                        <td>R$ 199,90</td>
                        <td>Pago</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0">Mensagens</h6>
                    <a href="">Mostrar Tudo</a>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutos atrás</small>
                        </div>
                        <span>Mensagem curta aqui...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutos atrás</small>
                        </div>
                        <span>Mensagem curta aqui...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutos atrás</small>
                        </div>
                        <span>Mensagem curta aqui...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutos atrás</small>
                        </div>
                        <span>Mensagem curta aqui...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calendário</h6>
                    <a href="">Mostrar Tudo</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Lista de Tarefas</h6>
                    <a href="">Mostrar Tudo</a>
                </div>
                <div class="d-flex mb-2">
                    <input class="form-control bg-transparent" type="text" placeholder="Adicionar tarefa">
                    <button type="button" class="btn btn-primary ms-2">Adicionar</button>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Tarefa curta aqui...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Tarefa curta aqui...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox" checked>
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span><del>Tarefa curta aqui...</del></span>
                            <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Tarefa curta aqui...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Tarefa curta aqui...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Gráfico de Vendas Mundiais (Dados de exemplo)
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["Brasil", "Estados Unidos", "Europa", "Ásia", "Outros"],
            datasets: [{
                label: "Vendas",
                data: [15, 10, 8, 12, 7],
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .3)",
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .5)"
                ]
            }]
        },
        options: {
            responsive: true
        }
    });

    // Gráfico de Vendas e Lucro (Dados de exemplo)
    var ctx2 = $("#salse-revenue").get(0).getContext("2d");
    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                    label: "Vendas",
                    data: [100, 150, 120, 180, 160, 200, 190, 220, 210, 250, 230, 270],
                    backgroundColor: "rgba(0, 156, 255, .5)",
                    fill: true
                },
                {
                    label: "Lucro",
                    data: [30, 50, 40, 60, 55, 70, 65, 75, 70, 85, 80, 90],
                    backgroundColor: "rgba(0, 156, 255, .7)",
                    fill: true
                }
            ]
        },
        options: {
            responsive: true
        }
    });

    // Inicialização do Calendário (requer a biblioteca 'tempusdominus')
    $(document).ready(function () {
        $("#calender").datetimepicker({
            format: "L",
            locale: "pt-br" // Define o idioma para português do Brasil
        });
    });
</script>





            <!-- Rodapé -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">FelixStore</a>, Todos os direitos reservados. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Desenvolvido por <a href="https://social.x10.mx">Leonardo de Paula</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão Topo -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

