<template>
    <div class="card">
        <group-display
            :group="group">
        </group-display>
        
        <add-item-to-group
            :group="group"
            v-on:item-added="addItemToGroup">
        </add-item-to-group>
    </div>
</template>

<script>
    export default {
        name: "group-controller",

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
            addItemToGroup (response) {
                this.group = response.group;
            },
        },
    }
</script>