$(document).ready(function() {
    $('#pickForm').bootstrapValidator({
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
            driver: {
                validators: {
                    notEmpty: {
                        message: 'Driver is required and cannot be empty.'
                    }
                }
            },
            dispatcher: {
                validators: {
                    notEmpty: {
                        message: 'Dispatcher is required and cannot be empty.'
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
            trailer: {
                validators: {
                    notEmpty: {
                        message: 'Trailer is required and cannot be empty.'
                    }
                }
            },   
            farm: {
                validators: {
                    notEmpty: {
                        message: 'Farm is required and cannot be empty.'
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
            farmArrivalTime:  {
                validators: {
                    date: {
                    notEmpty: {
                        message: 'Farm arrival time is required and cannot be empty.'
                    },
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    }
                }
            },
            loadTime:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'Load time is required and cannot be empty.'
                    }
                }
            },
            farmDepartureTime:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'Farm departure time is required and cannot be empty.'
                    }
                }
            },
            rwlArrivalTime:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'RWL arrival time is required and cannot be empty.'
                    }
                }
            },
            rwlUnloadTime:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'RWL unload time is required and cannot be empty.'
                    }
                }
            },
            rwlDepartureTime:  {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    },
                    notEmpty: {
                        message: 'RWL departure time is required and cannot be empty.'
                    }
                }
            }, 
            ticketNumber: {
                validators: {
                    notEmpty: {
                        message: 'Ticket number time is required and cannot be empty.'
                    },                    
                    stringLength: {
                       max: 10,
                       message: 'Field location must be less then ten characters.'
                    }
                }
            },     
            grossWeight: {
                    notEmpty: {
                        message: 'Gross weight time is required and cannot be empty.'
                    },                
                validators: {
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Gross Weight must be a number between 1 and 999999.'
                    }
                }
            }, 
            tareWeight: {
                validators: {
                    notEmpty: {
                        message: 'Tare weight time is required and cannot be empty.'
                    }
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Tare weight must be a number between 1 and 999999.'
                    }
                }
            },             
        }
    });
});