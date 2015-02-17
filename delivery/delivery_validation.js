$(document).ready(function() {
    $('#deliveryForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            procArrivalTime: {
                validators: {
                    notEmpty: {
                        message: 'Arrival time is required and cannot be empty.'
                    }
                }
            },
            procUnloadBegin: {
                validators: {
                    notEmpty: {
                        message: 'Load time begin is required and cannot be empty.'
                    }
                }
            },
            procUnloadEnd: {
                validators: {
                    notEmpty: {
                        message: 'Load time end is required and cannot be empty.'
                    }
                }
            },
            procDepartureTime: {
                validators: {
                    notEmpty: {
                        message: 'Depature time is required and cannot be empty.'
                    }
                }
            },                                        
            procTicNum: {
                validators: {
                    notEmpty: {
                        message: 'Producer ticket number is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Producer ticket number must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'Producer ticket number cannot exceed eight numbers.'
                    }
                }
            },
            grossWeight: {
                validators: {
                    notEmpty: {
                        message: 'Gross weight is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Gross weight must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'Gross weight cannot exceed six numbers.'
                    }
                }
            },
            tareWeight: {
                validators: {
                    notEmpty: {
                        message: 'Tare Weight is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Tare Weight must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'Tare Weight cannot exceed six numbers.'
                    }
                }
            },
        }
    });
});