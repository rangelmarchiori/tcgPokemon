//check do comprimento das strings
const inputsCheckLength = document.querySelectorAll("[data-check-length]")
//check de caracteres normais e especiais
const inputsDigitsAndSpecial = document.querySelectorAll("[data-digits-and-special]")
//check de caracteres números com exclusão dos caracteres especiais
const inputsOnlyDigits = document.querySelectorAll("[data-only-digits]")
//check dos selects obrigatórios
const inputsRequiredSelect = document.querySelectorAll("[data-required-select]")

var boolCategory = false
var boolType = false
var boolCollection = false

inputsCheckLength.forEach((el) => {
  el.addEventListener("blur", (event) => {
    const spanError = event.target.parentNode.querySelector("[data-span-error]")

    switch (event.target.name) {
      case "txtNome":
        spanError.innerHTML = checkLength(event.target.value.length, 3, 30)
        break
      case "txtRaridade":
        spanError.textContent = checkLength(event.target.value.length, 3, 15)
        break
      case "txtIdioma":
        spanError.textContent = checkLength(event.target.value.length, 3, 20)
        break
      case "txtDescricao":
        spanError.textContent = checkLength(event.target.value.length, 3, undefined)
        break
      case "txtIlustrador":
        spanError.textContent = checkLength(event.target.value.length, 3, 50)
        break
      case "txtEstado":
        spanError.textContent = checkLength(event.target.value.length, 3, 25)
        break
      case "nbrUnidade":
        spanError.textContent = checkLength(event.target.value.length, 1, undefined)
        break
      case "nbrValor":
        spanError.textContent = checkCommas(event.target.value)
        break
    }
  })
})

inputsOnlyDigits.forEach((el) => {
  el.addEventListener("keypress", (event) => {
    var char = String.fromCharCode(event.which)

    if (!/[0-9]/.test(char)) {
      event.preventDefault()
    }
  })
})

inputsDigitsAndSpecial.forEach((el) => {
  el.addEventListener("keypress", (event) => {
    var char = String.fromCharCode(event.which)

    if (!/[0-9,]/.test(char)) {
      event.preventDefault()
    }
  })
})

inputsRequiredSelect.forEach((el) => {
  el.addEventListener("change", (event) => {
    const spanError =
      event.target.parentNode.querySelector("[data-span-error]")

    var selectedOption = event.target.options[event.target.selectedIndex]

    if (selectedOption.value == 0) {
      spanError.textContent = "Selecione uma opção diferente"

      if (event.target.name === "sltCategoria") {
        boolCategory = false
      } else if (event.target.name === "sltTipo") {
        boolType = false
      } else if (event.target.name === "sltColecao") {
        boolCollection = false
      }
    } else {
      spanError.textContent = ""

      if (event.target.name === "sltCategoria") {
        boolCategory = true
      } else if (event.target.name === "sltTipo") {
        boolType = true
      } else if (event.target.name === "sltColecao") {
        boolCollection = true
      }
    }

  })
})

function checkLength(length, minLength, maxLength) {
  if (length === 0) {
    return "*"
  } else if (maxLength != undefined && length === maxLength) {
    return "Máximo de caracteres: " + maxLength
  } else if (length < minLength) {
    return "Mínimo de caracteres: " + minLength
  } else {
    return ""
  }
}

function checkCommas(inputValue) {
  var commas = inputValue.replace(/[0-9]/g, "")

  if (inputValue.length === 0) {
    return "*"
  } else if (commas.length > 1) {
    return "Insira apenas uma virgula"
  } else {
    return ""
  }
}

const form = document.querySelector("#formCards");

form.addEventListener("submit", (event) => {

  const buttonSpanError = document.querySelector("#buttonSpan");

  if (boolCategory === true &&
    boolType === true &&
    boolCategory === true) {

    buttonSpanError.textContent = "";
  } else {
    buttonSpanError.textContent = "Erro ao enviar o formulario. Preencha os campos corretamente.";
  }
});