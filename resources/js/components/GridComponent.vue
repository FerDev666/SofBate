<template>
    <div>
        <kendo-datasource ref="datasource1"
            :schema-total="'total'"
            :schema-data="'data'"
            :transport-read-url="'/api/products'"
            :page-size='5'
            :server-paging="true"
            :server-filtering="true"
            :schema-model-fields="dsSchemaFields">
        </kendo-datasource>

        <kendo-grid :data-source-ref="'datasource1'"
                :pageable="true"
                :filterable-mode="'row'">
        <kendo-grid-column :field="'id'"
                           :width="50"
                           :filterable-cell-show-operators="false"></kendo-grid-column>
        <kendo-grid-column :field="'title'"
                           :title="'Ship Name'"
                           :width="240"
                           :filterable-cell-operator="'contains'"
                           :filterable-cell-suggestion-operator="'contains'"></kendo-grid-column>
        <kendo-grid-column :field="'category'"
                           :width="180"
                           :filterable-cell-operator="'gte'"></kendo-grid-column>
        <kendo-grid-column :field="'created_at'"
                           :title="'Order Date'"
                           :format="'{0:MM/dd/yyyy}'"
                           :width="180"></kendo-grid-column>
    </kendo-grid>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dsSchemaFields: {
                    id: { type: "number" },
                    title: { type: "string" },
                    description: { type: "string" },
                    created_at: { type: "date" },
                    category: { type: "string" }
                }
            }
        }
    }
</script>
<style scoped>
    .k-grid {
        font-size: 12px;
    }

    .k-grid td {
    line-height: 1em;
}
</style>