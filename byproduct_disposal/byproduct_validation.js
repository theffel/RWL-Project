$(document).ready(function() {
    $('#byproductForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'Truck number is required and cannot be empty.'
                    }
                }
            },
        }
    });
});