<template>
    <span
        :data-id="field.value"
        class="handle cursor-pointer text-70 hover:text-primary mr-3"
    >
        <svg
            class="fill-current"
            width="22"
            height="18"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
        ><path
            d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"
        /></svg>
    </span>
</template>

<script>
import Sortable from 'sortablejs'

export default {
    props: ['resourceName', 'field'],

    data() {
        return {
            sortable: null,
        }
    },

    mounted() {
        this.setSortableDataId()

        if (!this.sortable) this.initSortable()
    },

    methods: {
        setSortableDataId() {
            this.$el.closest('tr').setAttribute('data-id', this.field.value)
        },

        setSortOrder() {
            const sortedSuccess = this.__('The sort order has been saved!')
            const sortedError = this.__('Unable to save sort order!')

            window.Nova.request().patch(
                `/nova-vendor/dewsign/nova-field-sortable/${this.resourceName}/${this.field.value}/set-order`,
                { items: this.sortable.toArray() },
            )
                .then(() => this.$toasted.show(sortedSuccess, { type: 'success' }))
                .catch(() => this.$toasted.show(sortedError, { type: 'error' }))
        },

        initSortable() {
            const table = this.$el.closest('tbody')

            this.sortable = new Sortable(table, {
                handle: '.handle',
                draggable: 'tr',
                onSort: this.setSortOrder,
            })
        },
    },
}
</script>
