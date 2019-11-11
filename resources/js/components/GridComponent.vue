<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <kendo-datasource ref="datasource1"
                    :schema-total="'total'"
                    :schema-data="'data'"
                    :transport-read-url="'/api/products'"
                    :page-size='10'
                    :server-paging="true"
                    :server-filtering="true"
                    :server-sorting="true"
                    :schema-model-fields="dsSchemaFields">
                </kendo-datasource>

                <kendo-grid 
                    :data-source-ref="'datasource1'"
                    :no-records="true"
                    :messages-no-records="'NO EXISTEN RESULTADOS'"
                    :groupable="true"
                    :filterable="filterableConfig"
                    :navigatable="true"
                    :pageable-always-visible="true"
                    :pageable-page-sizes="[10, 20, 50, 100]"
                    :toolbar="['create','pdf', 'excel']"
                    :sortable="true"
                    :pdf-all-pages="false"
                    :pdf-avoid-links="true"
                    :pdf-paper-size="'A4'"
                    :pdf-margin="{ top: '2cm', left: '1cm', right: '1cm', bottom: '1cm' }"
                    :pdf-landscape="true"
                    :pdf-repeat-headers="true"
                    :pdf-scale="0.8"
                    :pdf-export="pdfExport"
                >
                    <kendo-grid-column :selectable="true" :width="30"></kendo-grid-column>
                    <kendo-grid-column 
                        :field="'id'"
                        :title="'ID'"
                        :width="100"
                        :filterable-cell-show-operators="false"
                    ></kendo-grid-column>
                    <kendo-grid-column 
                        :field="'title'"
                        :title="'TITULO'"
                        :width="240"
                        :filterable-cell-operator="'contains'"
                        :filterable-cell-suggestion-operator="'contains'"
                    ></kendo-grid-column>
                    <kendo-grid-column 
                        :field="'category'"
                        :title="'CATEGORIA'"
                        :width="180"
                        :filterable-cell-operator="'contains'"
                        :filterable-cell-suggestion-operator="'contains'"
                    ></kendo-grid-column>
                    <kendo-grid-column 
                        :field="'created_at'"
                        :title="'FECHA'"
                        :format="'{0:MM/dd/yyyy}'"
                        :filterable-operators="{date: { lte: 'Before or equal to', gte: 'After or equal to'}}"
                        :width="180"
                    ></kendo-grid-column>
                </kendo-grid>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                dsSchemaFields: {
                    id: { type: "string" },
                    title: { type: "string" },
                    description: { type: "string" },
                    created_at: { type: "date" },
                    category: { type: "string" }
                },

                filterableConfig: {
                    extra: false,
                    operators: {
                        string: {
                            qe: 'Es igual a',
                            neq: 'No es igual a',
                            contains: 'Contiene',
                            doesnotcontain: 'No contiene',
                            startswitch: 'Comienza con',
                            endswitch: 'Termina en'
                        }
                    }
                },
            }
        },

        methods: {
            pdfExport: function(e) {
                var rows = e.sender.table[0].rows;

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    if (!$(row).hasClass("k-state-selected")) {
                        $(row).addClass("hiddenRow")
                    };
                };
                e.promise
                    .done(function() {
                        $(".hiddenRow").each(function() {
                            $(this).parents("tr").removeClass("hiddenRow");
                        });
                    });
            }
        }
    }
</script>

<style scoped>
    .k-grid {
        font-size: 12px;
        font-weight: bold;
    }

    >>> .k-grouping-header {
        color: #767676;
        background-color: #e8e8e8;
    }

    >>> .k-grouping-header .k-group-indicator {
        border-color: #979797;
    }

    >>> .k-grid-header {
        background-color: #f5faff;
    }

    >>> .k-grid-header .k-grid-header-wrap th.k-header {
        text-align:center;
        /*padding: 0.5em;*/
    }
   
    >>>.k-grid tbody tr {
        line-height: 20px;
        text-align: center;
    }

    >>> .k-grid tbody td {
        padding: 0.5em;
    }
</style>
