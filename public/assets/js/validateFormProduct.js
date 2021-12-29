jQuery.extend(jQuery.validator.messages, {
    required: "Esse campo é requerido",
    email: "Por favor inclua um email válido com @ e .",
    maxlength: "O campo passou do limite",
    minlength: "O campo não atingiou o número mínimo de caracteres",
});
$("#formProduct").validate({
    rules: {
        nome: { required: true, minlength: 3, maxlength: 60 },
        description: { required: true, minlength: 3, maxlength: 3000 }
    },
    messages: {
        
    }
});