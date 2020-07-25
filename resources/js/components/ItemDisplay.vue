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
        <h3 class="text-lg">
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
        computed: {
            completedItems () {
                return this.group.items.filter(function (item) {
                    return item.completed;
                });
            },
            uncompletedItems () {
                return this.group.items.filter(function (item) {
                    return !item.completed;
                });
            },
        },
    }
</script>