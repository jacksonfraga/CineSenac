

<!-- Core Scripts - Include with every page -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Blank -->

<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

{if $subtemplate eq ""}
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
{else}
    {include file=$subtemplate}
{/if}

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
