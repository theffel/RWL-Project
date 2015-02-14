$(document).ready(function() {
    $('#receptionForm').bootstrapValidator({
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
            loadIDInfo: {
                validators: {
                    notEmpty: {
                        message: 'Load ID info is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Load ID info must be a number between 1 and 999999.'
                    }
                }
            },   
            quanRecieved: {
                validators: {
                    notEmpty: {
                        message: 'Quantity recieved is required and cannot be empty.'
                    },
                    regexp: {
                       regexp: /^([0-9]{1,6})?$/,
                       message: 'Quantity recieved must be a number between 1 and 999999.'
                    }
                }
            },  
            bulkOther: {
                validators: {
                    notEmpty: {
                        message: 'Bulk choice is required and cannot be empty.'
                    }
                }
            },
            washed: {
                validators: {
                    notEmpty: {
                        message: 'Washed choice is required and cannot be empty.'
                    }
                }
            },
            CFIANotified: {
                validators: {
                    notEmpty: {
                        message: 'CFIA notified required and cannot be empty.'
                    }
                }
            },
            movementCert: {
                validators: {
                    notEmpty: {
                        message: 'Movement Certificate choice is required and cannot be empty.'
                    }
                }
            },
            accepted: {
                validators: {
                    notEmpty: {
                        message: 'Accepted choice required and cannot be empty.'
                    }
                }
            },                 
        }
    });
});