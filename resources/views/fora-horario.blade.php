<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Bloqueado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 flex items-center justify-center">

    <div class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body items-center text-center">
            <div class="text-6xl mb-4">🔒</div>
            <h2 class="card-title text-error text-2xl">Acesso Bloqueado</h2>
            <p class="text-base-content/70">
                O painel financeiro está disponível apenas durante o horário comercial.
            </p>
            <div class="divider"></div>
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title">Horário Permitido</div>
                    <div class="stat-value text-warning text-2xl">08:00 - 18:00</div>
                    <div class="stat-desc">Tente novamente neste período</div>
                </div>
            </div>
            <div class="alert alert-error mt-4">
                <span>⛔ Acesso fora do horário comercial detectado.</span>
            </div>
        </div>
    </div>

</body>
</html>