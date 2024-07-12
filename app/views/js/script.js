// =========== JS medic_register ========================

function cpfMask(input){
    // Remove caracteres não numéricos
    let valor = input.value.replace(/\D/g, ''); 
    // Aplica a máscara
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2'); 
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); 
    input.value = valor;
}

function phoneMask(input){
    // Remove qualquer caracter que não seja número
    let valor = input.value.replace(/\D/g, '');
    // Aplica a máscara
    valor = valor.replace(/(\d{2})(\d)/,"($1) $2");
    input.value = valor;
}

