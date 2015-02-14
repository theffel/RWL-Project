$(document).ready(function() {
    $('#fluidsForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date: {
                validators: {
                    notEmpty: {
                        message: 'Date is required and cannot be empty.'
                    },
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message: 'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    }
                }
            },
            truck: {
                validators: {
                    notEmpty: {
                        message: 'Truck is required and cannot be empty.'
                    }
                }
            },
            engineOilLiters: {
                validators: {
                    notEmpty: {
                        message: 'Engine oil litres is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Engine liters must be a number between 0 and 999.99.'
                    }
                }
            },
            hydraulicOilLiters: {
                validators: {
                    notEmpty: {
                        message: 'Hydraulic oil litres is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Hydraulic Oil liters must be a number between 0 and 999.99.'
                    }                    
                }
            },
            transFluidLiters: {
                validators: {
                    notEmpty: {
                        message: 'Transmission fluid litres is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Transmission liters must be a number between 0 and 999.99.'
                    }
                },                
            },
            coolantLitres: {
                validators: {
                    notEmpty: {
                        message: 'Coolant litres is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Coolant liters must be a number between 0 and 999.99.'
                    }
                }
            }
        }
    });
});