$(document).ready(function() {
    $('#changeForm').bootstrapValidator({
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
            weight: {
                validators: {
                    notEmpty: {
                        message: 'Weight is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Weight Kms must be a number between 1 and 999999.'
                    }
                }
            },
            byproduct: {
                validators: {
                    notEmpty: {
                        message: 'By product is required and cannot be empty.'
                    },
                    stringLength: {
                       max: 100,
                       message: 'By-product must be less then one hundred characters.'
                   }
                }
            },
            binMarker: {
                validators: {
                    notEmpty: {
                        message: 'Bin marker is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]{1,3})?$/,
                       message: 'Bin marker must be a number between 1 and 999.'
                    }
                }
            },
        }
    });
});