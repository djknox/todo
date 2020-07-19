<template>
    <div class="flex flex-row items-center">
        <item-delete
            :item="item"
            v-on:item-deleted="itemDeleted">
        </item-delete>
        <item-complete
            :initial-item="item"
            v-on:item-completed="itemCompleted">
        </item-complete>
        <h3>
            {{ item.description }}
        </h3>
    </div>
</template>

<script>
    export default {
        name: "item-display",

        props: {
            item: {
                required: true,
                type: Object,
            },
        },
        data () {
            return {

            };
        },
        methods: {
            itemDeleted (response) {
                this.$emit('item-deleted', response);
            },
            itemCompleted (response) {
                this.$emit('item-completed', response);
            },
        },
    }
</script>