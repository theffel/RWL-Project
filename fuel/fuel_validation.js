$(document).ready(function() {
    $('#fuelForm').bootstrapValidator({
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
            mileage: {
                validators: {
                    notEmpty: {
                        message: 'Mileage is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'Starting Kms must be a number between 1 and 99999999.'
                    }
                }
            },
            litres: {
                validators: {
                    notEmpty: {
                        message: 'Mileage is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Liters in fuel tank must be a number between 0 and 999.99.'
                    }
                }
            },
            cost: {
                validators: {
                notEmpty: {
                        message: 'Mileage is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Cost must be a number between 0 and 999.99.'
                    }
                }
            },
            location: {
                validators: {
                    notEmpty: {
                        message: 'Location is required and cannot be empty.'
                    },
                    stringLength: {
                       max: 100,
                       message: 'Location must be less then one hundred characters.'
                    }
                }
            }
        }
    });
});