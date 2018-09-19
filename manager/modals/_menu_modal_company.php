<div class="modal fade" id="modal_company_create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-size-60" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
               Cadastrar nova empresa
            </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
            &times;
            </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-xl-8">
                        <form id="form_create_company">
                            <div class="col-md-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                CNPJ:
                                            </label>
                                            <input type="text" placeholder="Ex: 00.000.000/0000-00" class="form-control" id="company_cnpj_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Nome da empresa:
                                            </label>
                                            <input type="text" placeholder="Ex: Empresa LTDA" class="form-control" id="company_name_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Nome comercial:
                                            </label>
                                            <input type="text" placeholder="Ex: Supermercado A" class="form-control" id="company_commercial_name_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                N° da instalação ou Unidade consumidora:
                                            </label>
                                            <input type="text" placeholder="Ex: 3000000000" class="form-control" id="company_installation_consumer_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Código de referência <small> (Gerado automaticamente)</small>
                                            </label>
                                            <input type="text" placeholder="ABCD1234" class="form-control" id="company_referral_code_create" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Status
                                            </label>
                                            <select placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_inactive_create">
                                                <option>Selecione...</option>
                                                <option value="0">Ativa</option>
                                                <option value="1">Inativa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Rua
                                            </label>
                                            <input type="text" placeholder="Ex: Rua A" class="form-control" id="company_street_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Número
                                            </label>
                                            <input type="text" placeholder="Ex: 100" class="form-control" id="company_number_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Bairro
                                            </label>
                                            <input type="text" placeholder="Ex: Bairro A" class="form-control" id="company_neiborhood_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Cidade
                                            </label>
                                            <input type="text" placeholder="Ex: Cidade A" class="form-control" id="company_city_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Estado
                                            </label>
                                            <select placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_state_create">
                                                <option>Selecione...</option>
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                CEP
                                            </label>
                                            <input type="text" placeholder="Ex: 00000-000" class="form-control" id="company_zipcode_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Latitude
                                            </label>
                                            <input type="text" placeholder="Ex: -19.000000" class="form-control" id="company_latitude_create">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Longitude
                                            </label>
                                            <input type="text" placeholder="Ex: -43.000000" class="form-control" id="company_longitude_create">
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="col-md-4 col-xl-4">
                        <span class="m--font-bolder">
                 Empresas cadastradas
               </span>
                        <div class="m-demo">
                            <div class="m-demo__preview">
                                <div class="m-list-timeline">
                                    <div id="div_companies_created" class="box">
                                        <!-- listagem dinâmica de tarifas -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fechar
                </button>
                <button type="submit" class="btn btn-primary">
                    Cadastrar
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_company_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-size-60" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title settings-window">
               Editar empresa
            </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
            &times;
            </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-xl-8">
                        <form id="form_edit_company">
                            <input type="hidden" id="company_id_edit">
                            <div class="col-md-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                CNPJ:
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_cnpj_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Nome da empresa:
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_name_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Nome comercial:
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_commercial_name_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                N° da instalação ou Unidade consumidora:
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_installation_consumer_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Código de referência <small> (não editável)</small>
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_referral_code_edit" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Status
                                            </label>
                                            <select placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_inactive_edit">
                                                <option>Selecione...</option>
                                                <option value="0">Ativa</option>
                                                <option value="1">Inativa</option>
                                            </select>
                                        </div>
                                        <div class="m-section__content">
                  												<button style="visibility: hidden" type="button" class="btn btn-secondary btn-block contacts-popover" id="popover_contacts_edit" data-toggle="m-popover" data-trigger="focus" title="Contatos" data-html="true" data-content="Nenhum contato cadastrado para esta empresa">
                  													Visualizar contatos
                  												</button>
                  											</div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Rua
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_street_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Número
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_number_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Bairro
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_neiborhood_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Cidade
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_city_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Estado
                                            </label>
                                            <select placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_state_edit">
                                                <option>Selecione...</option>
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                CEP
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_zipcode_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Latitude
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_latitude_edit">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">
                                                Longitude
                                            </label>
                                            <input type="text" placeholder="Escolha uma empresa ao lado para editar" class="form-control" id="company_longitude_edit">
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="col-md-4 col-xl-4">
                        <span class="m--font-bolder">
                 Empresas cadastradas
               </span>
                        <div class="m-demo">
                            <div class="m-demo__preview">
                                <div class="m-list-timeline">
                                    <div id="div_companies_edit" class="box">
                                        <!-- listagem dinâmica de tarifas -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fechar
                </button>
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        var BASE_URL = null;

        if ((window.location.hostname) == "localhost") {
            BASE_URL = window.location.protocol + "//" + window.location.hostname + "/meusol/";
        } else {
            BASE_URL = window.location.protocol + "//" + window.location.hostname + "/";
        }

        if (sessionStorage.getItem("user")) {
            var user = JSON.parse(sessionStorage.getItem("user"));
        }

        if (sessionStorage.getItem("company")) {
            var company = JSON.parse(sessionStorage.getItem("company"));
        }

        if (sessionStorage.getItem("contract")) {
            var contract = JSON.parse(sessionStorage.getItem("contract"));
        }

        $("#company_cnpj_create").mask('00.000.000/0000-00', {reverse: true});
        $("#company_cnpj_edit").mask('00.000.000/0000-00', {reverse: true});

        $('#modal_company_create').on('show.bs.modal', function(e) {

            $(":input[type=submit]").prop('disabled', false);

            clearCreateInputs();
            retrieveCompanies();
        });

        $("#company_cnpj_create").on("input", function(){
            $("#company_referral_code_create").val(generateReferralCodeForString($("#company_cnpj_create").val()));
        });

        $('#modal_company_edit').on('shown.bs.modal', function(e) {

            var dataType = $(this).data('type');

            if (dataType == "view") {

                $(this).removeData('type');
                $("form[id*='edit'] :input").prop("disabled", true);
                $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
                $(":input[type=submit]").prop('disabled', true);
                $(".settings-window").html("Visualizar empresa");
                $(".contacts-popover").prop("disabled", false);
                $("#popover_contacts_edit").attr("style", "visibility: hidden");

            } else if (dataType == "edit") {

                $(this).removeData('type');
                $("form[id*='edit'] :input").prop("disabled", false);
                $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
                $(":input[type=submit]").prop('disabled', false);
                $(".settings-window").html("Editar empresa");
                $("#popover_contacts_edit").attr("style", "visibility: hidden");
            }

            clearEditInputs();
            retrieveCompanies();
        });

        function clearCreateInputs() {
            $("#form_create_company").each(function() {
                this.reset()
            });
        };

        function clearEditInputs() {
            $("#form_edit_company").each(function() {
                this.reset()
            });
        };

        function retrieveCompanies() {

            $.ajax({
                url: BASE_URL + 'api/companies',
                type: 'GET',
                contentType: 'application/json',
                dataType: "json",
                async: true,
                success: function(result) {
                    var response = result;

                    // console.log(response);

                    if (response["status"] == 1) {

                        $("#div_companies_created").empty();
                        $("#div_companies_edit").empty();

                        clearCreateInputs();
                        clearEditInputs();

                        if (response["companies"].length > 0) {

                            $.each(response["companies"], function(i, company) {
                              var contactHtml = "";
                              $.each(company.contacts, function(i, contact) {
                                contactHtml += '<p><strong>Nome:</strong> <code>'+contact.contactName+'</code></p><p><strong>E-mail:</strong> <code>'+contact.contactEmail+'</code></p><p><strong>Telefone:</strong> <code>'+contact.contactPhone+'</code></p><hr/>';
                              });

                              var cleanCnpj = stringToCnpj(company.companyCnpj);

                              $("#div_companies_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+company.companyId+'. ' + company.companyName + '</code></div>');
                              $("#div_companies_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-contact="'+contactHtml+'" data-id="' + company.companyId + '" data-cnpj="'+cleanCnpj+'" data-name="' + company.companyName + '" data-commercial-name="'+company.companyCommercialName+'" data-installation-consumer="'+company.companyInstallationConsumer+'" data-street="'+company.companyStreet+'" data-number="'+company.companyNumber+'" data-neiborhood="'+company.companyNeiborhood+'" data-city="'+company.companyCity+'" data-state="'+company.companyState+'" data-zipcode="'+company.companyZipcode+'" data-latitude="'+company.companyLatitude+'" data-longitude="'+company.companyLongitude+'" data-referral-code="'+company.companyReferralCode+'" data-inactive="'+company.companyInactive+'"><code>'+company.companyId+". " + company.companyName + '</code></a></div>');



                            });

                        } else {
                            $("#div_companies_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma empresa cadastrada</code></div>');
                            $("#div_companies_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma empresa cadastrada</code></div>');
                        }

                    } else if (response["status"] == 2) {
                        //status error
                    }
                },
                error: function(result) {
                    //network error
                }
            });

        }

        $("#form_create_company").off().submit(function(event) {

            var valCompanyCnpj = cnpjToString($("#company_cnpj_create").val());
            var valCompanyName = $("#company_name_create").val();
            var valCompanyCommercialName = $("#company_commercial_name_create").val();
            var valCompanyInstallationConsumer = $("#company_installation_consumer_create").val();
            var valCompanyStreet = $("#company_street_create").val();
            var valCompanyNumber = $("#company_number_create").val();
            var valCompanyNeiborhood = $("#company_neiborhood_create").val();
            var valCompanyCity = $("#company_city_create").val();
            var valCompanyState = $("#company_state_create").val();
            var valCompanyZipcode = $("#company_zipcode_create").val();
            var valCompanyLatitude = $("#company_latitude_create").val();
            var valCompanyLongitude = $("#company_longitude_create").val();
            var valCompanyReferralCode = $("#company_referral_code_create").val();
            var valCompanyInactive = $("#company_inactive_create").val();

            if (valCompanyCnpj == "") {

                toastr.error("Insira o CNPJ");
                return false;
            }

            $.ajax({
                url: BASE_URL + 'api/create-company',
                type: 'POST',
                contentType: 'application/json',
                dataType: "json",
                async: true,
                data: JSON.stringify({
                    companyCnpj: valCompanyCnpj,
                    companyName: valCompanyName,
                    companyCommercialName: valCompanyCommercialName,
                    companyInstallationConsumer: valCompanyInstallationConsumer,
                    companyStreet: valCompanyStreet,
                    companyNumber: valCompanyNumber,
                    companyNeiborhood: valCompanyNeiborhood,
                    companyCity: valCompanyCity,
                    companyState: valCompanyState,
                    companyZipcode: valCompanyZipcode,
                    companyLatitude: valCompanyLatitude,
                    companyLongitude: valCompanyLongitude,
                    companyReferralCode: valCompanyReferralCode,
                    companyInactive: valCompanyInactive
                }),
                success: function(result) {
                    var response = result;

                    // console.log(response);

                    if (response["status"] == 1) {
                        swal({
                            type: response["feedbackStatus"],
                            title: response["feedbackTitle"],
                            text: response["feedbackMessage"],
                            showConfirmButton: 1,
                            timer: 0
                        })

                        retrieveCompanies();

                    } else if (response["status"] == 2) {

                        swal({
                            type: response["feedbackStatus"],
                            title: response["feedbackTitle"],
                            text: response["feedbackMessage"],
                            showConfirmButton: 1,
                            timer: 0
                        })

                    }
                },
                error: function(result) {
                    toastr.error("Erro no servidor. Tente novamente mais tarde.");
                }
            });

            event.preventDefault();

        });

        $('#div_companies_edit').delegate('a', 'click', function(e) {
            var company_to_edit = $(this);
            $("#company_cnpj_edit").val(company_to_edit.data("cnpj"));
            $("#company_name_edit").val(company_to_edit.data("name"));
            $("#company_commercial_name_edit").val(company_to_edit.data("commercial-name"));
            $("#company_installation_consumer_edit").val(company_to_edit.data("installation-consumer"));
            $("#company_street_edit").val(company_to_edit.data("street"));
            $("#company_number_edit").val(company_to_edit.data("number"));
            $("#company_neiborhood_edit").val(company_to_edit.data("neiborhood"));
            $("#company_city_edit").val(company_to_edit.data("city"));
            $("#company_state_edit").val(company_to_edit.data("state"));
            $("#company_zipcode_edit").val(company_to_edit.data("zipcode"));
            $("#company_latitude_edit").val(company_to_edit.data("latitude"));
            $("#company_longitude_edit").val(company_to_edit.data("longitude"));
            $("#company_referral_code_edit").val(company_to_edit.data("referral-code"));
            $("#company_inactive_edit").val(company_to_edit.data("inactive"));

            //popover
            $("#popover_contacts_edit").attr("data-content", company_to_edit.data("contact"));
            $("#popover_contacts_edit").attr("style", "visibility: visible");

            $("#company_id_edit").val(company_to_edit.data("id"));
            e.preventDefault();

            $("#form_edit_company").off().submit(function(event) {

                var valCompanyId = $("#company_id_edit").val();

                var valCompanyCnpj = cnpjToString($("#company_cnpj_edit").val());

                var valCompanyName = $("#company_name_edit").val();
                var valCompanyCommercialName = $("#company_commercial_name_edit").val();
                var valCompanyInstallationConsumer = $("#company_installation_consumer_edit").val();
                var valCompanyStreet = $("#company_street_edit").val();
                var valCompanyNumber = $("#company_number_edit").val();
                var valCompanyNeiborhood = $("#company_neiborhood_edit").val();
                var valCompanyCity = $("#company_city_edit").val();
                var valCompanyState = $("#company_state_edit").val();
                var valCompanyZipcode = $("#company_zipcode_edit").val();
                var valCompanyLatitude = $("#company_latitude_edit").val();
                var valCompanyLongitude = $("#company_longitude_edit").val();
                var valCompanyReferralCode = $("#company_referral_code_edit").val();
                var valCompanyInactive = $("#company_inactive_edit").val();

                if (valCompanyCnpj == "") {

                    toastr.error("Insira o CNPJ");
                    return false;
                }

                $.ajax({
                    url: BASE_URL + 'api/edit-company',
                    type: 'PUT',
                    contentType: 'application/json',
                    dataType: "json",
                    async: true,
                    data: JSON.stringify({
                        companyId: valCompanyId,
                        companyCnpj: valCompanyCnpj,
                        companyName: valCompanyName,
                        companyCommercialName: valCompanyCommercialName,
                        companyInstallationConsumer: valCompanyInstallationConsumer,
                        companyStreet: valCompanyStreet,
                        companyNumber: valCompanyNumber,
                        companyNeiborhood: valCompanyNeiborhood,
                        companyCity: valCompanyCity,
                        companyState: valCompanyState,
                        companyZipcode: valCompanyZipcode,
                        companyLatitude: valCompanyLatitude,
                        companyLongitude: valCompanyLongitude,
                        companyReferralCode: valCompanyReferralCode,
                        companyInactive: valCompanyInactive
                    }),
                    success: function(result) {
                        var response = result;

                        // console.log(response);

                        if (response["status"] == 1) {
                            swal({
                                type: response["feedbackStatus"],
                                title: response["feedbackTitle"],
                                text: response["feedbackMessage"],
                                showConfirmButton: 1,
                                timer: 0
                            })

                            retrieveCompanies();

                        } else if (response["status"] == 2) {

                            swal({
                                type: response["feedbackStatus"],
                                title: response["feedbackTitle"],
                                text: response["feedbackMessage"],
                                showConfirmButton: 1,
                                timer: 0
                            })

                        }
                    },
                    error: function(result) {
                        toastr.error("Erro no servidor. Tente novamente mais tarde.");
                    }
                });

                event.preventDefault();

            });
        });

    });
</script>
