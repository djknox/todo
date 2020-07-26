<template>
    <div>
        <item-display
            v-for="item of uncompletedItems"
            :key="item.id"
            :item="item"
            v-on:item-deleted="itemDeleted"
            v-on:item-completed="itemCompleted"
            class="my-4">
        </item-display>

        <div class="card my-4">
            <div
                @click="showCompleted = !showCompleted"
                class="card-header flex flex-row items-center">
                <h1>completed</h1>
                <ChevronDownIcon class="ml-2" />
            </div>

            <div
                v-if="showCompleted"
                class="card-body">
                <item-display
                    v-for="item of completedItems"
                    :key="item.id"
                    :item="item"
                    v-on:item-deleted="itemDeleted"
                    v-on:item-completed="itemCompleted"
                    class="my-4">
                </item-display>
            </div>
        </div>
    </div>
</template>

<script>
    import { 
        ChevronDownIcon,
    } from 'vue-feather-icons';

    export default {
        name: "items-display",

        components: {
            ChevronDownIcon,
        },

        props: {
            items: {
                required: true,
                type: Array,
            },
        },

        data () {
            return {
                showCompleted: false,
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
                return this.items.filter(function (item) {
                    return item.completed;
                });
            },
            uncompletedItems () {
                return this.items.filter(function (item) {
                    return !item.completed;
                });
            },
        },
    }
</script>