<script>

    function print()
    {
        var j = jQuery.noConflict(true);
        $("#invoice").printThis({
            importCSS: true,
            loadCSS: true,
            canvas: true
        });
    }
</script>
