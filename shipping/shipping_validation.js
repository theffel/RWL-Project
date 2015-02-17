$(document).ready(function() {
    $('#shipForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rwlLoadBegin: {
                validators: {
                    notEmpty: {
                        message: 'Load time begin is required and cannot be empty.'
                    }
                }
            },
            rwlLoadEnd: {
                validators: {
                    notEmpty: {
                        message: 'Load time end is required and cannot be empty.'
                    }
                }
            },
            rwlDepartureTime: {
                validators: {
                    notEmpty: {
                        message: 'Depature time is required and cannot be empty.'
                    }
                }
            },                                        
            rwlTicNum: {
                validators: {
                    notEmpty: {
                        message: 'RWL ticket number is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'RWL ticket number must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'RWL ticket number cannot exceed eight numbers.'
                    }
                }
            },
            weight: {
                validators: {
                    notEmpty: {
                        message: 'Weight Shipped is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Weight Shipped tank must be a number.'
                    },
                    stringLength: {
                        max: 6,
                        message: 'Weight Shipped cannot exceed six numbers.'
                    }
                }
            },
        }
    });
});