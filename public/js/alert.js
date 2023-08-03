$(document).ready(function () {
    $('.delete-vehicule-button').on('click', function (e) {
        e.preventDefault();

        const vehiculeName = $(this).closest('tr').find('.editableTextMarque').text();
        const confirmation = confirm("Êtes-vous sûr de supprimer le véhicule '" + vehiculeName +
            "' ?");
        confirmation.classList.add('delete-confirm');

        if (confirmation) {
            $(this).closest('.delete-vehicule-form').submit();
        }
    });
});
