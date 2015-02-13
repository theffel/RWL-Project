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
                    }
                }
            },
            hydraulicOilLiters: {
                validators: {
                    notEmpty: {
                        message: 'Hydraulic oil litres is required and cannot be empty.'
                    }
                }
            },
            transFluidLiters: {
                validators: {
                    notEmpty: {
                        message: 'Transmission fluid litres is required and cannot be empty.'
                    }
                }
            },
            coolantLitres: {
                validators: {
                    notEmpty: {
                        message: 'Coolant litres is required and cannot be empty.'
                    }
                }
            }
        }
    });
});