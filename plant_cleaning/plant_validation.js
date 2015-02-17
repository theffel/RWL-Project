<!-- for input validation-->
$(document).ready(function() {
    $('#plantForm').bootstrapValidator({
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
                        message: 'Date is required and cannot be empty.'
                    }
                }
            },            
            descClean: {
                validators: {
                    notEmpty: {
                        message: 'Description is required and cannot be empty.'
                    },
                    stringLength: {
                       max: 100,
                       message: 'Description must be less then one hundred characters.'
                    }
                }
            }
        }
    });
});