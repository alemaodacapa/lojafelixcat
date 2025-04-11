<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Relatório da Loja - DASHMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Carregando...</span>
            </div>
        </div>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-store me-2"></i>Nome da Loja</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Nome do Usuário</h6>
                        <span>Gerente</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="chart.html" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Relatórios</a>
                    </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-store"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    </div>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Vendas Totais</p>
                                <h6 class="mb-0">R$ 12.345,67</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-arrow-up fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Lucro Total</p>
                                <h6 class="mb-0">R$ 4.567,89</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-arrow-down fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Prejuízo Total</p>
                                <h6 class="mb-0">R$ 123,45</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-coins fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Despesas Totais</p>
                                <h6 class="mb-0">R$ 2.345,67</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Gráfico de Vendas Mensais</h6>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Gráfico de Lucro vs. Despesa Mensal</h6>
                            <canvas id="profitExpenseChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Relatório Mensal Detalhado</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-primary me-2" id="prevMonth">Mês Anterior</button>
                            <h6 class="mb-0" id="currentMonth">Abril 2025</h6>
                            <button class="btn btn-sm btn-outline-primary ms-2" id="nextMonth">Próximo Mês</button>
                        </div>
                    </div>
                    <div id="monthlyReport">
                        <div class="d-flex flex-wrap">
                            <div class="bg-light rounded p-3 m-1" style="width: 150px;">
                                <h6 class="mb-0">01/04/2025</h6>
                                <small>Vendas: R$ 120</small><br>
                                <small>Lucro: R$ 40</small><br>
                                <small>Despesas: R$ 10</small><br>
                                <small>Prejuízo: R$ 0</small>
                            </div>
                            <div class="bg-light rounded p-3 m-1" style="width: 150px;">
                                <h6 class="mb-0">02/04/2025</h6>
                                <small>Vendas: R$ 150</small><br>
                                <small>Lucro: R$ 50</small><br>
                                <small>Despesas: R$ 15</small><br>
                                <small>Prejuízo: R$ 0</small>
                            </div>
                            <div class="bg-light rounded p-3 m-1" style="width: 150px;">
                                <h6 class="mb-0">30/04/2025</h6>
                                <small>Vendas: R$ 200</small><br>
                                <small>Lucro: R$ 70</small><br>
                                <small>Despesas: R$ 20</small><br>
                                <small>Prejuízo: R$ 0</small>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6>Resumo do Mês de Abril:</h6>
                            <p>Vendas Totais: R$ 12.345,67</p>
                            <p>Lucro Total: R$ 4.567,89</p>
                            <p>Despesas Totais: R$ 2.345,67</p>
                            <p>Prejuízo Total: R$ 123,45</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            © <a href="#">Nome da Sua Loja</a>, Todos os Direitos Reservados.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://social.x10.mx">Criado por Leonardo</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/main.js"></script>

    <script>
        // Gráfico de Vendas Mensais (Dados estáticos por enquanto)
        const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesChartCanvas, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Vendas (R$)',
                    data: [1000, 1500, 1200, 1800, 1600, 2000, 1900, 2200, 2100, 2500, 2300, 2700],
                    backgroundColor: 'rgba(54, 162, 235, 0.8)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Lucro vs. Despesa Mensal (Dados estáticos por enquanto)
        const profitExpenseChartCanvas = document.getElementById('profitExpenseChart').getContext('2d');
        const profitExpenseChart = new Chart(profitExpenseChartCanvas, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Lucro (R$)',
                    data: [300, 500, 400, 600, 550, 700, 650, 750, 700, 850, 800, 900],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }, {
                    label: 'Despesas (R$)',
                    data: [200, 300, 250, 350, 300, 400, 380, 420, 400, 450, 430, 480],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Funcionalidade básica para mudar o mês no relatório mensal
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');
        const currentMonthDisplay = document.getElementById('currentMonth');
        const monthlyReportDiv = document.getElementById('monthlyReport');

        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ];

        function updateMonthlyReport(month, year) {
            currentMonthDisplay.textContent = `${monthNames[month]} ${year}`;
            // Aqui você faria uma chamada para o seu banco de dados
            // para buscar os dados do mês e ano especificados.
            // Por enquanto, vamos manter os dados estáticos no HTML.
        }

        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            updateMonthlyReport(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            updateMonthlyReport(currentMonth, currentYear);
        });

        // Inicializa o relatório com o mês atual
        updateMonthlyReport(currentMonth, currentYear);
    </script>
</body>

</html>
