'use strict';

$(() =>
{
	$('#frmReportInsert').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
            //validaciones para los camops necesarias
		}
	});
});


function updateReport(idReport) {

    const newDescription = $('#txtNewDescription').val();
    const newCreatorRole = $('#txtNewCreatorRole').val();
    const newCreatorData = $('#txtNewCreatorData').val();


    swal({
        title: 'Confirmar operación',
        text: '¿Realmente desea proceder?',
        icon: 'warning',
        buttons: ['No, cancelar.', 'Si, proceder.']
    }).then((proceed) => {
        if (proceed) {
            $.ajax({
                url: _urlBase + '/report/update/' + idReport,
                method: 'POST',
                data: { 
                    Description: newDescription,
                    Creator_role: newCreatorRole,
                    Creator_data: newCreatorData,
                },
                success: function(response) {

                    //window.location.href = _urlBase + '/city/update/' + idReport;
					window.location.reload();
                },
                
                error: function(xhr, status, error) {
					new PNotify({
						title: 'Error',
						text: 'El reporte ya esta registrada.',
						type: 'error'
					});
                }
            });
            window.location.href = _urlBase + '/report/getall';

        }
        
    });
}

function showEditModal(idReport, description, creatorRole, creatorData) {
    $('#txtNewDescription').val(description);
    $('#txtNewCreatorRole').val(creatorRole);
    $('#txtNewCreatorData').val(creatorData);

    $('#editReportModal').data('idReport', idReport);
    $('#editReportModal').modal('show');
}

