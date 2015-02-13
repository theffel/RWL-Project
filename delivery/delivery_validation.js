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
                    }
                }
            },
            startKmTruck: {
                validators: {
                    notEmpty: {
                        message: 'Starting Kms is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Starting Kms must be a number.'
                    },
                    stringLength: {
                        max: 8,
                        message: 'Starting Kms cannot exceed eight numbers.'
                    }
                }
            },
            peiKm: {
                validators: {
                    numeric: {
                        message: 'PEI Kms must be a number.'
                    },
                    stringLength: {
                        max: 8,
                        message: 'PEI Kms cannot exceed eight numbers.'
                    }
                }
            },
            nbKM: {
                validators: {
                    numeric: {
                        message: 'NB Kms must be a number.'
                    },
                    stringLength: {
                        max: 8,
                        message: 'NB Kms cannot exceed eight numbers.'
                    }
                }
            },
            nsKm: {
                validators: {
                    numeric: {
                        message: 'NS Kms must be a number.'
                    },
                    stringLength: {
                        max: 8,
                        message: 'NS Kms cannot exceed eight numbers.'
                    }
                }
            },
            litresFuelTank: {
                validators: {
                    notEmpty: {
                        message: 'Liters in fuel tank is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Liters in fuel tank must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'Liters in fuel tank cannot exceed six numbers.'
                    }
                }
            },
            finishKm: {
                validators: {
                    notEmpty: {
                        message: 'Finish Kms is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Finish Kms must be a number.'
                    },
                    stringLength: {
                        max: 8,
                        message: 'Finish Kms cannot exceed eight numbers.'
                    }
                }
            },
        }
    });
});