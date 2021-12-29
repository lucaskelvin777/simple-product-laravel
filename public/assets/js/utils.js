// Cria um toast na tela, que após 5 segundos é automaticamente fechado
const toastMsg = (message, type = 'success') => {
    let bgColor = '';
    let textColor = '';
    switch (type) {
        case 'success':
            bgColor = '#0C408D';
            textColor = '#fff';
            break;
        case 'danger':
            bgColor = '#e74c3c';
            textColor = '#eee';
            break;
        default:
            bgColor = '#0C408D';
            textColor = '#fff';
            break;
    }
    $.toast({
        text: message,
        showHideTransition: 'slide', 
        bgColor, 
        textColor, 
        allowToastClose: false, 
        hideAfter: 5000, 
        stack: 5, 
        textAlign: 'left', 
        position: 'top-right' 
    });
}