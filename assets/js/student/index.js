$(document).ready(function () {
});

var load_contacts = () => {
    $(document).gmLoadPage({
       url: baseUrl + 'student/get_students',
       load_on: '#load_contacts'
   });
 }

 $(document).ready(function () {
    load_contacts();
    $(document).on('click', '#btn_submit', function () {
        var y = $('#x').val();
            $.confirm({
                containerFluid: true,
                columnClass: 'col-md-5 offset-md-4',
                title: '',sea
                content: 'Save Student to db??!482984902?',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'blue',
                alignMiddle: true,
                buttons: {

                    okay: {
                        btnClass: 'btn-blue',
                        keys: [
                            'enter'
                        ],
                        action: function () {
                            
                                $.ajax({
                                    url: 'student/service/student_service/save',
                                    selector: '.form-control',
                                    type: "POST",
                                    data: {
                                        Fname     : $('#Fname').val(),
                                        Lname     : $('#Lname').val(),
                                        Email      : $('#Email').val(),
                                        Address      : $('#Address').val(),
                                    },
                                    beforeSend: function(){
                                        $('#btn_submit').attr('disabled', 'disabled');
                                        $('#process').css('display','block');
                                    },
                                    success:function(data)
                                        {
                                        var percentage = 0;
                                    
                                        var timer = setInterval(function(){
                                        percentage = percentage + 20;
                                        progress_bar_process(percentage, timer);
                                        }, 1000);
                                    },
                                    field: 'field',
                                    function_call: true,
                                    function: success,
                                    parameter: true,
                                    alert_on_error: false,
                                    errorsend: true,
                                    errorsend_function: [{
                                        function: error_connection,
                                        msg: "Please check your connection and try again."
                                    }],
                                    function_call_on_error: true,
                                    error_function: [{
                                        function: error,
                                        parameter: true,
                                    }]
                                })
                            // setTimeout(function(){
                            //     window.location.reload();
                            // }, 2000);
                        }
                    },
                    cancel: {
                    }
                },
            });
    }); 

    // $('#btn_submit').on('click', function(event){
    //     event.preventDefault();
       
    //      $.ajax({
    //       url:'student/service/student_service/save',
    //       method:"POST",
    //       data: {
    //             Fname     : $('#Fname').val(),
    //             Lname     : $('#Lname').val(),
    //             Cnum      : $('#Cnum').val(),
    //         },
    //       beforeSend:function()
    //       {
    //        $('#btn_submit').attr('disabled', 'disabled');
    //        $('#process').css('display', 'block');
    //       },
    //       success:function(data)
    //       {
    //        var percentage = 0;
     
    //        var timer = setInterval(function(){
    //         percentage = percentage + 20;
    //         progress_bar_process(percentage, timer);
    //        }, 1000);
    //       }
    //      })
    //    });
     
       function progress_bar_process(percentage, timer)
       {
        $('.progress-bar').css('width', percentage + '%');
        if(percentage > 100)
        {
         clearInterval(timer);
         $('#sample_form')[0].reset();
         $('#process').css('display', 'none');
         $('.progress-bar').css('width', '0%');
         $('#save').attr('disabled', false);
         $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
         setTimeout(function(){
          $('#success_message').html('');
         }, 5000);
        }
       }

    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        $.confirm({
            containerFluid: true,
            columnClass: 'col-md-5 offset-md-4',
            title: '',
            content: 'Delete Account?',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            alignMiddle: true,
            buttons: {

                okay: {
                    btnClass: 'btn-red',
                    keys: [
                        'enter'
                    ],
                    action: function () {
                        $(document).gmPostHandler({
                            url: 'student/service/student_service/delete',
                            selector: '.form-control',
                            data: {
                            ID: id,
                            },
                            field: 'field',
                            function_call: true,
                            function: success,
                            parameter: true,
                            alert_on_error: false,
                            errorsend: true,
                            errorsend_function: [{
                                function: error_connection,
                                msg: "Please check your connection and try again."
                            }],
                            function_call_on_error: true,
                            error_function: [{
                                function: error,
                                parameter: true,
                            }]
                        });
                    }
                },
                cancel: {
                }
            },
        });
    }); 

    $(document).on('click', '#edit', function () {
        $.confirm({
            containerFluid: true,
            columnClass: 'col-md-5 offset-md-4',
            title: '',
            content: 'Update student Details?',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'blue',
            alignMiddle: true,
            buttons: {

                okay: {
                    btnClass: 'btn-blue',
                    keys: [
                        'enter'
                    ],
                    action: function () {
                        $(document).gmPostHandler({
                            url: 'student/service/student_service/update',
                            selector: '.form-control',
                            data: {
                                ID             : $('#ID').val(),
                                Fname     : $('#Fname').val(),
                                Lname     : $('#Lname').val(),
                                Email      : $('#Email').val(),
                                Address      : $('#Address').val(),
                            },
                            field: 'field',
                            function_call: true,
                            function: success,
                            parameter: true,
                            alert_on_error: false,
                            errorsend: true,
                            errorsend_function: [{
                                function: error_connection,
                                msg: "Please check your connection and try again."
                            }],
                            function_call_on_error: true,
                            error_function: [{
                                function: error,
                                parameter: true,
                            }]
                        });
                    }
                },
                cancel: {
                }
            },
        });
    });
    $(document).on('click', '#search', function () {
        $(document).gmLoadPage({
            url: 'student/service/student_service/search',
            data: {
                Search_text: $('#search_text').val()
            },
            load_on: '#load_contacts'
        });
    }); 
});

