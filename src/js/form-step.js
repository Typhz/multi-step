const steps = Array.from(document.querySelectorAll("form .step"));
const nextBtn = document.querySelectorAll("form .next-btn");
const prevBtn = document.querySelectorAll("form .previous-btn");
const form = document.querySelector("#form_step");

const name = document.querySelector("[name=name]");
const email = document.querySelector("[name=email]");
const password = document.querySelector("[name=password]");
const confirmPassword = document.querySelector("[name=confirm_password]");
const userType = document.querySelectorAll("[name=user_type]");
const terms = document.querySelector("[name=terms]");

const cpf = document.querySelector("[name=cpf]");
const dataNasc = document.querySelector("[name=data_nasc]");
const cep = document.querySelector("[name=cep]");
const street = document.querySelector("[name=street]");
const city = document.querySelector("[name=city]");
const state = document.querySelector("[name=state]");


const cnpj = document.querySelector("[name=cnpj]");
const insc_stad = document.querySelector("[name=insc_stad]");
const cepCnpj = document.querySelector("[name=cep_cnpj]");
const streetCnpj = document.querySelector("[name=street_cnpj]");
const cityCnpj = document.querySelector("[name=city_cnpj]");
const stateCnpj = document.querySelector("[name=state_cnpj]");

const telFixo = document.querySelector("[name=tel]");
const telCel = document.querySelector("[name=cel]");
const code = document.querySelector("[name=code]");
const sendCode = document.querySelector("[name=send_code]");

const errorContainer = document.querySelectorAll(".error_front_container");
var base_url = window.location.origin;

function validateCpf(cpf) {
  cpf = cpf.replace(/[^\d]+/g,'');
  let sum;
  let rest;
  let i;
  let result = false;
  if (
      cpf.length === 11 &&
      cpf === "00000000000" ||
      cpf === "11111111111" ||
      cpf === "22222222222" ||
      cpf === "33333333333" ||
      cpf === "44444444444" ||
      cpf === "55555555555" ||
      cpf === "66666666666" ||
      cpf === "77777777777" ||
      cpf === "88888888888" ||
      cpf === "99999999999") {
    return false;
  }
  if (cpf.length === 11) {
      sum = 0;
      for (i = 0; i < 9; i++) {
          sum += parseInt(cpf.charAt(i)) * (10 - i);
      }
      rest = 11 - (sum % 11);
      if (rest === 10 || rest === 11) {
          rest = 0;
      }
      if (rest === parseInt(cpf.charAt(9))) {
          sum = 0;
          for (i = 0; i < 10; i++) {
              sum += parseInt(cpf.charAt(i)) * (11 - i);
          }
          rest = 11 - (sum % 11);
          if (rest === 10 || rest === 11) {
              rest = 0;
          }
          if (rest === parseInt(cpf.charAt(10))) {
              result = true;
          }
      }
  }
  return result;

}

function validateCnpj(cnpj) {
  cnpj = cnpj.replace(/[^\d]+/g,'');
  let sum;
  let rest;
  let i;
  let result = false;
  if (
    cnpj.length !== 14 ||
    cnpj === "00000000000000" ||
    cnpj === "11111111111111" ||
    cnpj === "22222222222222" ||
    cnpj === "33333333333333" ||
    cnpj === "44444444444444" ||
    cnpj === "55555555555555" ||
    cnpj === "66666666666666" ||
    cnpj === "77777777777777" ||
    cnpj === "88888888888888" ||
    cnpj === "99999999999999") {
    return false;
  }
  if (cnpj.length === 14) {
      sum = 0;
      for (i = 0; i < 12; i++) {
          sum += parseInt(cnpj.charAt(i)) * (13 - i);
      }
      rest = 11 - (sum % 11);
      if (rest === 10 || rest === 11) {
          rest = 0;
      }
      if (rest === parseInt(cnpj.charAt(12))) {
          sum = 0;
          for (i = 0; i < 13; i++) {
              sum += parseInt(cnpj.charAt(i)) * (14 - i);
          }
          rest = 11 - (sum % 11);
          if (rest === 10 || rest === 11) {
              rest = 0;
          }
          if (rest === parseInt(cnpj.charAt(13))) {
              result = true;
          }
      }
  }
  return result;
}


function errorGenerator(errorText) {
  errorContainer.forEach(error => {
    error.innerHTML = `<div class="error">${errorText}</div>`;
  });
}

function errorReset(){
  errorContainer.forEach(error => {
    error.innerHTML = "";
  });
}

function getUserType(){
  for (var i = 0; i < userType.length; i++) {
    if (userType[i].checked) {
      return(userType[i].value)
    }
  }
}

// nextBtn.forEach((button) => {
//   button.addEventListener("click", () => {
//     changeStep("next");
//   });
// });
prevBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("prev");
  });
});


var index = 0;
function changeStep(btn) {
  const active = document.querySelector(".active");
  index = steps.indexOf(active);
  steps[index].classList.remove("active");
  if (btn === "next") {
    if (index === 0){
      if (name.value === "" || email.value === "" || password.value === "" || confirmPassword.value === "" || getUserType() === "" || terms.checked === false){
        errorGenerator("Preencha todos os campos");
      } else if (password.value.length < 6){
        errorGenerator("Senha deve ter no mínimo 6 caracteres");
      } else if (password.value !== confirmPassword.value){
        errorGenerator("As senhas não conferem");
      } else if (email.value.indexOf("@") === -1){
        errorGenerator("Email inválido");
      } 
      else{
        fetch(`${base_url}/php/tools/check_email.php`, {
          method: "POST",
          body: JSON.stringify({
            email: email.value
          })
        })
        .then(response => response.json(response))
        .then(data => {
          if (data.message === true){
            errorGenerator("Email já cadastrado");
          }
          if (data.message === false){
            fetch(`${base_url}/php/controller/marketing.php`, {
              method: "POST",
              body: JSON.stringify({
                name: name.value,
                email: email.value,
              })
            })
            errorContainer.innerHTML = "";
            if(getUserType() === "pessoa_fisica"){
              steps[index].classList.remove("active");
              index = 1;
              steps[index].classList.add("active");
              errorReset();
            }
            else if (getUserType() === "pessoa_juridica"){
              steps[index].classList.remove("active");
              index = 2;
              steps[index].classList.add("active");
              errorReset();
            }
          }
        })
        .catch(error => console.log(error));
      }
    }
    else if (index === 1){
      if (cpf.value === "" || dataNasc.value === "" || cep.value === "" || street.value === "" || city.value === "" || state.value === ""){
        errorGenerator("Preencha todos os campos");
      } else if (validateCpf(cpf.value) === false){
        errorGenerator("CPF inválido");
      } else{
        fetch(`${base_url}/php/tools/check_cpf.php`, {
          method: "POST",
          body: JSON.stringify({
            cpf: cpf.value
          })
        })
        .then(response => response.json(response))
        .then(data => {
          if (data.message === true){
            errorGenerator("CPF já cadastrado");
          }
          if (data.message === false){
            errorReset();
            steps[index].classList.remove("active");
            index = 3;
            steps[index].classList.add("active");
          }
        })
        .catch(error => console.log(error));
      }
    }
    else if (index === 2){
      if (cnpj.value === "" || insc_stad.value === "" || cepCnpj.value === "" || streetCnpj.value === "" || cityCnpj.value === "" || stateCnpj.value === ""){
        errorGenerator("Preencha todos os campos");
      } else if (validateCnpj(cnpj.value) === false){
        errorGenerator("CNPJ inválido");
      } else{
        fetch(`${base_url}/php/tools/check_cnpj.php`, {
          method: "POST",
          body: JSON.stringify({
            cnpj: cnpj.value
          })
        })
        .then(response => response.json(response))
        .then(data => {
          if (data.message === true){
            errorGenerator("CNPJ já cadastrado");
          }
          if (data.message === false){
            errorReset();
            steps[index].classList.remove("active");
            index = 3;
            steps[index].classList.add("active");
          }
        })
        .catch(error => console.log(error))
      }
    }
    else if (index === 3){
      if (telCel.value === "" || code.value === ""){
        errorGenerator("Preencha todos os campos");
      } else if (telCel.value.replace(/[^\d]+/g, '').length !== 11){
        errorGenerator("Telefone celular inválido");
      } else{
        errorReset();
        const inputs = [];
        form.querySelectorAll("input").forEach((input) => {
          const { name, value, checked } = input;
          inputs.push({ name, value, checked });
        });
        console.log(inputs);
        if (getUserType() === "pessoa_fisica"){
          fetch(`${base_url}/php/controller/register_cpf.php`, {
            method: "POST",
            body: JSON.stringify({
              name: name.value,
              email: email.value,
              password: password.value,
              confirm_password: confirmPassword.value,
              cpf: cpf.value,
              data_nasc: dataNasc.value,
              cep: cep.value.replace(/[^\d]+/g, ''),
              street: street.value,
              city: city.value,
              state: state.value,
              tel: telFixo.value.replace(/[^\d]+/g, ''),
              cel: telCel.value.replace(/[^\d]+/g, ''), 
              code: code.value,
            })
          })
          .then(response => response.json(response))
          .then(data => {
            if (data.status === "success"){
              steps[index].classList.remove("active");
              index = 4;
              steps[index].classList.add("active");
            }
            else{
              errorGenerator(data.text);
            }
           })
          .catch(error => console.log(error));
        }
        else if (getUserType() === "pessoa_juridica"){
          fetch(`${base_url}/php/controller/register_cnpj.php`, {
            method: "POST",
            body: JSON.stringify({
              name: name.value,
              email: email.value,
              password: password.value,
              confirm_password: confirmPassword.value,
              cnpj: cnpj.value.replace(/[^\d]+/g, ''),
              insc_stad: insc_stad.value.replace(/[^\d]+/g, ''),
              cep_cnpj: cepCnpj.value.replace(/[^\d]+/g, ''),
              street_cnpj: streetCnpj.value,
              city_cnpj: cityCnpj.value,
              state_cnpj: stateCnpj.value,
              tel: telFixo.value.replace(/[^\d]+/g, ''),
              cel: telCel.value.replace(/[^\d]+/g, ''), 
              code: code.value,
            })
          })
          .then(response => response.json(response))
          .then(data => {
            if (data.status === "success"){
              steps[index].classList.remove("active");
              index = 4;
              steps[index].classList.add("active");
            }
            else{
              errorGenerator(data.text);
            }
           })
          .catch(error => console.log(error));
        }
      }
      
    }
    
  } 
  
  else if (btn === "prev") {
    errorReset();
    if (index === 1){
      index = 0
    }
    else if (index === 2) {
      index = 0;
    }
    else if (index === 3) {
      if (getUserType() === "pessoa_fisica"){
        index = 1;
      }
      else if (getUserType() === "pessoa_juridica"){
        index = 2;
      }
    }
  }else{
    errorReset();
    index--;
  }
  steps[index].classList.add("active");
}


form.addEventListener("submit", (e) => {
  e.preventDefault();
  changeStep("next");
});

sendCode.addEventListener("click", () => {
  if (telCel.value === ""){
    errorGenerator("Preencha o número de celular");
  }
  else{
    errorReset();
    sendCode.disabled  = true;
    sendCode.innerHTML = "Reenviar SMS 00:10";
    let interval = setInterval(function() {
      let time = parseInt(sendCode.innerHTML.replace(/[^0-9]/g, ''));
      if(time <= 1) {
        clearInterval(interval);
        sendCode.disabled  = false;
        sendCode.innerHTML = "Reenviar SMS";
      } else {
        sendCode.innerHTML = "Reenviar SMS 00:0" + (time - 1) + "s";
      }
    }, 1000);
    setTimeout(function(){
      sendCode.disabled  = false;
      sendCode.innerHTML = "Reenviar SMS";
    }, 10000);
    fetch(`${base_url}/php/tools/send_code.php`, {
      method: "POST",
      body: JSON.stringify({
        cel: telCel.value,
      })
    })
    .then(response => response.json(response))
    .then(data => {
      if (data.status === "error"){
        errorGenerator("Erro ao enviar código");
      }
    })
    .catch(error => console.log(error))         
  } 
});


const showPassword = document.querySelectorAll(".show_password");
showPassword.forEach(function(showPassword) {
  showPassword.addEventListener("click", () => {
    if (showPassword.previousElementSibling.type === "password") {
      showPassword.previousElementSibling.type = "text";
    } else {
      showPassword.previousElementSibling.type = "password";
    }
  });
});


// Masks


let maskCPF = IMask(cpf, {
  mask: '000.000.000-00',
});

let maskCep = IMask(cep, {
  mask: '00000-000',
});
let maskCepCnpj = IMask(cepCnpj, {
  mask: '00000-000',
});

let maskCNPJ = IMask(cnpj, {
  mask: '00.000.000/0000-00',
});

let maskStad = IMask(insc_stad, {
  mask: '00.000.0000-0',
});

let maskTel = IMask(telFixo, {
  mask: '(00) 0000-0000',
});


let maskCel = IMask(telCel, {
  mask: '(00) 00000-0000',
});

let maskCode = IMask(code, {
  mask: '0000',
});


// return street cep
function getStreet(cep) {
  let url = `https://viacep.com.br/ws/${cep.replace(/[^\w\s]/gi, '')}/json/`;
  fetch(url)
  .then(response => response.json())
  .then(data => {
    if(data.erro){
      null
    }
    else{
      street.value = data.logradouro;
      city.value = data.localidade;
      state.value = data.uf;
    }

  })
  .catch(error => console.log(error));
}

cep.addEventListener("keyup", function(e) {
  if(cep.value.replace(/[^\w\s]/gi, '').length == 8) {
    getStreet(cep.value);
  }
});


// return street cep
function getStreetCnpj(cep) {
  let url = `https://viacep.com.br/ws/${cep.replace(/[^\w\s]/gi, '')}/json/`;
  fetch(url)
  .then(response => response.json())
  .then(data => {
    if(data.erro){
      null
    }else{
      streetCnpj.value = data.logradouro;
      cityCnpj.value = data.localidade;
      stateCnpj.value = data.uf;
    }
  })
  .catch(error => console.log(error));
}

cepCnpj.addEventListener("keyup", function(e) {
  if(cepCnpj.value.replace(/[^\w\s]/gi, '').length == 8) {
    getStreetCnpj(cepCnpj.value);
  }
})