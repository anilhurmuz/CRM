var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.row(nRow).data();
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.rows(nRow).data(aData[i]);
                }

                oTable.row(nRow).draw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.row().data(nRow);
                var jqTds = $('>td', nRow);

                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="">';
                jqTds[4].innerHTML = '<input type="text" class="form-control small" value="">';
                jqTds[5].innerHTML = '<a class="edit" href="">Save</a> <a class="cancel" href="">Cancel</a>';

                console.log(jqTds);
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a> <a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable.row(nRow).draw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 5, false);
                oTable.row(nRow).draw();
            }

            var oTable = $('#opportunity_estimatedCost_table-11').DataTable();

            //jQuery('#opportunity_estimatedCost_table-11_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            //jQuery('#opportunity_estimatedCost_table-11_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#btn_new_data').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.row.add(['', '', '', '', '',
                        '<a class="edit" href="">Edit</a> <a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.rows().nodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#opportunity_estimatedCost_table-11 a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.row(nRow).remove();
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#opportunity_estimatedCost_table-11 a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.row(nRow).remove();
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#opportunity_estimatedCost_table-11 a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();