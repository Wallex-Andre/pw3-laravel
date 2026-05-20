<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-base-200">

    <div class="navbar bg-base-100 shadow-lg px-6">
        <div class="flex-1">
            <span class="text-xl font-bold text-primary">🔐 Sistema Financeiro</span>
        </div>
    </div>

    <div class="hero min-h-[60vh]">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Bem-vindo!</h1>
                <p class="py-6 text-base-content/70">
                    O acesso ao painel financeiro é restrito ao horário comercial.
                </p>
                <div class="stats shadow mb-6">
                    <div class="stat">
                        <div class="stat-title">Horário de Acesso</div>
                        <div class="stat-value text-primary">08:00 - 18:00</div>
                        <div class="stat-desc">Seg. a Sex.</div>
                        <br>
                        <a href="/painel" class="btn btn-primary btn-lg">
                            💼 Acessar Painel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>