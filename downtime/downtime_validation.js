$(document).ready(function() {
    $('#downForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            startDowntime:  {
                validators: {
                    notEmpty: {
                        message: 'Start downtime is required and cannot be empty.'
                    },
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'Start downtime must follow format of YYYY-MM-DD HH:MM:SS.'
                    }
                }
            },
            endDowntime:  {
                validators: {
                    notEmpty: {
                        message: 'End downtime is required and cannot be empty.'
                    },                    
                    date: {
                        format: 'YYYY-MM-DD H:m:s',
                        message:  'End downtime must follow format of YYYY-MM-DD HH:MM:SS.'
                    }
                }
            },
            reason: {
                validators: {
                    notEmpty: {
                        message: 'Reason is required and cannot be empty.'
                    }
                }
            },
        }
    });
});