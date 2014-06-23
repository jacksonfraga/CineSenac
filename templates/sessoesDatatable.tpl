<script src="js/bootbox.min.js"></script>
<script>
    $(document).ready(function() {
        var tableSessao = $('#dataTables-example').dataTable({
            "bAutoWidth": false,
            "aoColumns": [
                null,
                null,
                null,
                { "sWidth": "36px", "bSortable": false},
                { "sWidth": "36px", "bSortable": false},
                { "sWidth": "36px", "bSortable": false}
            ]
        });

        $('.delete-record').click(function(event) {
            event.preventDefault();

            var urlDelete = this.href;
            
            var $row = $(this).parents("tr");
            
            bootbox.dialog({
                message: "Deseja remover este registro?",
                title: "Confirmação",
                buttons: {
                    remove: {
                        label: "Remover",
                        className: "btn-danger",
                        callback: function() {
                            $.ajax({
                                    url: urlDelete,
                                    type: "POST",
                                    success: function(data, textStatus, jqXHR)
                                    {
                                            $row.detach();
                                            $('#removeDialog').modal('hide');
                                    },
                                    error: function(jqXHR, textStatus, errorThrown)
                                    {
                                            $('#removeDialog').modal('hide');
                                            bootbox.dialog({
                                                message: "Ocorreu um erro: " + textStatus
                                            });
                                    }
                            });                            
                        }
                    },
                    cancel: {
                        label: "Cancelar",
                        className: "btn-default"
                    }
                }
            });

            $('#removeRecord').click(function(e) {
                e.preventDefault();
                
            });
        });
    });
</script>