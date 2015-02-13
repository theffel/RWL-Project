$(document).ready(function() {
    $('#tempForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date:  {
                validators: {
                    notEmpty: {
                        message: 'Date is required and cannot be empty.'
                    },
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Date must follow format of YYYY-MM-DD HH:MM:SS.'
                    }
                }
            },
            tank1: {
                validators: {
                    notEmpty: {
                        message: 'Tank #1 is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Tank #1 must be a number.'
                    },

                    stringLength: {
                        max: 6,
                        message: 'Tank #1 cannot exceed three numbers.'
                    }
                }
            },
            tank2: {
                validators: {
                    notEmpty: {
                        message: 'Tank #2 is required and cannot be empty.'
                    },
                    numeric: {
                        message: 'Tank #2 must be a number.'
                    },

                    stringLength: {
                        max: 6,
                        message: 'Tank #2 cannot exceed three numbers.'
                    }
                }
            },
            tank3: {
                validators: {
                    numeric: {
                        message: 'Tank #3 must be a number.'
                    },

                    stringLength: {
                        max: 6,
                        message: 'Tank #3 cannot exceed three numbers.'
                    }
                }
            },
        }
    });
});