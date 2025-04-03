document.addEventListener("DOMContentLoaded", function () {
    function formatCurrency(input) {
        let value = input.value.replace(/\D/g, ""); 
        value = (parseFloat(value) / 100).toFixed(2); 
        input.value = value.replace(".", ","); 
    }

    function normalizeCurrency(input) {
        return input.value.replace(",", "."); 
    }

    // Aplicar máscara aos campos
    document.getElementById("cost").addEventListener("input", function () {
        formatCurrency(this);
    });

    document.getElementById("sale_price").addEventListener("input", function () {
        formatCurrency(this);
    });

    // Ajustar valores antes do envio do formulário
    document.getElementById("calcForm").addEventListener("submit", function () {
        document.getElementById("cost").value = normalizeCurrency(document.getElementById("cost"));
        document.getElementById("sale_price").value = normalizeCurrency(document.getElementById("sale_price"));
    });
});
