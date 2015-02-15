$(document).ready(function() {
    $('#sampleForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            trailer: {
                validators: {
                    notEmpty: {
                        message: 'Trailer is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Trailer must be a number between 1 and 999999.'
                    }
                }
            },
            numOfSample: {
                validators: {
                                        notEmpty: {
                        message: 'Trailer is required and cannot be empty.'
                    },
                      regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Sample number must be a number between 1 and 999999.'
                    }
                }
            },
            incomingOutgoing: {
                validators: {
                    notEmpty: {
                        message: 'Incoming / Outgoing choice is required and cannot be empty.'
                    }
                }
            },            
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
            totalWeight: {
                validators: {
                    notEmpty: {
                        message: 'Total weight is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Starting Kms must be a number between 1 and 999.99.'
                    }
                }
            },
            unuseableWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Unuseable weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            rotWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Rot weight must be a number between 1 and 999.99.'
                    }
                }
            },   
            internalWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Internal weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            pitrotWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Pit rot weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            wirewormWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Wireworm weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            jellyendWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Jelly weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            otherWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Other weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            hollowheartWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Hollow heart weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            scabWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Scab weight must be a number between 1 and 999.99.'
                    }
                }
            },
            sunburnWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Sunburn weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            mechbruiseWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Mechanical bruising weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            smallsWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Smalls weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            tenozsWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: '10oz weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            airWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Air weight must be a number between 1 and 999.99.'
                    }
                }
            }, 
            waterWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Water weight must be a number between 1 and 999.99.'
                    }
                }
            },  
            rockWeight: {
                validators: {                
                    regexp: {
                       regexp: /^([0-9]\d?\d?|0)(\.\d{1,2})?$/,
                       message: 'Rock weight must be a number between 1 and 999.99.'
                    }
                }
            },                           
        }
    });
});