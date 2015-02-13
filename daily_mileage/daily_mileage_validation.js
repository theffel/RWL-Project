$(document).ready(function() {
    $('#mileageForm').bootstrapValidator({
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
            startKmTruck: {
                validators: {
                    notEmpty: {
                        message: 'Starting Kms is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'Starting Kms must be a number between 1 and 99999999.'
                    }
                }
            },
            peiKm: {
                validators: {
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'PEI Kms must be a number between 1 and 99999999.'
                    }
                }
            },
            nbKM: {
                validators: {
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'NB Kms must be a number between 1 and 99999999.'
                    }
                }
            },
            nsKm: {
                validators: {
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'NS Kms must be a number between 1 and 99999999.'
                    }
                }
            },
            litresFuelTank: {
                validators: {
                    notEmpty: {
                        message: 'Liters in fuel tank is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Liters in fuel tank must be a number between 0 and 999.99.'
                    }
                }
            },
            finishKm: {
                validators: {
                    notEmpty: {
                        message: 'Finish Kms is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([1-9]{1,8})?$/,
                       message: 'Finish Kms must be a number between 1 and 99999999.'
                    }
                }
            },
        }
    });
});