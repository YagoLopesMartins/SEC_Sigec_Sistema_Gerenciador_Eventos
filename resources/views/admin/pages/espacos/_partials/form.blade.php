

 @include('admin.includes.alerts')

 <div class="accordion" id="accordionExample">
     <div class="accordion-item">
         <h2 class="accordion-header" id="headingOne">
             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                 aria-expanded="true" aria-controls="collapseOne">
                 Formulário: Informações básicas
             </button>
         </h2>
         <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
             data-bs-parent="#accordionExample">
             <div class="accordion-body">
                 @include('admin.pages.espacos._partials.formInformacoes')
             </div>
         </div>
     </div>
     <div class="accordion-item">
         <h2 class="accordion-header" id="headingTwo">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                 data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                 Formulário: Horários
             </button>
         </h2>
         <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
             data-bs-parent="#accordionExample">
             <div class="accordion-body">
                 @include('admin.pages.espacos._partials.formHorarios')
             </div>
         </div>
     </div>
     <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Formulário: Endereço/Localização
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                @include('admin.pages.espacos._partials.formEndereco')
            </div>
        </div>
    </div>
     <br/>
        <button type="submit" class="btn btn-fill btn-success">Salvar</button>
 </div>
 
 {{-- @include('admin.includes.botoesAnteriorProximoSalvar') --}}
 