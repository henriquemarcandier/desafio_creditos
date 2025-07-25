
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Crédito</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 text-gray-800 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-indigo-700">Consulta de Ofertas de Crédito</h1>
        <div class="flex flex-col sm:flex-row items-center gap-4 mb-6">
            <input type="text" id="cpf" placeholder="Digite o CPF" maxlength="14" onkeyup="aplicarMascaraCPF(this)" class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button onclick="consultar()" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">Consultar</button>
        </div>
        <div id="resultados" class="space-y-6"></div>
    </div>
    <footer class="mt-10 text-center text-sm text-gray-500">
        &copy; {{date('Y')}} - Site desenvolvido por 
        <button onclick="abrirModal()" class="text-indigo-600 font-semibold hover:underline">
            Henrique Marcandier
        </button>
    </footer>  
    <div id="modalHenrique" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative">
            <button onclick="fecharModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl font-bold">&times;</button>
            <img src="img/henrique.png" alt="Henrique Marcandier" class="flex w-20 h-20 rounded-full">
            <h2 class="text-xl font-bold mb-4 text-indigo-700">Henrique Marcandier</h2>
            <p><strong>Email:</strong> henrique.marcandier@gmail.com</p>
            <p><strong>Curso:</strong> Análise e Desenvolvimento de Sistemas</p>
            <p><strong>Instituição:</strong> Faculdade Anhanguera</p>
            <p><strong>Ano:</strong> {{date('Y')}}</p>
            <p><strong>Resumo:</strong> Desenvolvedor full stack com foco em projetos web e APIs REST com PHP, Laravel, MySQL e integração com front-end moderno.</p>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
