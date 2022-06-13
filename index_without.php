<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <title>Multi Step Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="src/css/styles.css">
  <meta name="theme-color" content="#000">
</head>
<body>
  <section>
    <div class="container">
      <form novalidate id="form_step">
        <div class="step step-1 active" data-target="0">
          <div class="container_steps">
            <div class="step_circle step_active">1</div>
            <hr />
            <div class="step_circle">2</div>
            <hr />
            <div class="step_circle">3</div>
            <hr />
            <div class="step_circle">4</div>
          </div>
          <div class="form-group" style="margin-top: 1rem;">
            <label for="name">Seu nome *</label><br>
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input 
                class="input-field" 
                type="text" 
                autocomplete="name" 
                placeholder="ex: José da Silva Santos dos Reis" 
                id="name" 
                name="name" 
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="nickname">Apelido *</label><br>
            <div class="input-container">
              <i class="fa fa-address-card icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: José" 
                id="nickname" 
                name="nickname"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="email">E-mail *</label><br>
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input 
                class="input-field" 
                type="text" 
                autocomplete="email" 
                placeholder="ex: meuemail@gmail.com" 
                id="email" 
                name="email" 
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="password">Criar senha *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="password" 
                autocomplete="new-password"
                placeholder="********" 
                id="password" 
                name="password" 
                required
                oninvalid=""
              >
              <div class="show_password">
                <i class="fa-solid fa-eye"></i>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirmar senha *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="password" 
                autocomplete="new-password"
                placeholder="********" 
                id="confirm_password" 
                name="confirm_password" 
                required
              >
              <div class="show_password">
                <i class="fa-solid fa-eye"></i>
              </div>
            </div>
          </div>
          <div class="error_front_container"></div>
          <ul class="password_step">
            <li>Senha com no minimo 6 dígitos</li>
          </ul>
          <div class="container_checkbox">
            <div>
              <input 
                type="radio" 
                name="user_type" 
                id="pessoa_fisica" 
                value="pessoa_fisica" 
                required
              >
              <label for="pessoa_fisica">Pessoa física</label>
            </div>
  
            <div>
              <input 
                type="radio" 
                name="user_type" 
                id="pessoa_juridica" 
                value="pessoa_juridica" 
                required
              >
              <label for="pessoa_juridica">Pessoa jurídica</label>
            </div>
          </div>
          <div>
            <input 
              type="checkbox" 
              name="terms" 
              id="terms" 
              required
            >
            <label for="terms">Eu concordo com termos de <a href="#">Aviso de Privacidade</a></label>
          </div>
          <div class="container_button">
            <button type="submit" class="next-btn" id="submit">Criar conta</button>
          </div>        
        </div>
  
        <div class="step step-2" data-target="1">
          <div class="container_steps">
            <div class="step_circle">1</div>
            <hr />
            <div class="step_circle step_active">2</div>
            <hr />
            <div class="step_circle">3</div>
            <hr />
            <div class="step_circle">4</div>
          </div>
          <div class="form-group" style="margin-top: 1rem;">
            <label for="cpf">CPF *</label><br>
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: 123.456.789-01" 
                id="cpf" 
                name="cpf"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="data_nasc">Data Nascimento *</label><br>
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input 
                class="input-field" 
                type="date" 
                autocomplete="date" 
                placeholder="dd-mm-yyyy" 
                max="2030-12-31" 
                id="data_nasc" 
                name="data_nasc"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="cep">CEP *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                autocomplete="none" 
                placeholder="ex: 12345-678" 
                id="cep" 
                name="cep"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="street">Rua *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rua do Limoeiro" 
                id="street" 
                name="street"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="street_number">Número *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="number" 
                placeholder="ex: 88" 
                id="street_number" 
                name="street_number"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="city">Cidade *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rio de Janeiro" 
                id="city" 
                name="city"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="state">Estado *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rio de Janeiro" 
                id="state" 
                name="state"
                required
              >
            </div>
          </div>
          <div class="error_front_container"></div>
          <div class="container_button">
            <button type="submit" class="next-btn">Criar conta</button>
            <button type="button" class="previous-btn">Voltar</button> 
          </div>       
        </div>

        <div class="step step-3-cnpj" data-target="2">
          <div class="container_steps">
            <div class="step_circle">1</div>
            <hr />
            <div class="step_circle step_active">2</div>
            <hr />
            <div class="step_circle">3</div>
            <hr />
            <div class="step_circle">4</div>
          </div>
          <div class="form-group" style="margin-top: 1rem;">
            <label for="cnpj">CNPJ *</label><br>
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input 
                class="input-field" 
                type="text" 
                autocomplete="cnpj" 
                placeholder="ex: XX. XXX. XXX/0001-XX" 
                id="cnpj" 
                name="cnpj"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="insc_estad">Inscrição Estadual *</label><br>
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: 388.108.598.269" 
                id="insc_stad" 
                name="insc_stad"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="cep">CEP *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: 12345-678" 
                id="cep_cnpj" 
                name="cep_cnpj"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="street">Rua *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rua do Limoeiro 88" 
                id="street_cnpj" 
                name="street_cnpj"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="street_number">Número *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="number" 
                placeholder="ex: 88" 
                id="street_number_cnpj" 
                name="street_number_cnpj"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="city">Cidade *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rio de Janeiro" 
                id="city_cnpj" 
                name="city_cnpj"
                required
              >
            </div>
          </div>
          <div class="form-group">
            <label for="state">Estado *</label><br>
            <div class="input-container">
              <i class="fa-solid fa-lock icon"></i>
              <input 
                class="input-field" 
                type="text" 
                placeholder="ex: Rio de Janeiro" 
                id="state_cnpj" 
                name="state_cnpj"
                required
              >
            </div>
          </div>
          <div class="error_front_container"></div>
          <div class="container_button">
            <button type="submit" class="next-btn">Criar conta</button>
            <button type="button" class="previous-btn">Voltar</button> 
          </div>       
        </div>
  
        <div class="step step-4" data-target="3">
          <div class="container_steps">
            <div class="step_circle">1</div>
            <hr />
            <div class="step_circle">2</div>
            <hr />
            <div class="step_circle step_active">3</div>
            <hr />
            <div class="step_circle">4</div>
          </div>
          <div class="form-group" style="margin-top: 1rem;">
            <label for="tel">Telefone Fixo</label><br>
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input 
                class="input-field" 
                type="tel" 
                autocomplete="cel"
                placeholder="(21) 9999-9999" 
                id="tel" 
                name="tel"
                required
              >
            </div>
          </div>
          <div class="form-group" data-target="4">
            <label for="cel">Celular *</label><br>
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input 
                class="input-field" 
                type="tel" 
                autocomplete="tel" 
                placeholder="(21) 99999-9999" 
                id="cel" 
                name="cel"
                required
              >
            </div>
          </div>
          <div class="error_front_container" style="margin-top: 1rem;"></div>
          <div class="container_button">
            <button type="submit" class="submit-btn">Criar conta</button>
            <button type="button" class="previous-btn">Voltar</button> 
          </div>    
        </div>

        <div class="step step-5">
          <div class="container_steps">
            <div class="step_circle">1</div>
            <hr />
            <div class="step_circle">2</div>
            <hr />
            <div class="step_circle">3</div>
            <hr />
            <div class="step_circle step_active">4</div>
          </div>

          <div class="container_button">
            <button type="submit" class="next-btn">Página inicial</button>
            <button type="button" class="previous-btn">Enviar documentos</button>
          </div>        
        </div>
      </form>
    </div>
  </section>
  <script src="https://unpkg.com/imask"></script>
  <script src="./src/js/form-step_without.js"></script>
</body>
</html>