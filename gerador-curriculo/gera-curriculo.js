function changeTemplate() {
    $('.modelo INPUT').change(function () {

        $('.sub-title').eq(1).nextUntil('.sub-title, #gerarCurriculoButton').slideDown()
        $('.sub-title').eq(1).find(".arrow").hide()
        $('.sub-title').eq(1).find(".arrow-down").show()


        if ($(this).prop('checked', true)) {
            var name = $(this).attr('value')
            $('FORM').attr('action', '../curriculo-pronto/' + name + '/curriculo-pronto.php')
        }
    })
}

function toogleDisplayBlocks() {
    $('.sub-title').click(function () {
        elemento = $(this).next()
        $(this).nextUntil('.sub-title, #gerarCurriculoButton').slideToggle('slow')
    })
}

function toogleDisplayOnLastInput() {
    $('.sub-title').eq(0).find(".arrow,.arrow-down").toggle()
    $('.sub-title').eq(1).nextUntil('.sub-title, #gerarCurriculoButton').slideToggle()

    $('.sub-title').eq(2).nextUntil('.sub-title, #gerarCurriculoButton').slideToggle()
    $('.sub-title').eq(3).nextUntil('.sub-title, #gerarCurriculoButton').slideToggle()
    $('.sub-title').eq(4).nextUntil('.sub-title, #gerarCurriculoButton').slideToggle()

    $('INPUT')

    $('.last-input1').blur(function () {
        $('.sub-title').eq(2).nextUntil('.sub-title, #gerarCurriculoButton').slideDown()
        $('.sub-title').eq(2).find(".arrow,.arrow-down").toggle()
    })

    $('.last-input2').blur(function () {
        $('.sub-title').eq(3).nextUntil('.sub-title, #gerarCurriculoButton').slideDown()
        $('.sub-title').eq(3).find(".arrow,.arrow-down").toggle()

    })
    $('.last-input3').blur(function () {
        $('.sub-title').eq(4).nextUntil('.sub-title, #gerarCurriculoButton').slideDown()
        $('.sub-title').eq(4).find(".arrow,.arrow-down").toggle()

    })
}

function changeArrowIcon() {
    $('.sub-title').click(function () {
        $(this).find(".arrow,.arrow-down").toggle()
        //$('.arrow, .arrow-down').toggle()
    })
}


function getCidades() {
    var cidades
    var numeroEstado
    $.getJSON('estados-cidades.json', function (data) {
        cidades = data
        var estadosSelect = $('#estados')
        for (let c = 0; c < cidades['estados'].length; c++) {
            var option = `<option value='${cidades['estados'][c].nome}'>${cidades['estados'][c].nome}</option>`
            estadosSelect.append(option)
        }
        estadosSelect.change(function () {
            var cidadesSelect = $('#cidades')
            numeroEstado = estadosSelect.val()
            cidadesSelect.html('')
            for (let c = 0; c < cidades['estados'].length; c++) {
                if (numeroEstado == cidades['estados'][c].nome) {
                    numeroEstado = c
                }
            }
            for (let c1 = 0; c1 < cidades['estados'][numeroEstado]['cidades'].length; c1++) {

                var option =
                    `<option value='${cidades['estados'][numeroEstado]['cidades'][c1]}'>${cidades['estados'][numeroEstado]['cidades'][c1]}</option>`
                cidadesSelect.append(option)
            }
        })

    });
}



var qtdTelefones=0
function addInput(e, element) {
    e.preventDefault()
    qtdTelefones++
    
    if(qtdTelefones>2){
        var aviso = $(element).parent().parent().find('.warn-qtd')
        aviso.show()
        aviso.fadeOut(1300)
    }else{
        input = $(element).parent().find('input')
    $(element).remove()
    input.parent().parent().append("<div class='d-flex'><input type='text' name='"+input.attr('name')+"' class='numberPhone big-input last-input1' style='width: 450px;'><button onclick='addInput(event, this)' class='plusButton'>+</button></div>")
    }
    
}






var formacoes = 2

function addFormacao(e) {

    e.preventDefault()
    if (formacoes > 4) {
        alert("Número máximo de formações atingidas")
    } else {
        var formacao =
            "<div class='formacao-container'><div class='linha'><div class='group-name-input'><p>Curso <span>" + formacoes + "</span></p><div class='warn'>Tamanho máximo atingido</div><input type='text' id='curso' name='curso[]' class='fullsize-input'></div></div><div class='linha'><div class='group-name-input'><p>Instituição</p><div class='warn'>Tamanho máximo atingido</div><input type='text' class='big-input instituicao' name='instituicao[]' id='instituicao'></div><div class='group-name-input'><p>Ano de conclusão</p><div class='d-flex'><label class='container'>Concluído<input type='radio' name='situacaoCurso[" + parseInt(formacoes - 1) + "][]' value='Concluído'><span class='checkmark'></span></label><label class='container'>Previsto<input type='radio' name='situacaoCurso[" + parseInt(formacoes - 1) + "][]' value='Previsto'><span class='checkmark'></span></label><input type='number'  min='1900' max='2100'  name='anoConclusao[]'></div></div></div></div>"
        $('.formacao-container').last().after(formacao)
        formacoes++
    }



}

function removeFormacao(e) {
    e.preventDefault()
    if (formacoes == 2) {
        alert('Insira pelo menos uma formação')
    } else {
        $('.formacao-container').last().remove()
        formacoes--
        if (formacoes == 1) {
            $('.remover-botao-form').css('display', 'none')
        }
    }

}


var experiencias = 2

function addExperiencia(e) {
    e.preventDefault()

    if (experiencias > 4) {
        alert("Número máximo de formações atingidas")
    } else {
        var experiencia = "<div class='experiencia-container'><div class='linha'><div class='group-name-input big-input'><p>Empresa</p><div class='warn'>Tamanho máximo atingido</div><input type='text' name='empresa[]' class='big-input'></div><div class='group-name-input big-input'><p>Cargo</p><div class='warn'>Tamanho máximo atingido</div><input type='text' name='cargo[]' class='big-input'></div></div><div class='linha'><div class='group-name-input'><p>Função desempenhada</p><textarea type='text' name='funcao-trabalho[]'></textarea></div><div class='group-name-input first-input'><p>Ano de entrada</p><input type='number' name='ano-entrada[]'></div><div class='group-name-input'><p>Ano de saída</p><input type='number' class='last-input2' name='ano-saida[]'></div></div></div>"

        $('.experiencia-container').last().after(experiencia)
        experiencias++
    }

}

function showImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagemPerfil').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}





function numberPhoneFormat() {
    $('.numberPhone').keypress(function (event) {
        var numero = $(this)
        var tamanho = $(this).val().length

        if (!Number.isInteger(parseInt(event.key))) {
            var Numberwarning = numero.closest('.group-name-input').find('.number-warn')
            Numberwarning.show()
            Numberwarning.fadeOut(1300)

        }

        switch (tamanho) {
            case 0:
                numero.val('(' + numero.val())
                break
            case 3:
                numero.val(numero.val() + ') ')
                break
        }
        if (tamanho > 14) {
            var warning = numero.closest('.group-name-input').find('.warn')
            warning.show()
            warning.fadeOut(1300)
            numero.val(numero.val().substring(0, 14))
        }
    })
}

function globalMaxCharacter() {
    $('.big-input').keypress(function () {
        var texto = $(this).val()
        if (texto.length > 50) {
            var warning = $(this).closest('.group-name-input').find('.warn')
            warning.show()
            warning.fadeOut(1300)
            $(this).val($(this).val().substring(0, 50))
        }
    })

    $('.fullsize-input').keypress(function () {
        var texto = $(this).val()
        if (texto.length > 90) {
            var warning = $(this).closest('.group-name-input').find('.warn')
            warning.show()
            warning.fadeOut(1300)
            $(this).val($(this).val().substring(0, 90))
        }
    })
}

function todosPreenchidos(e) {

    var notFilled = 0
    var qtdModelos=0
    $('input').each(function () {
       
        if ($(this).val() == '') {
            notFilled++
        }
    })

    if (notFilled > 0) {
        e.preventDefault()
        alert('Preencha todos os campos')

    }
    $('.modelo input').each(function(){
        
        if($(this).prop('checked') == true){
            qtdModelos++
            console.log(qtdModelos)
        }
    })
    if(qtdModelos<1){
        e.preventDefault()
        alert('Escolha um modelos')
    }


}


function checkImage(){
    $('#fotoInput').change(function(){
        var nomeImage = $(this).val()
        var extensao = nomeImage.substring(nomeImage.length-4, nomeImage.length)
        if(extensao != '.jpg' && extensao != '.png' && extensao != '.gif' && extensao != 'jpeg'){
            
            var warning = $('.warn-img')
            warning.show()
            warning.fadeOut(2000)
            $('#fotoInput').val('')
            $('#imagemPerfil').attr('src', 'imagens/profile.svg')
        }else{
            showImage(this)
        }

    })
}



//Tudo que precisa rodar quando a página carrega
$(function () {
    toogleDisplayBlocks()
    changeArrowIcon()
    getCidades()
    numberPhoneFormat()
    globalMaxCharacter()
    toogleDisplayOnLastInput()
    changeTemplate()
    checkImage()

})

//COLOCA A MASCARA DE TELEFONE EM TODOS INPUTS
setInterval(function(){
    numberPhoneFormat()
}, 100)