
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Crédito</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 text-gray-800 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-indigo-700">Consultas Realizadas no Site</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border rounded-lg shadow-sm">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">CPF</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Modalidade</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Quantidade de Parcela Mínima</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Quantidade de Parcela Máxima</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Valor Mínimo</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Valor Máximo</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Juros por Mês</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Data/Hora</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100 text-sm" id="tabela-consultas">
                    @foreach ($consultas as $key => $value)
                    <tr>
                        <td class="px-4 py-2">{{$value->id}}</td>
                        <td class="px-4 py-2">{{$value->cpf}}</td>
                        <td class="px-4 py-2">{{$value->modalidadeCredito}}</td>
                        <td class="px-4 py-2">{{$value->qtdeParcelaMinima}}</td>
                        <td class="px-4 py-2">{{$value->qtdeParcelaMaxima}}</td>
                        <td class="px-4 py-2">R$ {{number_format($value->valorMin, 2, ',', '.')}}</td>
                        <td class="px-4 py-2">R$ {{number_format($value->valorMax, 2, ',', '.')}}</td>
                        <td class="px-4 py-2">{{$value->taxaJuros}}%</td>
                        <td class="px-4 py-2">{{date("d/m/Y à\s H:i:s", strtotime($value->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            <h2 class="flex text-xl font-bold mb-4 text-indigo-700">Henrique Marcandier</h2>
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
