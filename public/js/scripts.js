
        function consultar() {
            const resultadosDiv = document.getElementById('resultados');
            resultadosDiv.innerHTML = '<img src="img/loader.gif" class="w-5 h-5 float-left"> Aguarde... Carregando...';
            const cpf = document.getElementById('cpf').value;

            axios.post('api/consultar', { cpf })
                .then(response => {
                    const ofertas = response.data.instituicoes;
                    resultadosDiv.innerHTML = '';

                    if (!ofertas || response.data.message) {
                        resultadosDiv.innerHTML = '<p class="text-center">Nenhuma oferta encontrada.</p>';
                        return;
                    }

                    ofertas.forEach(oferta => {
                        const ofertaDiv = document.createElement('div');
                        ofertaDiv.className = "bg-gray-50 border border-gray-200 rounded-md p-4 shadow-sm mb-4";

                        const header = document.createElement('h3');
                        header.className = "text-lg font-semibold text-indigo-600 mb-2";
                        header.innerText = oferta.nome;

                        const modalidadesContainer = document.createElement('div');
                        modalidadesContainer.id = `modalidades-${oferta.id}`;
                        modalidadesContainer.innerHTML = '<img src="img/loader.gif" class="w-5 h-5"> Aguarde... Carregando...';

                        ofertaDiv.appendChild(header);
                        ofertaDiv.appendChild(modalidadesContainer);
                        resultadosDiv.appendChild(ofertaDiv);

                        const modalidades = oferta.modalidades;
                        modalidadesContainer.innerHTML = ''; // limpar loader

                        modalidades.forEach(modalidade => {
                            const mod = modalidade['cod'];

                            axios.post('api/consultar2', { cpf, id: oferta.id, mod })
                                .then(response => {
                                    const modalidadeDiv = document.createElement('div');
                                    modalidadeDiv.className = "bg-white p-4 border rounded-md cursor-pointer hover:bg-gray-200 transition mb-2";
                                    modalidadeDiv.innerHTML = `
                                        <p><strong>Modalidade:</strong> ${modalidade['nome']}</p>
                                        <p><strong>Quantidade de Parcelas Mínima:</strong> ${response.data.QntParcelaMin}</p>
                                        <p><strong>Quantidade de Parcelas Máxima:</strong> ${response.data.QntParcelaMax}</p>
                                        <p><strong>Valor Mínimo:</strong> R$ ${response.data.valorMin}</p>
                                        <p><strong>Valor Máximo:</strong> R$ ${response.data.valorMax}</p>
                                        <p><strong>Juros por mês:</strong> ${response.data.jurosMes}%</p>
                                    `;
                                    modalidadesContainer.appendChild(modalidadeDiv);
                                })
                                .catch(error => {
                                    console.error('Erro ao consultar modalidade:', error);
                                });
                        });
                    });
                })
                .catch(error => {
                    console.error('Erro ao consultar ofertas:', error);
                });
        }
        function aplicarMascaraCPF(campo) {
            let valor = campo.value.replace(/\D/g, "");

            if (valor.length > 11) valor = valor.slice(0, 11);

            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

            campo.value = valor;
        }
        function abrirModal() {
            document.getElementById('modalHenrique').classList.remove('hidden');
            document.getElementById('modalHenrique').classList.add('flex');
        }

        function fecharModal() {
            document.getElementById('modalHenrique').classList.remove('flex');
            document.getElementById('modalHenrique').classList.add('hidden');
        }