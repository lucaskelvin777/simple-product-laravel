
// Função que retorna as dimensões do arquivo.
const getImageDimensions = (file) => {
    return new Promise((resolved, rejected) => {
        let i = new Image()
        i.onload = () => {
            resolved({
                w: i.width,
                h: i.height
            })
        };
        i.src = file
    })
}
// Função para validar o arquivo de imagem.
const checkFile = (element) => {
    let fup = element;
    let fileName = fup.val();
    let ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    ext = ext.toLowerCase();
    return (ext == "jpeg" || ext == "png" || ext == "jpg") ? true : false;
}

// Função que engloba as outras funções para recortar imagem, funções que não podem ser separadas.
const recortImage = () => {
    // Declaração de variáveis.
    let submitedImage = false;
    const changeImage = () => {
        let arquivo = $('#image').prop('files')[0];
        // É analisado se o arquivo é valído.
        if (arquivo && checkFile($("#image")) === true) {
            let oFReader = new FileReader();
            oFReader.readAsDataURL(arquivo)
            oFReader.onload = async (oFREvent) => {
                // Reseta as configurações do jcrop
                destroyCropBox();
                $('#cropbox').attr('src', oFREvent.target.result)
                // As varíaveis de dimensões são coletadas
                let resultImageDimensions = await getImageDimensions(oFREvent.target.result);
                // Aqui acontece a chamada do jcrop, para ser possível recortar a imagem.
                $('#cropbox').Jcrop({
                    aspectRatio: 2,
                    onSelect: updateCoords,
                    minSize: [220, 120],
                    maxSize: [360, 200],
                    allowResize: false,
                    trueSize: [resultImageDimensions.w, resultImageDimensions.h],
                    setSelect: [0, resultImageDimensions.w / 2.3, resultImageDimensions.h / 2.3, 0]
                });
            };
            oFReader.error = () => { }
        }
    }

    // Destroi os elementos do cropbox. Utilizada para limpar os elementos do jcrop.
    const destroyCropBox = () => {
        if ($('#cropbox').data('Jcrop')) {
            $('#cropbox').data("Jcrop").destroy();
            $("#cropbox").removeAttr("style");
        }
    }
    // Função responsável por limpar os elementos do jcrop.
    const cleanJcrop = () => {
        destroyCropBox();
        if (!submitedImage) {
            $('#x').val("");
            $('#y').val("");
            $('#w').val("");
            $('#h').val("");
        }
    }
    // Fecha o modal na tela do cliente.
    const closeModalFW = () => {
        $('#modalRecortImage').removeClass('showModal');
        cleanJcrop();
        if (!submitedImage)
            $('#image').val('');
        submitedImage = false;
        $('body').addClass('overflow-hidden');
    }
    // Mostrar os itens e o próprio modal.
    const showItemsModal = () => {
        $('#modalRecortImage').addClass('showModal');
        $('body').removeClass('overflow-hidden');
    }

    // Atualiza os inputs responsáveis por armazenar os valores das coordenadas gerados pelo jcrop.
    const updateCoords = (c) => {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    const onSubmitForm = () => {
        if ($('#w').val()) {
            submitedImage = true;
            // Declaração de varíaveis
            let x1 = $('#x').val();
            let y1 = $('#y').val();
            let width = $('#w').val();
            let height = $('#h').val();
            let canvas = $("#canvas")[0];
            let context = canvas.getContext('2d');
            let img = new Image();
            let clientWidth = document.documentElement.clientWidth;
            img.onload = () => {
                /**
                 * Nessa parte do código, ocorre uma verificação da largura da tela do cliente, para adaptar a imagem para o monitor do cliente.
                 */
                if (clientWidth >= 1600) {
                    canvas.height = height;
                    canvas.width = width;
                    // No canvas é desenhado a imagem. Com base no x e y do recorte da imagem.
                    context.drawImage(img, x1, y1, width, height, 0, 0, width, height);
                } else if (clientWidth >= 724 && clientWidth < 1600) {
                    canvas.height = height;
                    canvas.width = width;
                    context.drawImage(img, x1, y1, width, height, 0, 0, width, height);
                } else {
                    canvas.height = 160;
                    canvas.width = 270;
                    context.drawImage(img, x1, y1, width, height, 0, 0, 270, 160);
                }
                $('#imgCropped').val(canvas.toDataURL('image/jpeg', 1.0));
            };
            img.src = $('#cropbox').attr("src");
            $('#imgPreview').hide();
            $('#canvas').show();
            recImage.closeModalFW();
            return true;
        }
        toastMsg('Selecione uma região para recortar.');
        if ($('#w').val()) {
            // Declaração de varíaveis
            let x1 = $('#x').val();
            let y1 = $('#y').val();
            let width = $('#w').val();
            let height = $('#h').val();
            let canvas = $("#canvas")[0];
            let context = canvas.getContext('2d');
            let img = new Image();
            let clientWidth = document.documentElement.clientWidth;
            img.onload = () => {
                /**
                 * Nessa parte do código, ocorre uma verificação da largura da tela do cliente, para adaptar a imagem para o monitor do cliente.
                 */
                if (clientWidth >= 1600) {
                    canvas.height = height;
                    canvas.width = width;
                    // No canvas é desenhado a imagem. Com base no x e y do recorte da imagem.
                    context.drawImage(img, x1, y1, width, height, 0, 0, width, height);
                } else if (clientWidth >= 724 && clientWidth < 1600) {
                    canvas.height = height;
                    canvas.width = width;
                    context.drawImage(img, x1, y1, width, height, 0, 0, width, height);
                } else {
                    canvas.height = 160;
                    canvas.width = 270;
                    context.drawImage(img, x1, y1, width, height, 0, 0, 270, 160);
                }
                $('#imgCropped').val(canvas.toDataURL('image/jpeg', 1.0));
            };
            img.src = $('#cropbox').attr("src");
            $('#imgPreview').hide();
            $('#canvas').show();
            recImage.closeModalFW();
            return true;
        }
        toastMsg('Selecione uma região para recortar.');
    }
    return {
        changeImage,
        closeModalFW,
        showItemsModal,
        onSubmitForm
    }
}

let recImage = recortImage();

// Eventos do html.
$('#image').on('change', () => {
    // Caso o campo image tenha algum valor, as funções necessárias para trazer o modal de recortagem é chamado.
    if ($('#image').val()) {
        $('#imgPreview').show();
        $('#canvas').hide();
        recImage.changeImage();
        recImage.showItemsModal();
    }
});
$('#formRecortImage').on('submit', e => {
    e.preventDefault();
    recImage.onSubmitForm();
});

$('#closeModalPhoto').on('click', () => {
    recImage.closeModalFW();
});