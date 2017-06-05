$(document).ready(function() {
   $('#contact_form').bootstrapValidator({
       // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
       feedbackIcons: {
           valid: 'glyphicon glyphicon-ok',
           invalid: 'glyphicon glyphicon-remove',
           validating: 'glyphicon glyphicon-refresh'
       },
       fields: {
           first_name: {
               validators: {
                       stringLength: {
                       min: 2,
                   },
                       notEmpty: {
                       message: 'Por favor insira seu nome'
                   }
               }
           email: {
               validators: {
                   notEmpty: {
                       message: 'Por favor forneça seu email'
                   },
                   emailAddress: {
                       message: 'Por favor forneça um email válido'
                   }
               }
           },
           Telefone: {
               validators: {
                   notEmpty: {
                       message: 'Por favor forneça seu telefone'
                   },
                   phone: {
                       country: 'US',
                       message: 'Por favor forneça um número de telefone válido para sua área'
                   }
               }
           Cidade: {
               validators: {
                    stringLength: {
                       min: 4,
                   },
                   notEmpty: {
                       message: 'Por favor, forneça o nome de sua cidade'
                   }
               }
           },
           Estado: {
               validators: {
                   notEmpty: {
                       message: 'Por favor selecione seu estado'
                   }
               }
           },
           CEP: {
               validators: {
                   notEmpty: {
                       message: 'Por favor, forneça o número do seu CEP'
                   },
                   CEPCode: {
                       country: 'US',
                       message: 'Por favor, forneça um número de CEP válido'
                   }
               }
           },
           Mensagem: {
               validators: {
                     stringLength: {
                       min: 10,
                       max: 200,
                       menssagem:'Insira pelo menos 10 caracteres no minímo e 200 no máximo'
                   },
                   notEmpty: {
                       menssagem: 'Please supply a description of your project'
                   }
                   }
               }
           }
       })
       .on('success.form.bv', function(e) {
           $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
               $('#contact_form').data('bootstrapValidator').resetForm();

           // Prevent form submission
           e.preventDefault();

           // Get the form instance
           var $form = $(e.target);

           // Get the BootstrapValidator instance
           var bv = $form.data('bootstrapValidator');

           // Use Ajax to submit form data
           $.post($form.attr('action'), $form.serialize(), function(result) {
               console.log(result);
           }, 'json');
       });
});
