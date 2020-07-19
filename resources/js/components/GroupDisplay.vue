<template>
    <div>
        <div class="card-header">
            {{ group.name }}
        </div>

        <div class="card-body">
            <item-display
                v-for="item of group.items"
                :key="item.id"
                :item="item"
                v-on:item-deleted="itemDeleted"
                class="my-4">
            </item-display>
        </div>
    </div>
</template>

<script>
    export default {
        name: "group-display",

        props: {
            group: {
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
                this.group = response.data.group;
            },
        },
    }
</script>