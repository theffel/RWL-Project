$(document).ready(function() {
    $('#washForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
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