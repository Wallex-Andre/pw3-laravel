<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Financeiro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-base-200">

    <div class="navbar bg-base-100 shadow-lg px-6">
        <div class="flex-1">
            <span class="text-xl font-bold text-primary">💼 Painel Financeiro</span>
        </div>
        <div class="flex-none">
            <span class="badge badge-success badge-lg">● Acesso Autorizado</span>
        </div>
    </div>

    <div class="hero min-h-[60vh]">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Bem-vindo!</h1>
                <p class="py-6 text-base-content/70">
                    Você está acessando o painel financeiro dentro do horário comercial.
                </p>
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Horário Permitido</div>
                        <div class="stat-value text-success">08:00 - 18:00</div>
                        <div class="stat-desc">Seg. a Sex.</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Você acessou às</div>
                        <div class="stat-value text-info">{{ $horaAcesso }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>