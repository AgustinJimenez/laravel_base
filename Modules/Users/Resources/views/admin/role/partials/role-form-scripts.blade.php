<script type="text/javascript" defer>
    var BUTTON_CHECK_ALL = $("#check-all-permissions");
    var BUTTON_UNCHECK_ALL = $("#uncheck-all-permissions");
    
    BUTTON_CHECK_ALL.click(function()
    {
        check_all_was_clicked();
    })

    BUTTON_UNCHECK_ALL.click(function()
    {
        uncheck_all_was_clicked();
    })


    function check_all_was_clicked()
    {
        $('input').iCheck('check');
    }
    function uncheck_all_was_clicked()
    {
        $('input').iCheck('uncheck'); 
    }
</script>