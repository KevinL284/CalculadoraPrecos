document.addEventListener("DOMContentLoaded", function () {
    // Máscara para valores monetários (R$ 0.00)
    function formatCurrency(input) {
        let value = input.value.replace(/\D/g, ""); // Remove tudo que não for número
        value = (parseFloat(value) / 100).toFixed(2); // Converte para decimal
        input.value = value.replace(".", ","); // Troca ponto por vírgula para padrão brasileiro
    }

    // Aplicando máscara ao campo de custo
    document.getElementById("cost").addEventListener("input", function () {
        formatCurrency(this);
    });

    // Aplicando máscara ao campo de preço de venda
    document.getElementById("sale_price").addEventListener("input", function () {
        formatCurrency(this);
    });
});
