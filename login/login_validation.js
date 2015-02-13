$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'You must enter a username.'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'You must enter a password.'
                    },
                }
            },
        }
    });
});